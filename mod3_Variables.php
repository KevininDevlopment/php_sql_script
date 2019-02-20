<html>
		<head>
	<title>Variables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Variables Entered
		</h1>	</div>
				<div data-role="content">

	<?php 
	include 'mod2_config.php';
	include 'mod2_opendb.php';
 
if (isset($_POST['find'])) {
    $VariableArray= filter_input(INPUT_POST, 'VariableArray', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY); 
    sort($VariableArray);
    $alength = count($VariableArray);
    $sql = "INSERT INTO `management` (VariableArray) VALUES ('$VariableArray')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $sql = "SELECT * from `management` WHERE VariableArray  = '$VariableArray' LIMIT 1"; 
        $result = mysqli_query($con, $sql);
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<b> These Are Your Variables in Alphabetical Order:</b><br>";    
            echo "<b>The User Entered:</b> ";
            for($l = 0; $l < count($VariableArray); $l++) {
            	echo "$VariableArray[$l]";
            	if($l < (count($VariableArray) -1)){
            		echo ", ";
            	}
            }

            for($i = 0; $i < $alength; $i++) {
            	echo  '<li type="disk">'  .$VariableArray[$i] .  " " . '</li>' ;
            }
        }
    } else {
        echo "Sorry there are no matches! Please check your entry and try again."
        . mysqli_close($con);;
    } 
}

?>





				<div data-role="footer" data-theme="b">
	  <h4>Pizza Store &copy; 2018</h4>
	</div>
	</body>
</html>


