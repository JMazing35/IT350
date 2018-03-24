import pymongo
from pymongo import MongoClient

client = MongoClient('localhost', 27017) #Change to 192.168.50.12

# Get the BuyMyAppleCustomers Database
db = client.BuyMyApple #REMINDER: Create customer database on MongoDB called BuyMyApple
collection = db.customer #Create a collection called customers


