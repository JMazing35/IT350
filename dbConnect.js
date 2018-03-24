var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "justin35",
  password: "gojazz"
  database: "BuyMyApple"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "INSERT INTO customers (first_name, last_name, street, city, state, zip, phone, email, password, newsletter) VALUES ('test', etc...)";
  con.query(sql, function (err, result) {
  	if (err) throw err;
  	console.log("Record has been inserted");
  });
});

//https://www.w3schools.com/nodejs/nodejs_mysql.asp

