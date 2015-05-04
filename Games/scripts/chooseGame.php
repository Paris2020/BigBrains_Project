<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://wwww.w3.org/TR/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml" >
<head><title>Choose Game</title>
	<LINK href = "css/css_file.css" rel = "stylesheet" type = "text/css">
</head>
<body>

<form name = "frmWelcome" action = "chooseGame.php" method = "post">
		<h1>WELCOME TO BIG - BRAINZ</h1><br/><br/>

		<table id="chooseGame">
			<tr><th><h2>Choose a game:</th></tr>
			<tr><td><input type = "radio" name = "games" value = "unscramble" method = "post"  action = "unscrambleGame.php"/>
						<label for = "unscramble">Unscramble the word</label></td></tr>
				
			<tr><td><input type = "radio" name = "games"  value = "math" method = "post" action = "matheMatrixGame"/>
						<label for = "math">MatheMatriX</label></td></tr>
				
			<tr><td><input id="button" type = "submit" name = "submit" value = "Go to Game " size = "50"/></td></tr>
		</table>
</form>

<?php
		/* - ony and only if the user clicks the submit button will the program register the radiobutton clicks
		   - check whick radio button is selected and direct the user to the selected game
		*/

		if(isset($_POST['submit'])){
			if($_POST['games'] == "unscramble"){
				header("Location: unscrambleGame.php");
			}
			elseif($_POST['games']	== "math"){
				header("Location: matheMatrixGame.php");
			}	
		}
?>
<?php include("inc_footer.php");?>
<?php include("inc_logOff.php");?>













