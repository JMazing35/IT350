#!/usr/bin/python
#https://docs.python.org/2/library/cgi.html
#https://www.youtube.com/watch?v=x_1rgQwk5fM

#sudo -H pip install pymongo

#Run the following commands to install pymongo: sudo apt-get install python-pip, sudo pip install pymongo
import pymongo
from pymongo import MongoClient


#For webbrowser redirect to homepage (?)
import webbrowser

# Import modules for CGI handling 
import cgi, cgitb 

cgitb.enable() #For Debugging

#Connect to MongoDB
client = MongoClient() #Change to 192.168.50.12
#con = pymongo.MongoClient()
#collection = con.BuyMyApple.customers

# Get the BuyMyApple Database
db = client.BuyMyApple #REMINDER: Create customer collection on MongoDB called BuyMyApple

collection = db.customers

# Create instance of FieldStorage 
form = cgi.FieldStorage() 

# Get data from fields


print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<body bgcolor='#66ccff'>"
print "<center>"
print "<h1>Buy My Apple</h1>"
print "<h2>Sign Up Now</h2>"
print "</center>"
print "<br>"
print "<div>"
print "<center>"
print "<form name='addEmployee' method='POST' action='register.py'>"
print "<div class='container'>"
print "<label for='first_name'><b>First Name: </b></label>"
print "<input type='text' placeholder='Enter First Name' maxlength='20' id='first_name' name='first_name' required>"
print "<br>"
print "<label for='last_name'><b>Last Name: </b></label>"
print "<input type='text' placeholder='Enter Last Name' maxlength='20' id='last_name' name='last_name' required>"
print "<br>"
print "<label for='street'><b>Street: </b></label>"
print "<input type='text' placeholder='Enter Street' id='street' name='street' required>"
print "<br>"
print "<label for='city'><b>City: </b></label>"
print "<input type='text' placeholder='Enter City' id='city' name='city' required>"
print "<br>"
print "<label for='state'><b>State: </b></label>"
print "<input type='text' placeholder='Enter State' maxlength='20' id='state' name='state' required>"
print "<br>"
print "<label for='zip'><b>ZIP: </b></label>"
print "<input type='int' maxlength='9' placeholder='Enter Zip' id='zipCode' name='zipCode' required>"
print "<br>"
print "<label for='phone'><b>Phone: </b></label>"
print "<input type='int' maxlength='20' placeholder='Enter Phone' maxlength='20' id='phone' name='phone' required>"
print "<br>"
print "<label for='email'><b>Email: </b></label>"
print "<input type='email' placeholder='Enter Email' id='email' name='email' required>"
print "<br>"
print "<label for='zip'><b>Password: </b></label>"
print "<input type='password' placeholder='Enter Password' minlength='6' maxlength='20' id='password' name='password' required>"
print "<br>"
print "<button type='submit'>Register</button>"
print "</div>"
print "</form>"
print "</center>"
print "</div>"
print "</body>"
print "</html>"

if form.getvalue('first_name'):
    first_name = form.getvalue('first_name')
#    print first_name
if form.getvalue('last_name'):
    last_name  = form.getvalue('last_name')
#    print last_name
if form.getvalue('street'):
    street = form.getvalue('street')
#    print street
if form.getvalue('city'):
    city = form.getvalue('city')
#    print city
if form.getvalue('state'):
    state = form.getvalue('state')
#    print state
if form.getvalue('zipCode'):
    zipCode = form.getvalue('zipCode')
#    print zipCode
if form.getvalue('phone'):
    phone = form.getvalue('phone')
#    print phone
if form.getvalue('email'):
    email = form.getvalue('email')
#    print email
if form.getvalue('password'):
    password = form.getvalue('password')
#    print password


#https://codehandbook.org/pymongo-tutorial-crud-operation-mongodb/

# Function to insert data into mongoDB

try:
    collection.insert_one( #db.customer.insert_one is mongoDB format - database.collection.action()
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
    print "<p>\nYou have registered successfully. Navigate to <a href='/homePage.php'>BuyMyApple</a> to start shopping!!</p>"

    #Redirect user to BuyMyApple homepage (?)
    #webbrowser.open('homepage.html')  # Go to example.com


except Exception, e:
    #print str(e)
    print "No record was added"

# For Session check, why not use a logged_in variable that is set when the user creates an account or when the user logs in. And then change the logged_in variable to false when they log out.

