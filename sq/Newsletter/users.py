from Newsletter import db

#On récupère la table newsletter dans la BDD
class Newsletter(db.Model):
    id = db.Column('id', db.Integer, primary_key = True)
    email = db.Column(db.String(100))

    def __init__(self, email):
       self.email = email

    # La méthode spéciale __repr__ permet d'indiquer une chaîne de caractères qui sert de représentation à une classe
    def __repr__(self):
        return f"{self.email}"


