<?php
$conn = mysqli_connect("localhost", "root", "123admin", "sisint");

// Función que devuelve el total de casos de respuesta de un atributo
function ent_total($conn, $atributo, $respuesta){
    $temp = mysqli_query($conn, "SELECT * FROM encuesta WHERE $atributo = '$respuesta'");
    $resultado = mysqli_num_rows($temp);
    return $resultado;
}

// Función que devuelve casos positivos o negativos la categoria
function categoria_ind($conn, $res_cat){
    $temp = mysqli_query($conn, "SELECT * FROM encuesta WHERE Categoria = '$res_cat'");
    $resultado = mysqli_num_rows($temp);
    return $resultado;
}

// Total casos de categoría (Total de respuestas de la encuesta)
$total = mysqli_query($conn, "SELECT * FROM encuesta");
$respuestas =  mysqli_num_rows($total);

// Verificar conexión a database
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}


/* Asignación de valores para la entropia 
===================================================================
Entropia primer atributo (Estado de animo cuando se escucha música)
=================================================================== */
$Feliz = ent_total($conn, "Animo", "Feliz");
$Tiste = ent_total($conn, "Animo", "Tiste");
$Nomus = ent_total($conn, "Animo", "Nomus");

/* =======================================================
Entropia segundo atributo (Genero de música que se esucha)
========================================================== */
$Rock = ent_total($conn, "Musica", "Rock");
$Pop = ent_total($conn, "Musica", "Pop");
$Banda = ent_total($conn, "Musica", "Banda");
$Reggaeton = ent_total($conn, "Musica", "Reggaeton");
$Cumbias = ent_total($conn, "Musica", "Cumbias");
$Rap = ent_total($conn, "Musica", "Rap");
$Electronica = ent_total($conn, "Musica", "Electronica");
$Nogen = ent_total($conn, "Musica", "Nogen");

/* ==========================================================
Entropia tercer atributo (Genero de audiolibro que se escuha)
============================================================= */
$Terroraud = ent_total($conn, "Audiolib", "Terroraud");
$Comedia = ent_total($conn, "Audiolib", "Comedia");
$Romantico = ent_total($conn, "Audiolib", "Romantico");
$Ficcion = ent_total($conn, "Audiolib", "Ficcion");
$Nolib = ent_total($conn, "Audiolib", "Nolib");

/* =======================================================
Entropia cuarto atributo (Genero de podcast que se escuha)
========================================================== */
$Terrorpod = ent_total($conn, "Podcast", "Terrorpod");
$Politica = ent_total($conn, "Podcast", "Politica");
$Videojuegos = ent_total($conn, "Podcast", "Videojuegos");
$Musica = ent_total($conn, "Podcast", "Musica");
$Cine = ent_total($conn, "Podcast", "Cine");
$Nopod = ent_total($conn, "Podcast", "Nopod");

