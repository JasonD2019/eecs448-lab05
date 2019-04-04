<?php
    $user_id = $_POST["user_id"];
    $repeat = false;

    // The users can not left the text field empty
    if($user_id == ""){
      echo "STORE FAILED<br>
            The user ID can not be empty.";
    }

    else{
      $mysqli = new mysqli("mysql.eecs.ku.edu", "x398d159", "au9eeWoh", "x398d159");

      /* check connection */
      if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
      }

      // The user already exists
      $result = mysqli_query($mysqli,"SELECT * FROM Users");
      while($row = mysqli_fetch_array($result))
      {
        if( $row['user_id'] == $user_id)
        {
          $repeat = true;
        }
      }
      if($repeat == true){
        echo "STORE FAILED<br>
              The user ID already exists ";
      }


      else{
        echo "STORE SUCCESSFULLY<br> The user ID: ($user_id) has been stored";
        $query = "INSERT INTO Users (user_id)
                VALUES ('$user_id'); ";

        if ($result = $mysqli->query($query)) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
            }

            /* free result set */
            $result->free();
        }
        //echo "STORE SUCCESSFULLY<br> The user ID: $user_id has been stored";
      }

      /* close connection */
      $mysqli->close();
    }
?>
