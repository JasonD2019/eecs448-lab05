<!DOCTYPE html>
<html lang="en">
<style>
td{
  font-family: Comic Sans MS;
  font-style: oblique;
  font-size: 15px;
  text-indent:1em;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5. Display Users</title>
</head>
<body>
    <br>
    <?php
    $con=mysqli_connect("mysql.eecs.ku.edu","x398d159","au9eeWoh","x398d159");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result1 = mysqli_query($con,"SELECT * FROM Users");
    echo "<table border='1'>
    <tr>
    <th>User_id</th>
    </tr>";

    while($row = mysqli_fetch_array($result1))
    {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";

    echo "<br>";
    ?>
</body>
</html>
