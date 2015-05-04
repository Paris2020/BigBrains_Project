<?php
	
	//Re-directs the user to the login page when the user enters invalid data(username and passsword)
	//it is not part of the main program
	function RevertToLoginForm(){
		?>
								
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://wwww.w3.org/TR/xhtml1-strict.dtd">

				<html xmlns = "http://www.w3.org/1999/xhtml" >
				<head><title>Login Page</title>
				<LINK href = "css/css_file.css" rel = "stylesheet" type = "text/css">
	
				</head>	
				<body>	
					
						<form name = "frmLogin" action = "login.php" method = "post">
						<h1>WELCOME TO BIG-BRAINZ</h1><br/><br/>
								<p><center><img src = "images/AlbumArtSmall.jpg" alt = "Picture here"></center></p>
							<p><center>
							<table>
							<tr><th colspan = "2">LOGIN</th></tr>
							<tr>
								<td>Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
								<td><input type = "text" name = "username" value = "<?php echo $_POST['username']; ?>" maxlength = "45"></td>
							</tr><br/>
							
							<tr>
								<td>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
								<td><input type = "password" name = "password" value = "" maxlength = "9" ></td>
							</tr><br/>
							
							<tr>
								<td colspan = "2" style = "text-align:center">
								<input type = "submit" name = "login" value = "Login Game" size = "20" ></td>
							</tr>
							</table>
							</center></p>
						</form>
					
					</body>
				</html>
			<?php
		}
	
	//the main program
	/* - only if the login button is clicked will data(username and password) be validated
	   - othe wise we redisplay the form
	*/
		if(isset($_POST['login'])){
	
			//global variables
			$userName = stripslashes($_POST['username']);	//stripslashes removes any slashes before a single/double quote and NULL character
			$passWord = stripslashes($_POST['password']);
			
			/* - Validates data based on the outcomes of the two methods
			   - only direct the user to the welcomePage.php if both validations of username and password are correct in the respective methods
			   - other wise if either one of the methods return a false, then re-display the web form - RevertToLoginForm()
			*/
			function ValidateData(&$userName,&$passWord){
			
				if(ValidateUsername($userName) && ValidatePassword($passWord)){
					header("Location: chooseGame.php");
				}
				else{
						RevertToLoginForm();
				}
			}
		
			/* - Validates the username
			   - the textbox must not be empty and the username must matche the preg_match() pattern
			   - currentlty there are three users and the username must match the elements in the array of valid users
			   - if both if statements are satisfied, return true other wise return false and display an appropriate message
			*/
			function ValidateUsername(&$userName){
				$validUsernames = array("john.michael@bigbrainz.co.za","dineo06.moseki@bigbrainz.co.za","sherperd.dube@bigbrainz.co.za");
				
				if(empty($userName) == false && preg_match("/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@bigbrainz.co.za$/",$userName) == 1){
					if($userName == $validUsernames[0]  || $userName == $validUsernames[1] || $userName == $validUsernames[2]){
						return true;
					}
					else{
						echo "<strong>INVALID USERNAME</strong>";
						return false;
					}
				}
			}
		
			/* - Validates the password
			   - declare the correct password and store it as a hash value that will be compared to the users "password" 
			   - if there is an entered password and it is correct,return true, other wise return false and display an appropriate message
			*/
			function ValidatePassword(&$passWord){
				$correctPass = "P@55w0rd!";
				$storedHash = md5($correctPass);	//generate the one-way hash value
				
				if(empty($passWord) == false && md5($passWord) == $storedHash){
						return true;
				}
				else{
						echo "<strong>WRONG PASSWORD</strong>";
						return false;
				}
			}
		
			ValidateData($userName,$passWord);	//call the method to validate	
		}
		else
		{
			?>
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://wwww.w3.org/TR/xhtml1-strict.dtd">

				<html xmlns = "http://www.w3.org/1999/xhtml" >
				<head><title>Login Page</title>
				<LINK href = "css/css_file.css" rel = "stylesheet" type = "text/css">
	
				</head>	
				<body>	
					<center>
						<form name = "frmLogin" action = "login.php" method = "post">
						<h1>WELCOME TO BIG-BRAINZ</h1><br/><br/>
						
								<p><center><img src="images/AlbumArtSmall.jpg" width="50" height="50" alt = "Picture here"></center></p>
							<p>
							<table>
							<tr><th colspan = "2">LOGIN</th></tr>
							<tr>
								<td>Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
								<td><input type = "text" name = "username" value = "" maxlength = "45"></td>
							</tr><br/>
							
							<tr>
								<td>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
								<td><input type = "password" name = "password" value = "" maxlength = "9" ></td>
							</tr><br/>
							
							<tr>
								<td colspan = "2" style = "text-align:center">
								<input type = "submit" name = "login" value = "Login Game" size = "20" ></td>
							</tr>
							</table>
							</p>
						</form>	
						</center>
					</body>
				</html>
			<?php
		}
		?>
		
		<?php include("inc_footer.php");?>
</body>
</html>