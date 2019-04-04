<?php
    $user_id = $_POST["user_id"];
    $content = $_POST["content"];
    $post_id = 0;

    if($content == ""){
      echo "STORE FAILED<br>
            The post has no text ";
    }

    else{
      $mysqli = new mysqli("mysql.eecs.ku.edu", "x398d159", "au9eeWoh", "x398d159");
      if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
      }

      // The user already exists
      $result = mysqli_query($mysqli,"SELECT * FROM Users");
      while($row = mysqli_fetch_array($result))
      {
        $post_id = $post_id + 1;
        if( $row['user_id'] == $user_id)
        {
          $repeat = true;
        }
      }
      if($repeat == false){
        echo "STORE FAILED<br>
              The post was not written by an existing user  ";
      }


      else{
        $query = "INSERT INTO Posts (author_id, content, post_id)
                  VALUES ('$user_id', '$content', '$post_id'); ";
        echo "STORE SUCCESSFULLY<br>
              The user ID: ($user_id) <br>
              The post : $content";
        // $query = "INSERT INTO Posts (author_id, content, post_id)
        //           VALUES ('$user_id', '$content', '$post_id'); ";

        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
            }
            $result->free();
        }
      }
      $mysqli->close();
    }
?>
