<?php
$conn = mysqli_connect("localhost", "root", "123admin", "sisint");

// Captura de variables mediante el metódo POST
$animo = $_POST['animo'];
$genmus = $_POST['genmus'];
$genaud = $_POST['genaud'];
$genpod = $_POST['genpod'];
$categoria = $_POST['categoria'];

//Prueba de valor de variables
echo "$animo, $genmus, $genaud, $genpod, $categoria";

// Inserción de respuestas de la encuesta al database
$sqlInput = "INSERT INTO encuesta (Animo, Musica, Audiolib, Podcast, Categoria)
VALUES ('$animo', '$genmus', '$genaud', '$genpod', '$categoria')";
mysqli_query($conn, $sqlInput);

header("Location: salida.php", TRUE, 301);
exit()
?>