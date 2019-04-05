<!DOCTYPE html>
<html>
<style>
h1{
  text-indent:2em;
  font-family: Comic Sans MS;
  font-style: oblique;
  font-size: 24px
}
</style>
  <head>
    <meta charset="utf-8">
    <title>7.Result</title>
  </head>
  <body>
    <h1>Result:</h1>
    <?php
    	$checkbox = $_POST["checkbox"];
    	$mysqli = new mysqli("mysql.eecs.ku.edu", "x398d159", "au9eeWoh", "x398d159");

    	if ($mysqli->connect_errno)
    	{
    		printf("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
    	}

    	foreach($checkbox as $post_ID)
    	{
    		$query = "DELETE FROM Posts WHERE post_id = '" . $post_ID  . "'";
    		if($mysqli->query($query))
    		{
    			echo "<p>No." . $post_ID . " has been delete successfully.</p>";
    		}
    		else
    		{
    			echo "<p>Something Wrong.</p>";
    		}
    	}
    	$mysqli->close();
    ?>

    <br>
  </body>
</html>
