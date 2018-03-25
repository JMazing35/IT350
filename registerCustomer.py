<!--https://www.tutorialspoint.com/python3/python_cgi_programming.htm-->
<!DOCTYPE html>
<html>
<body bgcolor="#66ccff">
<center>
<h1>Buy My Apple</h1>
<h2>Sign Up Now</h2>
</center>

<br>
<div>
  <center>
    <form name="addEmployee" method="POST" action="/cgi-bin/register.py">
      <div class="container">
        <label for="first_name"><b>First Name: </b></label>
        <input type="text" placeholder="Enter First Name" maxlength="20" id="first_name" name="first_name" required>
        <br>
        <label for=""><b>Last Name: </b></label>
        <input type="text" placeholder="Enter Last Name" maxlength="20" id="last_name" name="last_name" required>
        <br>
        <label for="street"><b>Street: </b></label>
        <input type="text" placeholder="Enter Street" id="street" name="street" required>
        <br>
        <label for="city"><b>City: </b></label>
        <input type="text" placeholder="Enter City" id="city" name="city" required>
        <br>
        <label for="state"><b>State: </b></label>
        <input type="text" placeholder="Enter State" maxlength="20" id="state" name="state" required>
        <br>
        <label for="zip"><b>ZIP: </b></label>
        <input type="int" maxlength="9" placeholder="Enter Zip" id="zipCode" name="zipCode" required>
        <br>
        <label for="phone"><b>Phone: </b></label>
        <input type="int" maxlength="20" placeholder="Enter Phone" maxlength="20" id="phone" name="phone" required>
        <br>
        <label for="email"><b>Email: </b></label>
        <input type="email" placeholder="Enter Email" id="email" name="email" required>
        <br>
        <label for="zip"><b>Password: </b></label>
        <input type="password" placeholder="Enter Password" minlength="6" maxlength="20" id="password" name="password" required>
        <br>
        <button type="submit">Register</button>
      </div>
    </form>
  </center>
</div>

</body>
</html>