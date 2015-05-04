<?php
		/*- code to execute when submit button is clicked
		  - this is the main program
		*/
		if(isset($_POST['submit'])){
			
			//global variables			
			$question = $_POST['randomQuestion'];
			$answer = $_POST['answer'];
			
			//global arrays of question and correct answers
			$ques = array("A component that embodies who we are.","An inevitable and almost impossible to escape human-act.","Not traditional, not of the usual",
							"Knowing who is around and who is talking with whom.","That window is obviously ____ because I can see right through it.",
							"Usually has more than one keyword,parameters and parenthesis that embody them.","Its a pledge, almost compulsory to learn and is like a prayer.",
							"Helps identify each other in a crowd and makes us look equal.","Propaganda's most infamous characteristic.","A conversation with a purpose.");
		
			$corrAns = array("character","interaction","unconventional","awareness","translucent",
							"function","anthem","uniform","persuade","interview");
				
			//the currIndex will be assigned whatever the random question was generated
			//we used the array_search() methiod that returns the current index of a searched element in an array
			$currIndex= array_search($question,$ques);
		
			/* - if the method ValidateUserInput() returns true,start to compare the users answer to the correct answer
			   - If all is good in input answer as well as the compared answer then display an appropriate message alerting the user that their answer is correct
			   - otherwise display an appropriate message alerting the user that their answer is incorrect
			   - if the user input was invalid, display an appropriate message alerting the user that their answer is of the incorrect input type 
			*/
			if (ValidateUserInput($answer)){
				if (CompareGuessToCorrectAnswer($answer,$corrAns,$currIndex)){
					echo "<p>The answer: " ,$answer," was CORRECT! </p>";
				}
				else{
					echo "<p>The answer: " ,$answer," was INCORRECT! </p>";
				}
			}
			else{
				echo "<p> Invalid Message: The answer MUST be a string value! - " ,$answer,".</p>";
			}
		}
		else{
		
			// code if the form is loaded for the first time
			ReloadPage();
		}
		
		
		/* - Validate User input
		   - if the users iput is numeric return false other wise return true
		*/
		function ValidateUserInput(&$answer){
			if(is_numeric($answer)){
				return false;
			}
			else{
				return true;
			}
		}
		
		
		/* - Method to compare the users answer to the $corrAns array
		   - remember the $currIndex holdd the current value of the $ques array and since they are parallel arrays, the indexes are equal
		   - i.e the users answer must be equivalent to the index of the $ques array which is has the same index as $corrAns array
		   - if it does we return true, otherwise, we return false 
		*/
		function CompareGuessToCorrectAnswer(&$answer,&$corrAns,&$currIndex){
			if($answer == $corrAns[$currIndex])
				return true;
			else
				return false;
		}

		/* - Redisplay the form
		   - generate and display a random question using the rand() function
		   - shuffle the correct answers using str_shuffle() for the user to guess what the answer could be
		*/
		function ReloadPage(){
		
				?>
				<html>
				<head><title>Unscramble-The-Words Game</title>
					<LINK href = "css/css_file.css" rel = "stylesheet" type = "text/css">
				</head>
				<body>
				
					<form name = "frmUnscramble" action = "unscrambleGame.php" method = "post">
					<h1>UNSCRAMBLE THE WORD</h1>
			
					<p><center>
					<table style = "background-color: grey" >
							<tr> <th>CAN YOU UNSCRAMBLE THIS....</th> </tr><br/>
							<tr> <td><input type = "text" name = "randomQuestion" value = "<?php 
								
							//random questions displayed in the table
							$ques = array("A component that embodies who we are.","An inevitable and almost impossible to escape human-act.","Not traditional, not of the usual",
							"Knowing who is around and who is talking with whom.","That window is obviously ____ because I can see right through it.",
							"Usually has more than one keyword,parameters and parenthesis that embody them.","Its a pledge, almost compulsory to learn and is like a prayer.",
							"Helps identify each other in a crowd and makes us look equal.","Propaganda's most infamous characteristic.","A conversation with a purpose.");
							
							//use the rand() to generate a random number between 0-9
							//pass this generated number to hold the indx of the array $ques
							$x = rand(0,9);
							echo $ques[$x]; ?>"  size = "90"/></td> </tr>
							
					</table>
					</center></p>
				
					<p><center>
					<table style = "background-color: grey" >
						<th colspan = "2">FIND THE WORD...</th>
						
						<tr> <td><input type="text" value = "<?php echo str_shuffle("character"); ?>"/></td> 
							 <td><input type="text" value = "<?php echo str_shuffle("interaction"); ?>"/></td> 
						</tr>
						
						<tr> <td><input type="text" value = "<?php echo str_shuffle("unconventional"); ?>"/></td> 
							 <td><input type="text" value = "<?php echo str_shuffle("awareness"); ?>"/></td> 
						</tr>
						
						<tr> <td><input type="text" value = "<?php echo str_shuffle("translucent"); ?>"/></td> 
							 <td><input type="text" value = "<?php echo str_shuffle("function"); ?>"/></td> 
						</tr>
						
						<tr> <td><input type="text" value = "<?php echo str_shuffle("anthem"); ?>"/></td> 
							 <td><input type="text" value = "<?php echo str_shuffle("uniform"); ?>"/></td> 
						</tr>
						
						<tr> <td><input type="text" value = "<?php echo str_shuffle("persuade"); ?>"/></td> 
							 <td><input type="text" value = "<?php echo str_shuffle("interview"); ?>"/></td> 
						</tr>
					</table>
					</center></p>
				
					<p><center>
						<input type = "text" name = "answer">
					</center></p>
				
					<p STYLE = "text-align: center">
						<input type = "submit" name = "submit" value = "Submit Answer"/>
					</p>
				</form>
			</center>
		</body>
	</html>
	<?php
		
	}		
?>

<?php
	echo "<p><a href = \"chooseGame.php\"><img id='arrowImg' src='images/arrow_left.jpg' alt='Choose a Game'/></a></p>\n";
?> 

<?php include("inc_footer.php");?>
<?php include("inc_logOff.php");?>
</body>
</html>
