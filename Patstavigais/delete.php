<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>
<?php


?>
<h2 align="center">Dzēst inventāra datus<h2> 
<p align="left"><a href="MainPage.php">Sākums  </a>  |  <a href="Inventars.php">Inventārs  </a>  |  <a href="Pievienot.php">Pievienot inventaram </a>|  <a href="delete.php">Dzēst inventāra datus</a>  |  <a href="Rediget.php">Rediģēt inventāra datus</a>  |  <a href="Info.php">Informācija</a></p>

<p> Dzēst datus pēc </p>
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
<button type="submit">Dzēst</button>
</form>


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
    $sql = "DELETE FROM prieksmets WHERE  $b $c $a";
    $result = mysqli_query($conn, $sql);
    echo "Dati dzēsti veiksmigi kur $b $c $a";

    
}
?>

</body>
</html>
