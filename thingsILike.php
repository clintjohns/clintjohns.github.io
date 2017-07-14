<html>
<body>
<p>Click on the submit button, or press f5, to reload the page</p>
<?php

$colleges=array("caltech.png","mit.png","ucdavis.png","embry-riddle.jpg","trumpu.jpg");
shuffle($colleges);

for ($i=0; $i < count($colleges); $i++) {
	if ($colleges[$i]=="trumpu.jpg") {
		echo "<img src=".$colleges[$i]." height=50 style='border-color: red' border=10>";		
	} else {
		echo "<img src=".$colleges[$i]." height=100>";
	}
}
?>
<br><br><br>
<form>
<input type="submit" value="Shuffle">
</form>

</body>
</html>