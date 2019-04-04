<?php
    $user_id = $_POST["user_id"];
    $con=mysqli_connect("mysql.eecs.ku.edu","x398d159","au9eeWoh","x398d159");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    echo "<table border='1'>
    <tr>
    <th>post_id</th>
    <th>content</th>
    <th>author_id</th>
    </tr>";

    $result = mysqli_query($con,"SELECT * FROM Posts WHERE author_id = $user_id");
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['post_id'] . "</td>";
      echo "<td>" . $row['content'] . "</td>";
      echo "<td>" . $row['author_id'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
?>
