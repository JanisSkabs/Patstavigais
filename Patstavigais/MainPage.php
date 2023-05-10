<!DOCTYPE HTML>  
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<head>
</head>
<body>
<?php


?>
<h2 align="center">Sākums<h2> 
<p align="left"><a href="MainPage.php">Sākums  </a>  |  <a href="Inventars.php">Inventārs  </a>  |  <a href="Pievienot.php">Pievienot inventaram </a>|  <a href="delete.php">Dzēst inventāra datus</a>  |  <a href="Rediget.php">Rediģēt inventāra datus</a>  |  <a href="Info.php">Informācija</a></p>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datubaze";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select data from the table
$sql = "SELECT * FROM prieksmets";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row in an HTML table
    echo "<table>";
    echo "<tr><th>prieksmets_ID</th><th>nosaukums</th><th>svars</th><th>datums</th><th>cena</th><th>telpa_ID</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["prieksmets_ID"]. "</td><td>" . $row["nosaukums"]. "</td><td>" . $row["svars"]. "</td><td>" . $row["datums"]. "</td><td>" . $row["cena"]. "</td><td>" . $row["telpa_ID"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

</body>
</html>
