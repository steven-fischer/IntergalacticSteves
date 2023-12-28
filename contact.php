<!DOCTYPE html>
<html>
<head>
<title>Contact Information Submitted | Steve's Intergalactic Cafe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="Style&Fonts/steveStyles.css">
<!--

CID Name Assignment

What objectives are you demonstrating?

(place here)

-->

<style>

	body {
		background-image: url("Style&Fonts/blueSpace.png");
		color: #5ABFFF;
		text-align: center;
	}
	
	h1 {font-family: tron; color: gold;}
    
    b { font-family: spaceAge; font-size: 1.75em;}
</style>

</head>
<body>
<img id="ufo1" class="ufo" src="Style&Fonts/ufo1.png" alt="UFO">
<img id="ufo2" class="ufo" src="Style&Fonts/ufo2.png" alt="UFO">
	<section class="header">
		<h1 id="title">
		STEVE'S INTERGALACTIC CAFE
		</h1>
		<nav>
			<ul id="list">
				<li class="item"><a href="homePage.htm" class="link">Home</a></li>
				<li class="item"><a href="menu.htm" class="link">Menu</a></li>
				<li class="item"><a href="locationPage.htm" class="link">Locations</a></li>
				<li class="item"><a href="contactPage.htm" class="link">Contact</a></li>
			</ul>
		</nav>
	</section>
    <section class="header" style="padding-bottom: 15px;">
<h1>Contact Information Successfully Submitted!</h1>
<?php

// Get data from a GET or POST (change GET to POST for post)
if(isset($_POST['fname'])) { $fname = $_POST['fname']; } else { $fname = ""; }
if(isset($_POST['lname'])) { $lname = $_POST['lname']; } else { $lname = " "; }
if(isset($_POST['glxy'])) { $glxy = $_POST['glxy']; } else { $glxy = ""; }
if(isset($_POST['slrs'])) { $slrs = $_POST['slrs']; } else { $slrs = ""; }
if(isset($_POST['plnt'])) { $plnt = $_POST['plnt']; } else { $plnt = ""; }


if($fname != "") {
    print "
    <b>Thanks for your submission, $fname $lname!</b>
    <br /><br> 
    <b>Galaxy: $glxy</b>
    <br />
    <b>Solar System: $slrs</b>
    <br />
    <b>Planet: $plnt</b>
";    
} else if($lname != "") {
    print "
    <b>Thanks for your submission $fname $lname!</b>    
    <br /><br>
    <b>Galaxy: $glxy</b>
    <br />
    <b>Solar System: $slrs</b>
    <br />
    <b>Plantet: $slrs</b>
";    
} else if($glxy != "") {
    print "
    <b>Thanks for your submission $fname $lname!</b>
    <br /><br>
    <b>Galaxy: $glxy</b>
    <br />
    <b>Solar System: $plnt</b>
    <br />
    
";    
} else if($slrs != "") {
    print "
    <b>Thanks for your submission $fname $lname!</b>
    <br /><br>
    <b>Galaxy: $glxy</b>
    <br />
    <b>Solar System: $slrs</b>
    <br />
    <b>Planet: $plnt</b>
";    
} else  if($plnt != "") {
    print "
    <b>Thanks for your submission $fname $lname!</b>
    <br /><br>
    <b>Galaxy: $glxy</b>
    <br />
    <b>Solar System: $slrs</b>
    <br />
    <b>Planet: $plnt</b>
";    
}


?>
</section>
</body>
</html>