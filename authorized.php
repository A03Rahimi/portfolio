<?php 
  session_start();
  $username =  $_SESSION['userFirstName'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      <title>Authorized Access</title>
      <link href="reset.css" rel="reset stylesheet" type="text/css">
      <link href="authorized.css" rel="stylesheet" type="text/css" title="Default Style">
      <script src="authorized.js" defer></script>
    <head>

	 
    <body>
	  <header>
		<nav id="bar">
		  <img id="logo" src="logo.png" alt="Initials Logo" >
          <ul>
            <li id="leftMost">Blog</li>
          </ul>
        </nav>
      </header>
	
	  <article>
	    <form method="post" action="addPost.php" >
            <fieldset>
			  <label id="topBlog" >Add Blog</label><br><br>
              <input name="blogTitle" type="text" id="title" placeholder="Title"><br><br>
              <textarea rows="7" type="text" id="blogBody" name="blogBody" placeholder="Enter your text here"></textarea>
              <br><br>
		          <button class="buttons" type="submit" id="post" value="Post">Post</button>
              <button class="buttons" id="clear" value="Clear">Clear</button>
            </fieldset>
        </form> 
	  </article>
	  
      <aside class="left">
        <nav>
          <ul>
            <li id="leftMost"><a href="aboutMe.html">About Me</a></li>
            <li><a href="skills.html">Skills</a></li>
            <li><a href="skills.html#Portfolio">Portfolio</a></li>
		    <li><a href="education.html">Education</a></li>
		    <li><a href="education.html#Experience">Experience</a></li>
		    <li><a href="blog.php?userUniqueId=1">Blog</a></li>
            <li id="contact"><a href="aboutMe.html#myContact">Contact</a></li>
          </ul>
        </nav>
      </aside>

	  <aside class="right">
	    <nav>
		  <p id="middle" >✅ Welcome Back <?php echo $username; ?>! </p>
          <ul>
            <li id="leftMost"><a href="logout.php" >Sign Out</a></li>
          </ul>
        </nav>
	  </aside>
	 
      <footer>
        <p id="footerline">This page has been created on 20/03/2022 by Alireza Rahimi. </p>
      </footer>
    </body>
</html>
