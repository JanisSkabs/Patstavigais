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
<h2 align="center">Inventars<h2> 
<p align="left"><a href="MainPage.php">Sākums  </a>  |  <a href="Inventars.php">Inventārs  </a>  |  <a href="Pievienot.php">Pievienot inventaram </a>  |  <a href="Rediget.php">Rediģēt inventāra datus</a>  |  <a href="Info.php">Informācija</a></p>

<p> Atlasīt datus pēc </p>
<form action="" method= "post" >
<input type="radio" name = "ans" value="prieksmets_ID"> prieksmets_ID </br>
<input type="radio" name = "ans" value="nosaukums"> nosaukums </br>
<input type="radio" name = "ans" value="svars"> svars </br>
<input type="radio" name = "ans" value="datums"> datums </br>
<input type="radio" name = "ans" value="cena"> cena </br>
<input type="radio" name = "ans" value="telpa_ID" checked> telpa </br> </br>
<p><select name="chose" id="chose">
<option value="="> = </option>
<option value=">"> > </option>
<option value="<"> < </option>
</select>
<input type ="text" name="dati"></p>
<button type="submit">Atlasīt</button>
</form>
<?php


?>


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

// Check if any rows were returned
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST["dati"];
    $b = $_POST["ans"];
    $c = $_POST["chose"];
    $sql = "SELECT * FROM prieksmets WHERE $b $c $a";
    $result = mysqli_query($conn, $sql);

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
}
?>

</body>
</html>
