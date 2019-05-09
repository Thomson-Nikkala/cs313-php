<?php
	$name = $_POST["name"];
	$email = $_POST["email"];
	$major = $_POST["major"];
	$comments = $_POST["comments"];
	$continent = $_POST["continent"];

	echo $name . " <a href='mailto:$email'>" . $email . "</a> " . $major . " " . $comments;

	foreach($continent as $selected){
		echo $selected."</br>";
	}
?>