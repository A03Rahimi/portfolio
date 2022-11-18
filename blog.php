<?php
    $userUniqueId = $_GET['userUniqueId'];
?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <title>Blog</title>
      <link href="reset.css" rel="reset stylesheet" type="text/css">
      <link href="blog.css" rel="stylesheet" type="text/css" title="Default Style">
      <script src="blog.js" defer></script>
  </head>

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

  <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "portfoliodb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = ("SELECT * FROM `blogs$userUniqueId`");
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // implement each row:
      while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
      }
      mysqli_close($conn);
      $rows = array_reverse($rows,true); // reverse the order so posts are ordered descendingly based on dates 
      foreach($rows as $row){
        $date = $row['dateNtime'];
        $title = $row['title'];
        $textBody = $row['blogBody'];

        // print each blog post
        echo "<section class=\"blogs\">
        <p class=\"time\">$date</p>
        <h4 class=\"blogTitle\">$title </h4>
        <p class=\"blog\">$textBody </p>
        <br>
        <hr>
        <br>
        </section>";
     }
    } 
  ?>
  
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
	     <p id="middle" >Post a Blog</p>
           <ul>
             <li id="leftMost"><a href="login.html">Login</a></li>
           </ul>
       </nav>
	 </aside>

   <aside class="right" id="bottom">
	  <nav>
      <p id="middle" >Choose date</p>
      <label id="monthsLabel">Year</label><br>
      <select id="years" name="years">
        <option value="All">All</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select>

      <br><br><label id="monthsLabel">Month</label><br>

      <select id="months" name="months">
        <option value="All">All</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="July">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
      <br>
      <ul>
      <li id="leftMost"><a id="reload" href="#">Reload</a></li>
      </ul>
    </nav>
	 </aside>
	 
      <footer>
       <p id="footerline">This page has been created on 20/03/2022 by Alireza Rahimi. </p>
      </footer>
    </body>
</html>
