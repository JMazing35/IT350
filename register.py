#! /usr/local/bin/python
#https://docs.python.org/2/library/cgi.html
#https://www.youtube.com/watch?v=x_1rgQwk5fM

import pymongo
from pymongo import MongoClient


#For webbrowser redirect to homepage (?)
import webbrowser

# Import modules for CGI handling 
import cgi, cgitb 

cgitb.enable() #For Debugging

#Connect to MongoDB
client = MongoClient('localhost', 27017) #Change to 192.168.50.12

# Get the BuyMyApple Database
db = client.BuyMyApple #REMINDER: Create customer collection on MongoDB called BuyMyApple



# Create instance of FieldStorage 
form = cgi.FieldStorage() 

# Get data from fields
first_name = form.getvalue('first_name')
last_name  = form.getvalue('last_name')
street = form.getvalue('street')
city = form.getvalue('city')
state = form.getvalue('state')
zipCode = form.getvalue('zipCode')
phone = form.getvalue('phone')
email = form.getvalue('email')
password = form.getvalue('password')


#https://codehandbook.org/pymongo-tutorial-crud-operation-mongodb/

# Function to insert data into mongoDB
def insert():
    try:
    db.customer.insert_one( #db.customer.insert_one is mongoDB format - database.collection.action()
        {
        "first_name": first_name,
        "last_name": last_name,
        "street": street,
        "city": city,
        "state": state,
        "zipCode": zipCode,
        "phone": phone,
        "email": email,
        "password":password
        })
        print '\nInserted data successfully\n'

        #Redirect user to BuyMyApple homepage (?)
        webbrowser.open('homepage.html')  # Go to example.com

    
    except Exception, e:
        print str(e)

# For Session check, why not use a logged_in variable that is set when the user creates an account or when the user logs in. And then change the logged_in variable to false when they log out.



