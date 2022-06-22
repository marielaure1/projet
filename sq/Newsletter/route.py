import flask_bcrypt
from flask import request, flash, url_for, redirect, render_template, session, escape
from flask_mail import Mail, Message
from Newsletter.users import *
from Newsletter import users, app, admin
from flask_bcrypt import check_password_hash

mail = Mail(app)

'''
@app.route est un décorateur qui transforme une fonction Python ordinaire en 
une fonction d’affichage Flask, qui convertit la valeur de retour de la fonction 
en une réponse HTTP à afficher par un client HTTP, tel qu’un navigateur web. 
Vous passez à la valeur '/' à @app.route() pour indiquer que cette fonction répondra 
aux requêtes web pour l’URL /, qui est l’URL principale.

route= fichier route
'''

# Dans show all, on va lister dans un tableau la liste des users inscrit à la newsletter
@app.route('/show_all', methods=['GET', 'POST'])
def show_all():
    if session['role'] == 'ROLE_ADMIN':
        for user in users.Newsletter.query.all():   #boucle la recuperation de tout les utilisateur
            print(user)
        return render_template('show_all.html', users=users.Newsletter.query.all())  #nous redirige vers une page
    else:
        return redirect(url_for('login'))

#Se déconnecter
@app.route('/logout')
def logout():
    # supprime l'email de la session si il existe encore
    session.pop('email', None)
    return redirect(url_for('login'))


@app.route('/email', methods=['GET', 'POST'])
def email():
    if session['role'] == 'ROLE_ADMIN':
        msg = ''
        if request.method == 'POST':
            msg_body = request.form['body']
            msg_subject = request.form['subject']
            print(msg_body)
            print(msg_subject)
            sendMail(msg_subject, msg_body)
            msg = 'Message bien envoyez'

        return render_template('email.html', msg=msg)

    else:
        return redirect(url_for('login'))

#page send pour envoyer le mail
@app.route('/sendMail', methods=['GET', 'POST'])
def sendMail(msg_subject, msg_body):
    if session['role'] == 'ROLE_ADMIN':
        destinataire = []
        for user in users.Newsletter.query.all():
            destinataire.append(f"{user}")
        # Flask_mail() = Message() = sujet, envoyeur, destinataire
        msg = Message(msg_subject, sender='edjour.marielaure@gmail.com', recipients=destinataire)
        msg.html = msg_body  #remplacer

        mail.send(msg)  #éxecuter l'envoie du message
        return "sent email."

    else:
        return redirect(url_for('login'))

# s'inscrire à la newsletter
@app.route('/new', methods=['GET', 'POST'])
def new():
    if session['role'] == 'ROLE_ADMIN':
        if request.method == 'POST':
            if not request.form['email']:
                # flash envoiyer un message enreponse des donnée envoyé du POST
                flash('Please enter all the fields', 'error')
            else:
                # CREER un abonne avec la class Newsletter
                user = users.Newsletter(request.form['email'])
                db.session.add(user)
                db.session.commit()
                flash('Record was successfully added')
                return redirect(url_for('show_all'))
        return render_template('index.html')
    else:
        return redirect(url_for('login'))


@app.route('/', methods=['GET', 'POST'])
def login():
    session['role'] = 'ROLE_USER'
    if request.method == 'POST':
        mail = request.form['email']
        pwd = request.form['password'].encode('utf-8')
        # crypter le mot de passe avec bcrypt
        new_pwd = flask_bcrypt.generate_password_hash(pwd)
        print(pwd)
        print(new_pwd)
        print(new_pwd.decode('utf-8'))
        user = admin.Users.query.filter_by(email=mail).first()
        # verifier la correspondance de l'email et du password
        if user and check_password_hash(user.password, pwd) and user.role == 'ROLE_ADMIN':
            print("Ca marche", user)
            session['role'] = user.role
            return redirect(url_for('show_all'))
        else:
            print("echec")
            return render_template('login.html', msg="Accès interdit")

    else:
        return render_template('login.html')
