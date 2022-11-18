w<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="reset.css" rel="reset stylesheet" type="text/css">
    <link href="login.css" rel="stylesheet" type="text/css" title="Default Style">
  </head>
	
  <body>
    <header>
	  <nav>
	    <img id="logo" src="logo.png" alt="Initials Logo" >
      </nav>
    </header>
  
  
    <form method="post" action="validate.php" >
        <fieldset id="bottomFieldset">
          <label id="topLogin">Sign in</label><br><br>

          <?php
              echo "<label class=\"wrongCredentialsWarning\"> ⚠️ Incorrect email address or password! Please try again.</label><br><br>";
          ?>
          
          <input placeholder="Email" type="email" id="email" name="email" required><br><br>
          <input placeholder="Password" type="password" id="password" minlength="8" name="password" required >
          <br><br>

		  <button class="buttons" type="submit" id="back" value="back"><a class="white" href="blog.php?userUniqueId=1">Back</a></button>
          <button class="buttons" type="submit" id="Login" value="Login"><a class="white">Login</a></button>

        </fieldset>
    </form> 
  </body>
</html>