/* ============================================
Entropia Categoria (Utilizarías la aplicación?)
=============================================== */
$categoria_pos = categoria_ind($conn, "S");
$categoria_neg = categoria_ind($conn, "N");
/*

// Firma dígital Harryn Vega ©
// PSDT: Harryn, porfavor recuerda que para poder utilizar mysqli_query dentro de una función
// Se debe pasar también la variable de acceso al database, en este caso $conn, bexox
// PSDT2: También recuerda que debes usar '' cuando quieras que se pase como texto de asignación
// Y no usarlo cuando quieras que se pase como texto de nombre, besos mi campeón

// Redirecciona a otro archivo php
header("Location: display.php", TRUE, 301);
exit()
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        var feliz = <?php echo $Feliz;?>;
        var tiste = <?php echo $Tiste;?>;
        var nomus = <?php echo $Nomus;?>;

        var rock = <?php echo $Rock;?>;
        var pop = <?php echo $Pop;?>;
        var banda = <?php echo $Banda;?>;
        var rgt = <?php echo $Reggaeton;?>;
        var cumbia = <?php echo $Cumbias;?>;
        var rap = <?php echo $Rap;?>;
        var elec = <?php echo $Electronica;?>;
        var nogen = <?php echo $Nogen;?>;

        var terroraud = <?php echo $Terroraud;?>;
        var comedia = <?php echo $Comedia;?>;
        var romantico = <?php echo $Romantico;?>;
        var ficcion = <?php echo $Ficcion;?>;
        var nolib = <?php echo $Nolib;?>;

        var terrorpod = <?php echo $Terrorpod;?>;
        var politica = <?php echo $Politica;?>;
        var videojuegos = <?php echo $Videojuegos;?>;
        var musica = <?php echo $Musica;?>;
        var cine = <?php echo $Cine;?>;
        var nopod = <?php echo $Nopod;?>;

        var si = <?php echo $categoria_pos;?>;
        var no = <?php echo $categoria_neg;?>;
        var cattot = <?php echo $respuestas;?>;
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="titulo">
        <h1>Resultados de la encuesta</h1>
    </div>
    <div class="container">
        <div class="result">
            <h2>Estado de animo en el que se esucha música</h2>
            <div class="grafica">
                <canvas id="Estado_Animo" width="400" height="400"></canvas>
            </div>
            <br>
            <div class="container">
                <div class="frases">El <?php echo (bcdiv($Feliz, $respuestas, 2)*100);?>% de las personas escuchan música cuando se sienten felices</div>
                <div class="frases">El <?php echo (bcdiv($Tiste, $respuestas, 2)*100);?>% de las personas escuchan música cuando se sienten tristes</div>
                <div class="frases">El <?php echo (bcdiv($Nomus, $respuestas, 2)*100);?>% de las personas no escuchan música</div>
            </div>
        </div>
        <div class="result">
            <h2>Genero de música que más se suele escuchar</h2>
            <div class="grafica">
                <canvas id="Genero_Musica" width="400" height="400"></canvas>
            </div>
            <div class="lista">
                <ul>
                    <li>El <?php echo (bcdiv($Rock, $respuestas, 2)*100);?>% de las personas escuchan Rock</li>
                    <li>El <?php echo (bcdiv($Pop, $respuestas, 2)*100);?>% de las personas escuchan Pop</li>
                    <li>El <?php echo (bcdiv($Banda, $respuestas, 2)*100);?>% de las personas escuchan Banda o Corridos</li>
                    <li>El <?php echo (bcdiv($Reggaeton, $respuestas, 2)*100);?>% de las personas escuchan Reggaeton</li>
                    <li>El <?php echo (bcdiv($Cumbias, $respuestas, 2)*100);?>% de las personas escuchan Cumbias</li>
                    <li>El <?php echo (bcdiv($Rap, $respuestas, 2)*100);?>% de las personas escuchan Rap</li>
                    <li>El <?php echo (bcdiv($Electronica, $respuestas, 2)*100);?>% de las personas escuchan Electrónica</li>
                    <li>El <?php echo (bcdiv($Nogen, $respuestas, 2)*100);?>% de las personas no escuchan música</li>
                </ul>
            </div>
        </div>
        <div class="result">
            <h2>Genero de audiolibro que más se suele escuchar</h2>
            <div class="grafica">
                <canvas id="Genero_Audiolibro" width="400" height="400"></canvas>
            </div>
            <div class="lista">
                <ul>
                    <li>El <?php echo (bcdiv($Terroraud, $respuestas, 2)*100);?>% de las personas escuchan audiolibros de teror</li>
                    <li>El <?php echo (bcdiv($Comedia, $respuestas, 2)*100);?>% de las personas escuchan audiolibros de comedia</li>
                    <li>El <?php echo (bcdiv($Romantico, $respuestas, 2)*100);?>% de las personas escuchan audiolibros de romanticos</li>
                    <li>El <?php echo (bcdiv($Ficcion, $respuestas, 2)*100);?>% de las personas escuchan audiolibros de ficción</li>
                    <li>El <?php echo (bcdiv($Nolib, $respuestas, 2)*100);?>% de las personas no escuchan audiolibros</li>
                </ul>
            </div>
        </div>
        <div class="result">
            <h2>Categoría de podcast que más se suele escuchar</h2>
            <div class="grafica">
                <canvas id="Genero_Podcast" width="400" height="400"></canvas>
            </div>
            <div class="lista">
                <ul>
                    <li>El <?php echo (bcdiv($Terrorpod, $respuestas, 2)*100);?>% de las personas escuchan podcast de terror</li>
                    <li>El <?php echo (bcdiv($Politica, $respuestas, 2)*100);?>% de las personas escuchan podcast sobre política</li>
                    <li>El <?php echo (bcdiv($Videojuegos, $respuestas, 2)*100);?>% de las personas escuchan podcast de videojuegos</li>
                    <li>El <?php echo (bcdiv($Musica, $respuestas, 2)*100);?>% de las personas escuchan podcast sobre música</li>
                    <li>El <?php echo (bcdiv($Cine, $respuestas, 2)*100);?>% de las personas escuchan podcast referentes al cine</li>
                    <li>El <?php echo (bcdiv($Nopod, $respuestas, 2)*100);?>% de las personas no escuchan podcast</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="titulo">
        <h2>Posibles nuevos usuarios</h2>
        <div class="graficafinal">
            <canvas id="Usuarios_Nuevos" width="400" height="400"></canvas>
        </div>
        <div class="container">
            <div class="frase">El <?php echo (bcdiv($categoria_pos, $respuestas, 2)*100);?>% de las personas encuestadas sería un usuario potencial</div>
            <div class="frase">El <?php echo (bcdiv($categoria_neg, $respuestas, 2)*100);?>% de las personas encuestadas no utilizaría la aplicación</div>
        </div>
    </div>
    <script type="text/javascript" src="../js/graficas.js"></script>
</body>
</html>