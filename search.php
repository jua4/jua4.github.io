<?php
session_start();
include_once 'header.php';
	$delim='%^%^';
	$data = array();
    	if (file_exists ("data.txt")) {
     		$data = file("data.txt");
    	}
   	foreach($data as $datum){
      		$info = explode($delim, $datum);
		if ($info[1]=="knock") {
			print "Knock Knock<br>Who's there?<br>$info[3]<br>$info[3] who?<br>$info[4]<br>";
		} else if ($info[1]=="one") {
			print "$info[3]<br>";
		} else {
			print "Q: $info[3]<br>A: $info[4]";
		}
		print "<hr>";
    	}
?> 



<br>
<h2> Looking for a certain joke? </h2>
<form action="search.php" method="post">
<br/>
	Search by category:
	<select name="subject">
	  <option value="null"> All Subjects </option>
	  <option value=5> 5 stars</option>
	  <option value=4> 4 stars</option>
	  <option value=3> 3 stars</option>
	  <option value=2> 2 stars</option>
	  <option value=1> 1 star </option>
	</select>
	<br>
	Search by joke type:
	<select name="type">
	  <option value="null"> All Types </option>
	  <option value="&#35;random">Knock Knocks</option>
	  <option value="&#35;school">One-Liners</option>
	  <option value="&#35;romance">Classic Q&A</option>
	</select>
	<br> 
    <input type="submit" name="submit" value="Search" />
  </form>
 <br/> 
 
 <?php
	$delimiter='%^%^';
	
	if(isset($_POST['subject']) && isset($_POST['type'])){
		$file = fopen("data.txt",'r');
		$contents= file_get_contents("data.txt");
		if(!$file){
			die("There was a problem opening the data.txt file");
		}
		// get variables
		$subject = $_POST['subject'];
		$type = $_POST['type'];
		$star = $stars;
		if($stars != 'null'){
		$star = "stars".$stars ;
		}
		//break up the contents of the txt file 
		$contents = explode($delimiter, $contents);
		
		//print out only the stuff that fits the parameters
		
		//if you have specifics for both hashtag AND star
		if( $hashtag != 'null' && $star != 'null'){
			$backwards='';
			print("<p>");
			print("You have searched for $stars stars and the $hashtag hashtag.");
			print('<br/> See results below! ');

			foreach($contents as $line){
				if(strstr($line, $hashtag)== FALSE){
				//do nothing LOL
				}
				elseif(strstr($line, $star)==FALSE){
				//do nothing
				}
				elseif(!empty($keyword)){
					if(stringsearch($keyword ,$line)== FALSE){
					//do nothing
					}
					else{
						$backwards= $line.$backwards;	
					}
				}
				else{
				$backwards= $line.$backwards;	
				}
			}
			print($backwards);
			print("</p>");
		}
			//if you just care about star
		elseif( $star != 'null'){
			$backwards='';
			print("<p>");
			print("You have searched for $stars stars and any hashtag.");
			print('<br/> See results below! ');
			foreach($contents as $line){
				if(strstr($line, $star)==FALSE){
				//do nothing
				}
				elseif(!empty($keyword)){
					if(stringsearch($keyword ,$line)== FALSE){
					//do nothing
					}
					else{
						$backwards= $line.$backwards;	
					}
				}
				else{
				$backwards = $line.$backwards;
				}
			}
			print($backwards);
			print("</p>");
		}
		elseif($hashtag != 'null'){
			//just care about hashtag. Star Must be null
			$backwards='';
			print("<p>");
			print("You have searched for any number of stars and the $hashtag hashtag.");
			print('<br/> See results below! ');
			foreach($contents as $line){
				if(strstr($line, $hashtag)==FALSE){
				//do nothing
				}
				elseif(!empty($keyword)){
					if(stringsearch($keyword ,$line)== FALSE){
					//do nothing
					}
					else{
						$backwards= $line.$backwards;	
					}
				}
				else{
				$backwards = $line.$backwards;
				}
			}
			print($backwards);
			print("</p>");
		}
		else{
		print('<p>You searched for any star rating or hashtag, with no keywords!');
		print(' To look at all entries, click on The Stories link above.</p><br/> <br/> <br/>');
		}
		

		print('(If nothing appears, then it is likely we do not have a story that
			fits those categories.) <br/> <br/> ');
		fclose($file);
		
	}

?>
	</div>
	</body>

</html>