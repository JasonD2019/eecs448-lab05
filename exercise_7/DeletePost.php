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
    <h1>7.Result</h1>
    <?php
      $user_content = $_POST["delete"];

      $servername = "mysql.eecs.ku.edu";
      $username = "x398d159";
      $password = "au9eeWoh";
      $mysqli = new mysqli($servername, $username, $password, $username);

      $query = "SELECT * FROM Posts WHERE content = '$user_content'";
      $result = $mysqli->query($query);
      $row = $result->fetch_assoc();
      $user = $row["author_id"];
      $query2 = "SELECT * FROM Posts WHERE author_id = '$user'";
      $result2 = $mysqli->query($query2);

      $conn = new PDO("mysql:host=$servername;dbname=$username", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM Posts WHERE content = '$user_content'";
      $conn->exec($sql);
      echo "delete successfully";

      $conn = null;
      $mysqli->close();
    ?>
    <br>
  </body>
</html>
