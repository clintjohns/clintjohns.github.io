<html>
<body>

<?php

	// if the webpage load is new, set the random number
	// otherwise, retrieve the stored answer and pass it along for the rest of the game
	if (!isset($_POST['answer'])) {
		$answer = rand(1,100);
		$numberOfGuessesRemaining = 10;
	} else {
		$answer = $_POST['answer'];
		$numberOfGuessesRemaining = $_POST['numberOfGuessesRemaining'];
		$numberOfGuessesRemaining--;
	}	

	// retrieve most recent guess
	if (!isset($_POST['guess'])) {
		$guess="";
	} else {
		$guess = $_POST['guess'];
	}

	// compare answer with guess
	// to determine a message to the game player
	if (!is_numeric($guess)) {
		$response="not a number";
	} else if ($guess>100 || $guess<1 ) {
		$response="number must be between 1 and 100";
	} else if ($answer==$guess) {
		$response="correct";
	} else if ($answer>$guess) {
		$response="too low";
	} else if ($answer<$guess) {
		$response="too high";
	} 

?>

<h1>You guessed: <?php echo $guess; ?> </h1>

<form action="hilow.php" method="post">
Guess a number between 1-100: <input type='text' name='guess' size=4>
<input type='hidden' name='answer' value=<?php echo $answer; ?>>
<input type='hidden' name='numberOfGuessesRemaining' value=<?php echo $numberOfGuessesRemaining; ?>>
<input type="submit" name="submit" value="Guess"> 
</form>

<font color='red'>
<?php 
	echo $response;
?>
</font>

<font color='blue'>
<?php 
	echo "You have ".$numberOfGuessesRemaining." many guess left.";
?>
</font>

</body>
</html>