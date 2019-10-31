<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>
     Mobile search
   </title>
  <head>
 <style>
.center{
	text-align:center;
	 
}
.button{
	border:none;
	background: #3a7999;
	color:#f2f2f2;
	padding:11px 40px;
	font-size:18px;
	box-sizing:border-box;
	transition:all 500ms ease;
}
.button:hover{
	background:rgba(0,0,0,0);
	color: #3a7999;
	box-shadow:insert 0 0 0 3px #3a7999;
}
label{
	color:blue;
	font-family:  Marker Felt, fantasy;
	font-size: 30px;
}



body { 
  min-height: 100px;
  height: 10vh;
  margin: 0;
  background: radial-gradient(circle, darken(dodgerblue, 10%), #1f4f96, #1b2949, #000);
}

.stage {
  height: 850px;
  width: 10px;
  margin: auto;
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  perspective: 9999px;
  transform-style: preserve-3d;
}

.layer {
  width: 50%;
  height: 50%;
  position: absolute;
  transform-style: preserve-3d;
  animation: ಠ_ಠ 5s infinite alternate ease-in-out -7.5s;
  animation-fill-mode: forwards;
  transform: rotateY(40deg) rotateX(33deg) translateZ(0);
}

.layer:after {
  font-family:  Marker Felt, fantasy;
  font-size: 50px;
  content: 'Mobile Search!';
  white-space: pre;
  text-align: center;
  height: 10%;
  width: 10%;
  position: absolute;
  top: 50px; 
  color: darken(#fff, 12%);
  letter-spacing: -2px;
  text-shadow: 4px 0 10px hsla(0, 0%, 0%, .13);
}

$i: 1;
$NUM_LAYERS: 20;
@for $i from 1 through $NUM_LAYERS {
  .layer:nth-child(#{$i}):after{
    transform: translateZ(($i - 1) * -1.5px);
  }
}

.layer:nth-child(n+#{round($NUM_LAYERS/2)}):after {
  -webkit-text-stroke: 3px hsla(0, 0%, 0%, .25);
}

.layer:nth-child(n+#{round($NUM_LAYERS/2 + 1)}):after {
  -webkit-text-stroke: 15px dodgerblue;
  text-shadow: 6px 0 6px darken(dodgerblue,35%),
               5px 5px 5px darken(dodgerblue,40%),
               0 6px 6px darken(dodgerblue,35%);
}

.layer:nth-child(n+#{round($NUM_LAYERS/2 + 2)}):after {
  -webkit-text-stroke: 15px darken(dodgerblue, 10%);
}

.layer:last-child:after {
  -webkit-text-stroke: 17px hsla(0, 0%, 0%, .1);
}

.layer:first-child:after{
  color: #fff;
  text-shadow: none;
}

@keyframes ಠ_ಠ {
  100% { transform: rotateY(40deg) rotateX(-33deg); }
}

 
 select {
    width: 30%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
	body {background-color: powderblue;}
	.custom-select {
		position: relative;
		font-family: Arial;
	}
	.custom-select select {
		display: none; /*hide original SELECT element:*/
	}
	.select-selected {
		background-color: DodgerBlue;
	}
	.select-selected:after {
		position: absolute;
		content: "";
		top: 14px;
		right: 10px;
		width: 0;
		height: 0;
		border: 6px solid transparent;
		border-color: #fff transparent transparent transparent;
}

</style>	  
  
   
  </head>
<body>
<img STYLE="position:absolute;LEFT:290px;" src="tmobiles.png"  width="200" height="190"  >
<img STYLE="position:absolute;RIGHT:250px;" src="iphone.png"  width="300" height="190"  >
   <form method="post">
   
   <div class="stage">
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div> 
</div>
   
<br><br><br><br><br><br><br>
   <center><label>Search:</label><input type="text" name="name"  ></center><br>
   <br>
	<center><select class="custom-select"  name="sites[]">
		<option value="0">--Select site--</option>
		<option value="eb">ebay</option>
		<option value="bb">Bestbuy</option>
		<option value="ae">AliExpress</option>
	</select></center><br>

	<center><input class="button" type="submit" value="GO" name="GO"></center>
	<marquee behavior="scroll" direction="left" hspace=10>

 <img hspace="30" src=best-buy-mobile.png height=150 width=100 alt="Bestbuy"></img>    	
  <img hspace="30" src="ebaymobile1.gif" height=150 width=100 alt="Ebay"></img> 
  <img hspace="30" src="AliExp.png" height=100 width=200 alt="AliExpress"></img>
</marquee>
   </form>
 </body>
</html>

<?php
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: text/html; charset=UTF-8');
function convert_ascii($string) 
{ 
  // Replace Single Curly Quotes
  $search[]  = chr(226).chr(128).chr(152);
  $replace[] = "'";
  $search[]  = chr(226).chr(128).chr(153);
  $replace[] = "'";
  // Replace Smart Double Curly Quotes
  $search[]  = chr(226).chr(128).chr(156);
  $replace[] = '"';
  $search[]  = chr(226).chr(128).chr(157);
  $replace[] = '"';
  // Replace En Dash
  $search[]  = chr(226).chr(128).chr(147);
  $replace[] = '--';
  // Replace Em Dash
  $search[]  = chr(226).chr(128).chr(148);
  $replace[] = '---';
  // Replace Bullet
  $search[]  = chr(226).chr(128).chr(162);
  $replace[] = '*';
  // Replace Middle Dot
  $search[]  = chr(194).chr(183);
  $replace[] = '*';
  // Replace Ellipsis with three consecutive dots
  $search[]  = chr(226).chr(128).chr(166);
  $replace[] = '...';
  // Apply Replacements
  $string = str_replace($search, $replace, $string);
  // Remove any non-ASCII Characters
  $string = preg_replace("/[^\x01-\x7F]/","", $string);
  return $string; 
}
echo '<html>
<head>
<style type="text/css">
table {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 70%; 
	height:50%
    border-collapse: 
    collapse; border-spacing: 0; 
}
td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}
th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {  
    background: #FAFAFA;
    text-align: center;
}

tr:nth-of-type(even) td { background: #F1F1F1; } 
tr:nth-of-type(odd) td { background: #FEFEFE; }
tr td:hover { background: #666; color: #FFF; }

.t1 {
		height: 400px;
        overflow-y: scroll;    // use auto; or scroll; to allow vertical scrolling; 
        overflow-x: hidden;    // disable horizontal scroll 
		height: 300px;
    }
</style>
</head>

</html>';

	if(isset($_POST['GO']))
	{
		$text=$_POST["name"];
		if($text===""){
			echo "You haven't entered anything";
		}
		else{
		$aSites = $_POST['sites'];

		if($aSites[0]=="0")
  {
	//		echo("<p>You didn't select any site!</p>\n");
			shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\ebay.py ".$_POST["name"]." 2>&1"));
			shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\bestbuy.py ".$_POST["name"]." 2>&1"));
			shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\aliexpress.py ".$_POST["name"]." 2>&1"));
			$output=(shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\integrate.py ".$_POST["name"]." 2>&1")));
			
			$a=explode('?',$output);
			
			
			$h=0;
			$ww=1;
			echo"<div class='t1' >";
			echo'<table  align=center border=1" >';
			foreach($a as $v){
				
				$e=explode(',',$v);
				
				if($ww==1){
				
				echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>"; 
				echo "<th>Price</th>";
				echo "</tr>";
				}
				$ww=0;
				echo "<tr>";
				echo "<td>$e[0]</td>";
				echo "<td>$e[1]</td>";
				echo "<td>$e[2]</td>";
				echo "</tr>";
				#echo "<table border='1'>";
				#echo "<tr><td>$v</td></tr>";
				
				$h=$h+1;
			}
			echo "</table>";			
			echo"</div>";
			
  }	

		else if($aSites[0]=="eb"){
		
	    $output= (shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\ebay.py ".$_POST["name"]." 2>&1")));
		#echo "<pre>$output</pre>";
		$a=explode('?',$output);
			
			
			$h=0;
			$ww=1;
			foreach($a as $v){
				
				$e=explode(',',$v);
				
				if($ww==1){
				echo"<div class='t1' >";
				echo"<table border=1 align=center>";
				echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>";
				echo "<th>Subtitle</th>";
				echo "<th>Rating</th>";
				echo "<th>Price</th>";
				echo "</tr>";
				}
				$ww=0;
				echo "<tr>";
				echo "<td>$h</td>";
				echo "<td>$e[0]</td>";
				echo "<td>$e[1]</td>";
				echo "<td>$e[2]</td>";
				echo "<td>$e[3]</td>";
				echo "</tr>";
				#echo "<table border='1'>";
				#echo "<tr><td>$v</td></tr>";
				
				$h=$h+1;
			}
			echo "</table>";
				echo"</div>";
		}
		else if($aSites[0]=="bb"){ 
		
	    $output= (shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\bestbuy.py ".$_POST["name"]." 2>&1")));
		#echo "<pre>$output</pre>";
		$a=explode('?',$output);
			
			
			$h=0;
			$ww=1;
			foreach($a as $v){
				
				$e=explode(',',$v);
				
				if($ww==1){
				echo"<div class='t1' >";
				echo"<table border=1 align=center>";
				echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>"; 
				echo "<th>Price</th>";
				echo "<th>Rating</th>";
				echo "</tr>";
				}
				$ww=0;
				echo "<tr>";
				echo "<td>$e[0]</td>";
				echo "<td>$e[1]</td>";
				echo "<td>$e[2]</td>";
				echo "<td>$e[3]</td>";
				echo "</tr>";
				#echo "<table border='1'>";
				#echo "<tr><td>$v</td></tr>";
				
				$h=$h+1;
			}
			echo "</table>";
				echo"</div>";
		}
		else if($aSites[0]=="ae"){
		
	    $output= (shell_exec(convert_ascii("python ‪‪‪C:\\wamp64\\www\\Project\\aliexpress.py ".$_POST["name"]." 2>&1")));
		#echo "<pre>$output</pre>";
		$a=explode('?',$output);
			
			
			$h=0;
			$ww=1;
			foreach($a as $v){
				
				$e=explode(',',$v);
				
				if($ww==1){
				echo"<div class='t1' >";
				echo"<table border=1 align=center>";
				echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>"; 
				echo "<th>Price</th>";
				echo "<th>Orders</th>";
				echo "<th>Condition</th>";
				echo "</tr>";
				}
				$ww=0;
				echo "<tr>";
				echo "<td>$h</td>";
				echo "<td>$e[0]</td>";
				echo "<td>$e[1]</td>";
				echo "<td>$e[2]</td>";
				echo "<td>$e[3]</td>";
				echo "</tr>";
				#echo "<table border='1'>";
				#echo "<tr><td>$v</td></tr>";
				
				$h=$h+1;
			}
			echo "</table>";	
				echo"</div>";
		}
		
		}
		
	}	
	
?>




