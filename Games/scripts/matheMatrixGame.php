<?php
	
	
		if(isset($_POST['submit'])){
		
			
			//The random numbers are stored in these variables
			$a = $_POST['num0'];
			$b = $_POST['num1'];
			$c = $_POST['num2'];
			$d = $_POST['num3'];
			$e = $_POST['num4'];
			$f = $_POST['num5'];
			$g = $_POST['num6'];
			$h = $_POST['num7'];
			$i = $_POST['num8'];
			$j = $_POST['num9'];
					
			//global variables		
			$correct = false;
			$count = 0;
					
					
			//Validate first answer
			function ValidateInputA(&$ans1,&$a,&$b){
			
				$ans1 = $_POST['answer1'];
				if(!is_numeric($ans1) && empty($ans1) == true){
					echo "<strong>YOU HAVE NOT ENTERED A VALUE/ YOU HAVE ENTERED AN INVALID VALUE IN ANSWER 1!</strong>";
				}
				else{
					CalculateSumOfValues($a,$b);
				}
						
			}
			
			//validate second answer
			function ValidateInputB(&$ans2,&$c,&$d){
					
				$ans2 = $_POST['answer2'];
				if(!is_numeric($ans2)&& empty($ans2) == true){
					echo "<strong>YOU HAVE NOT ENTERED A VALUE/ YOU HAVE ENTERED AN INVALID VALUE IN ANSWER 2!</strong>";
				}
				else{
					CalculateDiffOfValues($c,$d);
				}
			}
			
			//valiadet third answer	
			function ValidateInputC(&$ans3,&$e,&$f){
						
				$ans3 = $_POST['answer3'];
				if(!is_numeric($ans3) && empty($ans3) == true){
						echo "<strong>YOU HAVE NOT ENTERED A VALUE/ YOU HAVE ENTERED AN INVALID VALUE IN ANSWER 3!</strong>";
				}
				else{
						CalculateProductOfValues($e,$f);
				}
			}
			
			//validate forth answer
			function ValidateInputD(&$and4,&$g,&$h){
						
				$ans4 = $_POST['answer4'];
				if(!is_numeric($ans4) && empty($ans4) == true){
					echo "<strong>YOU HAVE NOT ENTERED A VALUE/ YOU HAVE ENTERED AN INVALID VALUE IN ANSWER 4!</strong>";
				}
				else{
						CalculateModulusOfValues($g,$h);
				}
			}
			
			//validate fifth answer
			function ValidateInputE(&$ans5,&$i,&$j){
						
				$ans5 = $_POST['answer5'];
				if(!is_numeric($ans5) && empty($ans5) == true){
					echo "<strong>YOU HAVE NOT ENTERED A VALUE/ YOU HAVE ENTERED AN INVALID VALUER IN ANSWER 5!</strong>";
				}
				else{
					CalculateDivisionOfValues($i,$j);
				}
			}
					
//------------------------------------------------------------------------------------------------------------------------------

			//calculate the sum
			function CalculateSumOfValues($value1,$value2){
				global $ans1,$count;
				$sum = $value1 + $value2;
					
				if($sum != $ans1){
					$correct = false;
					echo "<p><b><u>RESULTS</u></b><br>Sum was incorrect</p>";
				}
				else{
					$correct = true;
					echo "<p>Sum was correct</p>";
					$count++;
				}
					
			}
			
			//calculate the difference
			function CalculateDiffOfValues($value1,$value2){
					
				global $ans2,$count;
				$diff = $value1 - $value2;
					
				if($diff != $ans2){
					$correct = false;
					echo "<p>Difference was incorrect</p>";
				}
				else{
					$correct = true;
					echo "<p>Difference was correct</p>";
					$count++;
				}
			}
					
			//calculate the product
			function CalculateProductOfValues($value1,$value2){
					
				global $ans3,$count;
				$product = $value1 * $value2;
					
				if($product != $ans3){
					$correct = false;
					echo "<p>Product was incorrect</p>";
				}
				else{
					$correct = true;
					echo "<p>Product was correct</p>";
					$count++;
				}
			}
			
			//calculate the modulus
			function CalculateModulusOfValues($value1,$value2){
					
				global $ans4,$count;
				$modulus = $value1 % $value2;
					
				if($modulus != $ans4){
					$correct = false;
					echo "<p>Modulus was incorrect</p>";
				}
				else{
					$correct = true;
					echo "<p>Modulus was correct</p>";
					$count++;
				}
			}
			
			//calculate the division
			function CalculateDivisionOfValues($value1,$value2){
					
				global $ans5,$count;
				$division = $value1 / $value2;
					
				if($division != $ans5){
					$correct = false;
					echo "<p>Division was incorrect</p>";
				}
				else{
					$correct = true;
					echo "<p>Division was correct</p>";
					$count++;
				}
			}
					
//---------------------------------------------------------------------------------
			//Method to count the number of answers the user got right

			function CountCorrectAns(){
	
				global $count;
				while($correct){
					$count++;
				}
				return $count;
			}
			
			ValidateInputA($ans1,$a,$b);
			ValidateInputB($ans2,$c,$d);
			ValidateInputC($ans3,$e,$f);
			ValidateInputD($and4,$g,$h);
			ValidateInputE($ans5,$i,$j);

			echo "<p>You have $count correct answers!\n Thank you for playing...</p>";
		}
		else{
			?>
				<html>
				<head><title>MatheMatriX Game</title>
					<LINK href = "css/css_file.css" rel = "stylesheet" rev = "stylesheet">
				</head>
				<body>


				<form name = "frmGame2" action = "matheMatrixGame.php" method = "post">
					<h1>MATHE-MATRIX</h1>
					<center>
					<table style = "background-color: gray">
					<tr><th colspan = "5" style = "background-color: teal">CRACK THIS MATH</th></tr>
					<tr>
						<td><input type ="text" name= "num0" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>+</td> 
						<td><input type ="text" name= "num1" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>=</td> 
						<td><input type = "text" name = "answer1" size = "3" maxlength = "6"></td>
					</tr>
					
					<tr>
						<td><input type ="text" name= "num2" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>-</td> 
						<td><input type ="text" name= "num3" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>=</td> 
						<td><input type = "text" name = "answer2" size = "3" maxlength = "6"></td>
					</tr>
					
					<tr>
						<td><input type ="text" name= "num4" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>*</td> 
						<td><input type ="text" name= "num5" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>=</td> 
						<td><input type = "text" name = "answer3" size = "3" maxlength = "6"></td>
					</tr>
					
					<tr>
						<td><input type ="text" name= "num6" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>%</td> 
						<td><input type ="text"  name= "num7" value = "<?php echo rand(1,100)?>" size = "3"></td>  
						<td>=</td> 
						<td><input type = "text" name = "answer4" size = "3" maxlength = "6"></td>
					</tr>
					
					<tr>
						<td><input type ="text" name= "num8" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>/</td> 
						<td><input type ="text" name= "num9" value = "<?php echo rand(1,100)?>" size = "3"></td> 
						<td>=</td> 
						<td><input type = "text" name = "answer5" size = "3" maxlength = "6"></td>
					</tr>
					</table><br/><br/>
			
						<input type = "submit" name = "submit" value = "Submit Answers">
					</center>
				</form>
				
			<?php
		}
				
?>
<?php
	echo "<p><a href = \"chooseGame.php\"><img id='arrowImg' src='images/arrow_left.jpg' alt='Choose Game'/></a></p>\n";	
?>

<?php include("inc_footer.php");?>
<?php include("inc_logOff.php");?>
</body>
</html>







