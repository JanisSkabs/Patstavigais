<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>
<h1 align="center">Pievienot inventāram<h1> 
<p align="left"><a href="MainPage.php">Sākums  </a>  |  <a href="Inventars.php">Inventārs  </a>  |  <a href="Pievienot.php">Pievienot inventaram </a>  |  <a href="Rediget.php">Rediģēt inventāra datus</a>  |  <a href="Info.php">Informācija</a></p>
<form action="" method= "post" >
<h5 align="left"><break><break>
<p>Nosaukums<input type ="text" name="sk1"></p>
<p>Svars<input type ="int" name="sk2">Kg</p>
<p>Datums<input type ="Date" name="sk3"></p>
<p>Cena<input type ="int" name="sk4">€</p>
<p>Telpa<input type ="text" name="sk5"></p>
<input type="submit" value= "Pievienot">
</h5>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datubaze";

// izveido savienjumu ar DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

//datu pievienosana
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get form input values
  $a = $_POST["sk1"];
  $b= $_POST["sk2"];
  $c= $_POST["sk3"];
  $d = $_POST["sk4"];
  $e= $_POST["sk5"];


  // check if input values are not empty
  if (!empty($a) && !empty($b) && !empty($c) && !empty($d) && !empty($e)) {
    // process the form data
    $sql = "INSERT INTO prieksmets (nosaukums, svars, datums, cena, telpa_ID)
    VALUES ('$a', '$b', '$c', '$d', '$e')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  } else {
    // display error message if input values are empty
    echo '<script>alert("Lūdzu aizpildi visus informacijas lauciņus!");</script>';
  }
}


?>

</body>
</html>
