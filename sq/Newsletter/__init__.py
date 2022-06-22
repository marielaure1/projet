from flask import Flask
from flask_bcrypt import Bcrypt   #module pour crypter le mot de passe
from flask_sqlalchemy import SQLAlchemy  #module pour utiliser la base de donnée

#créer une instance d’application Flask avec le nom app
app = Flask(__name__)
#Connexion à la base de donnée
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@Localhost/mvc'

'''La signature des cookies est une mesure préventive contre la falsification des cookies. 
Au cours du processus de signature d'un cookie, le SECRET_KEYest utilisé d'une manière similaire 
à la façon dont un "sel" serait utilisé pour embrouiller un mot de passe avant de le hacher
'''

app.config['SECRET_KEY'] = "random string"


#Always data: ne fonctionne pas encore
app.config['MAIL_SERVER'] = 'smtp-yuniq.alwaysdata.net'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USERNAME'] = 'yuniq@alwaysdata.net'
app.config['MAIL_PASSWORD'] = 'Admkyuniq'
app.config['MAIL_USE_SSL'] = False
app.config['MAIL_USE_TLS'] = True

#crypter mot de passe
app.config['BCRYPT_LOG_ROUNDS'] = 6
app.config['BCRYPT_HASH_IDENT'] = '2b'
app.config['BCRYPT_HANDLE_LONG_PASSWORDS'] = False

db = SQLAlchemy(app)
bcrypt = Bcrypt(app)

from Newsletter import route


