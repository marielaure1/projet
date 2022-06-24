from flask import Flask
from Newsletter import app


#main.py va run le package
if __name__ == '__main__':
    app.run(host='104.248.198.147', port='5554', debug='True')
