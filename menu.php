<!DOCTYPE html>
<html>
<head>
<title>Your Order | Steve's Intergalactic Cafe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--<link rel="stylesheet" type="text/css" href="steves.css">-->
<link rel="stylesheet" type="text/css" href="Style&Fonts/steveStyles.css">

<style>

	body {
		background-image: url("Style&Fonts/blueSpace.png");
		color: #5ABFFF;
		text-align: center;
	}
	
	h1 {font-family: tron; color: gold;}

	table {
		border-spacing: 0;
		width: 60%;
		margin: 3% auto;
		text-align: center;
		font-size: 1.5em;
		font-family: spaceAge;
		color: gold;
	}
	
	td, th {
		border: 1px solid #5abfff;
	}
	
	table tr:last-child td:first-child {
		border-left: none;
	}
	
	table tr:last-child td {
		border-bottom: none;
	}
	
	table tr:first-child th {
		border-top: none;
	}

	table tr:last-child td:last-child {
		border-right: none;
	}
	
	table tr:first-child th:first-child {
		border-left: none;
	}

	table tr:first-child th:last-child {
		border-right: none;
	}
	
	.alert {
		font-size:1.3em; 
		color: gold;
		background: rgba(200,200,200,.5);
		border-radius: 25px;
		width: 700px;
		padding: 5px;
	}

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
				<li class="item"><a href="index.htm" class="link">Home</a></li>
				<li class="item"><a href="menu.htm" class="link">Menu</a></li>
				<li class="item"><a href="location.htm" class="link">Locations</a></li>
				<li class="item"><a href="contact.htm" class="link">Contact</a></li>
			</ul>
		</nav>
	</section>
    
     <section class="header" style="padding-bottom: 15px;">
<h1>Your Order</h1>

<?php

//Get data from a GET or POST (change GET to POST for post)
if(isset($_POST['order'])) { $order = $_POST['order']; } else { $order = "no order"; }
if(isset($_POST['qty'])) { $qty = $_POST['qty']; } else { $qty = 0; }

$jsonMenu = file_get_contents('menu.json');

$menu = json_decode($jsonMenu);

//checking anatomy of JSON
//echo '<prev' . print_r($menu, true) . '</pre>';
//checking anatomy of order object
//echo '<prev>' . print_r($order, true) . '</pre><br />';
//check that qty data is coming through
//echo '<prev>' . print_r($qty, true) . '</pre><br />';

$all = "<table>";
$all .= "<tr><th>Item</th><th>Price</th><th>Qty</th><th>Subtotal</th></tr>";
$price = 0;

//if there is no order, something went wrong, else process order
if($order == "no order"){
	$all = "<p class='alert'>Either something went wrong or you didn't select anything. Please <a href='menu.htm'>try again</a>.</p>";
} else {
	//go through each portion of the order and check if the quantity is greater than 0
	foreach($order as $key=>$value){
		//if quanity ordered is greater than 0, add it to the bill and display it
		if($qty[$key] > 0){
			$i = 0;
			while($i < sizeof($menu->items, 0)){
				if($value == $menu->items[$i]->id){
					$all .= "<tr><td>" . $menu->items[$i]->details->name . "</td>";
					$all .= '<td>$' . number_format((float)$menu->items[$i]->details->price, 2, '.', '') . "</td>";
					$all .= '<td>' . $qty[$key] . "</td>";
					$all .= '<td>$' . number_format((float)$menu->items[$i]->details->price * $qty[$key], 2, '.', '') . "</td></tr>";
					$price += $menu->items[$i]->details->price * $qty[$key];
				}
				$i++;
			}
		}
	}
	//no matter what, as long as there is an order, finish displaying the bill
	$all .= "<tr><th></th><th><th></th></th><th>Total</th></tr>";
	$all .= '<tr><td></td><td><td></td></td><td>$' . number_format((float)$price, 2, '.', '') . '</td></tr>';
}
$all .= "</table>";
print $all;
?>
    </section>
</body>
</html>