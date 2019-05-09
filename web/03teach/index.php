<!DOCTYPE html>
<html>
<head>
	<title>Teach 02</title>
</head>
<body>
	<form action="input.php" method="post">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>

		<input type="radio" name="major" value="CS"> Computer Science<br>
		<input type="radio" name="major" value="WDD"> Web Design and Development<br>
		<input type="radio" name="major" value="CIT"> Computer Information Technology<br>
		<input type="radio" name="major" value="CE"> Computer Engineering<br>

		<input type="checkbox" name="continent[]" value="North America">North America<br>
		<input type="checkbox" name="continent[]" value="South America">South America<br>
		<input type="checkbox" name="continent[]" value="Europe">Europe<br>
		<input type="checkbox" name="continent[]" value="Asia">Asia<br>
		<input type="checkbox" name="continent[]" value="Australia">Australia<br>
		<input type="checkbox" name="continent[]" value="Africa">Africa<br>
		<input type="checkbox" name="continent[]" value="Antarctica">Antarctica<br>

		Comment: <textarea name="comments"></textarea><br>
		<input type="submit">
	</form>

	<hr>

	<form action="input.php" method="post">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>

		<?php
			$majors = array("Computer Science", "Web Design", "CIT", "CE");

			foreach($majors as $major) {
				echo "<input type='radio' name='major' value='$major'>$major<br>";
			}
		?>

		<input type="checkbox" name="continent[]" value="North America">North America<br>
		<input type="checkbox" name="continent[]" value="South America">South America<br>
		<input type="checkbox" name="continent[]" value="Europe">Europe<br>
		<input type="checkbox" name="continent[]" value="Asia">Asia<br>
		<input type="checkbox" name="continent[]" value="Australia">Australia<br>
		<input type="checkbox" name="continent[]" value="Africa">Africa<br>
		<input type="checkbox" name="continent[]" value="Antarctica">Antarctica<br>

		Comment: <textarea name="comments"></textarea><br>
		<input type="submit">

	</form>
</body>
</html>