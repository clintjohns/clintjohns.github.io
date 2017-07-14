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
	}

	if ($numberOfGuessesRemaining>0) {
		echo "<h1>You guessed: ".$guess."</h1>";
		echo "<form action='hilow2.php' method='post'>";
		echo "Guess a number between 1-100: <input type='text' name='guess' size=4>";
		echo "<input type='hidden' name='answer' value=".$answer.">";
		echo "<input type='hidden' name='numberOfGuessesRemaining' value=".$numberOfGuessesRemaining.">";
		echo "<input type='submit' name='submit' value='Guess'>"; 
		echo "</form>";
		echo "<font color='red'>".$response."</font>";
		echo "<font color='blue'>You have ".$numberOfGuessesRemaining." many guess left.</font>";	
	} else {
		echo "<font color='red'>Game Over! The correct answer was: ".$answer."</font>";
	}
?>

</body>
</html>