#!/usr/bin/python

#https://www.linux.com/blog/configuring-apache2-run-python-scripts
#sudo a2enmod cgi

print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head><title>First CGI Program</title></head>"
print "<body>"
print "<p>IT Works!!! Right now</p>"
for i in range(5):
	print "<h1>hellow world!</h1>"
print "</body>"
print "</html>"