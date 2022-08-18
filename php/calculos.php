<?php
    $conn = mysqli_connect("localhost", "root", "123admin", "sisint");

    // Función entropía ;-;
    function entropia($conn, $atributo, $respuesta){
        $CasosPositivos = mysqli_query($conn, "SELECT * FROM encuesta WHERE $atributo = '$respuesta' AND Categoria = 'S'");
        $CasosNegativos = mysqli_query($conn, "SELECT * FROM encuesta WHERE $atributo = '$respuesta' AND Categoria = 'N'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta WHERE $atributo = '$respuesta'");
        $CasosPositivos = mysqli_num_rows($CasosPositivos);
        $CasosNegativos = mysqli_num_rows($CasosNegativos);
        $CasosTotales = mysqli_num_rows($CasosTotales);
        $resultado = (- (($CasosPositivos/$CasosTotales) * (Log(($CasosPositivos/$CasosTotales),2)))) 
        - (($CasosNegativos/$CasosTotales) * (Log(($CasosNegativos/$CasosTotales),2)));
        if (is_nan(Log(($CasosPositivos/$CasosTotales),2)) == true || is_nan((Log(($CasosNegativos/$CasosTotales),2))) == true || Log(($CasosPositivos/$CasosTotales),2) == -INF || Log(($CasosNegativos/$CasosTotales),2) == -INF || Log(($CasosPositivos/$CasosTotales),2) == INF || Log(($CasosNegativos/$CasosTotales),2) == INF){
            $resultado = 0;
        }
        return $resultado;
    }
    
    function Entropia_Categoria($conn){
        $CasosPositivos = mysqli_query($conn, "SELECT * FROM encuesta WHERE Categoria = 'S'");
        $CasosNegativos = mysqli_query($conn, "SELECT * FROM encuesta WHERE Categoria = 'N'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta");
        $CasosPositivos = mysqli_num_rows($CasosPositivos);
        $CasosNegativos = mysqli_num_rows($CasosNegativos);
        $CasosTotales = mysqli_num_rows($CasosTotales);
        $resultado = (- (($CasosPositivos/$CasosTotales) * (Log(($CasosPositivos/$CasosTotales),2)))) 
        - (($CasosNegativos/$CasosTotales) * (Log(($CasosNegativos/$CasosTotales),2)));
        return $resultado;
    }

    function ganancia1($conn, $atributo1_entropiaFeliz, $atributo1_entropiaTiste, $atributo1_entropiaNoMusica){
        $CasosFeliz = mysqli_query($conn, "SELECT * FROM encuesta WHERE Animo = 'Feliz'");
        $CasosTiste = mysqli_query($conn, "SELECT * FROM encuesta WHERE Animo = 'Tiste'");
        $CasosNomus = mysqli_query($conn, "SELECT * FROM encuesta WHERE Animo = 'Nomus'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta");

        $CasosFeliz = mysqli_num_rows($CasosFeliz);
        $CasosTiste = mysqli_num_rows($CasosTiste);
        $CasosNomus = mysqli_num_rows($CasosNomus);
        $CasosTotales = mysqli_num_rows($CasosTotales);

        $resultado = ((($CasosFeliz/$CasosTotales)*($atributo1_entropiaFeliz))+
        (($CasosTiste/$CasosTotales)*($atributo1_entropiaTiste))+
        (($CasosNomus/$CasosTotales)*($atributo1_entropiaNoMusica)));
        return $resultado;
    }
    
    function ganancia2($conn, $atributo2_entropiaRock, $atributo2_entropiaPop, $atributo2_entropiaBanda, $atributo2_entropiaReggaeton, $atributo2_entropiaCumbias, $atributo2_entropiaRap, $atributo2_entropiaElectronica, $atributo2_entropiaNogen){
        $CasosRock = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Rock'");
        $CasosPop = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Pop'");
        $CasosBanda = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Banda'");
        $CasosReggaeton = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Reggaeton'");
        $CasosCumbias = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Cumbias'");
        $CasosRap = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Rap'");
        $CasosElectronica = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Electronica'");
        $CasosNogen = mysqli_query($conn, "SELECT * FROM encuesta WHERE Musica = 'Nogen'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta");

        $CasosRock = mysqli_num_rows($CasosRock);
        $CasosPop = mysqli_num_rows($CasosPop);
        $CasosBanda = mysqli_num_rows($CasosBanda);
        $CasosReggaeton = mysqli_num_rows($CasosReggaeton);
        $CasosCumbias = mysqli_num_rows($CasosCumbias);
        $CasosRap = mysqli_num_rows($CasosRap);
        $CasosElectronica = mysqli_num_rows($CasosElectronica);
        $CasosNogen = mysqli_num_rows($CasosNogen);
        $CasosTotales = mysqli_num_rows($CasosTotales);

        $resultado = ((($CasosRock/$CasosTotales)*($atributo2_entropiaRock))+
        (($CasosPop/$CasosTotales)*($atributo2_entropiaPop))+
        (($CasosBanda/$CasosTotales)*($atributo2_entropiaBanda))+
        (($CasosReggaeton/$CasosTotales)*($atributo2_entropiaReggaeton))+
        (($CasosCumbias/$CasosTotales)*($atributo2_entropiaCumbias))+
        (($CasosRap/$CasosTotales)*($atributo2_entropiaRap))+
        (($CasosElectronica/$CasosTotales)*($atributo2_entropiaElectronica))+
        (($CasosNogen/$CasosTotales)*($atributo2_entropiaNogen)));
        return $resultado;
    }
    
    function ganancia3($conn, $atributo3_entropiaTerroraud, $atributo3_entropiaComedia, 
    $atributo3_entropiaRomantico, $atributo3_entropiaFiccion, $atributo3_entropiaNolib){
        $CasosTerroraud = mysqli_query($conn, "SELECT * FROM encuesta WHERE Audiolib = 'Terroraud'");
        $CasosComedia = mysqli_query($conn, "SELECT * FROM encuesta WHERE Audiolib = 'Comedia'");
        $CasosRomantico = mysqli_query($conn, "SELECT * FROM encuesta WHERE Audiolib = 'Romantico'");
        $CasosFiccion = mysqli_query($conn, "SELECT * FROM encuesta WHERE Audiolib = 'Ficcion'");
        $CasosNolib = mysqli_query($conn, "SELECT * FROM encuesta WHERE Audiolib = 'Nolib'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta");

        $CasosTerroraud = mysqli_num_rows($CasosTerroraud);
        $CasosComedia = mysqli_num_rows($CasosComedia);
        $CasosRomantico = mysqli_num_rows($CasosRomantico);
        $CasosFiccion = mysqli_num_rows($CasosFiccion);
        $CasosNolib = mysqli_num_rows($CasosNolib);
        $CasosTotales = mysqli_num_rows($CasosTotales);

        $resultado = ((($CasosTerroraud/$CasosTotales)*($atributo3_entropiaTerroraud))+
        (($CasosComedia/$CasosTotales)*($atributo3_entropiaComedia))+
        (($CasosRomantico/$CasosTotales)*($atributo3_entropiaRomantico))+ 
        (($CasosFiccion/$CasosTotales)*($atributo3_entropiaFiccion))+ 
        (($CasosNolib/$CasosTotales)*($atributo3_entropiaNolib)));
        return $resultado;
    }

    function ganancia4($conn,$atributo4_entropiaTerrorpod,$atributo4_entropiaPolitica,$atributo4_entropiaVideojuegos, $atributo4_entropiaMusica,$atributo4_entropiaCine,$atributo4_entropiaNopod ){
        $CasosTerr = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Terrorpod'");
        $CasosPoli = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Politica'");
        $CasosVideo = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Videojuegos'");
        $CasosMusica = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Musica'");
        $CasosCine = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Cine'");
        $CasosNopod = mysqli_query($conn, "SELECT * FROM encuesta WHERE Podcast = 'Nopod'");
        $CasosTotales = mysqli_query($conn, "SELECT * FROM encuesta");
        
        $CasosTerr = mysqli_num_rows($CasosTerr);
        $CasosPoli = mysqli_num_rows($CasosPoli);
        $CasosVideo = mysqli_num_rows($CasosVideo);
        $CasosMusica = mysqli_num_rows($CasosMusica);
        $CasosCine = mysqli_num_rows($CasosCine);
        $CasosNopod = mysqli_num_rows($CasosNopod);
        $CasosTotales = mysqli_num_rows($CasosTotales);

        $resultado = ((($CasosTerr/$CasosTotales)*($atributo4_entropiaTerrorpod))+
        (($CasosPoli/$CasosTotales)*($atributo4_entropiaPolitica))+
        (($CasosVideo/$CasosTotales)*($atributo4_entropiaVideojuegos))+
        (($CasosMusica/$CasosTotales)*($atributo4_entropiaMusica))+
        (($CasosCine/$CasosTotales)*($atributo4_entropiaCine))+
        (($CasosNopod/$CasosTotales)*($atributo4_entropiaNopod)));
        return $resultado;
    }
    
    $atributo1_entropiaFeliz = entropia($conn, 'Animo', 'Feliz');
    $atributo1_entropiaTiste = entropia($conn, 'Animo', 'Tiste');
    $atributo1_entropiaNoMusica = entropia($conn, 'Animo', 'Nomus');
    
    $atributo2_entropiaRock = entropia($conn, 'Musica', 'Rock');
    $atributo2_entropiaPop = entropia($conn, 'Musica', 'Pop');
    $atributo2_entropiaBanda = entropia($conn, 'Musica', 'Banda');
    $atributo2_entropiaReggaeton = entropia($conn, 'Musica', 'Reggaeton');
    $atributo2_entropiaCumbias = entropia($conn, 'Musica', 'Cumbias');
    $atributo2_entropiaRap = entropia($conn, 'Musica', 'Rap');
    $atributo2_entropiaElectronica = entropia($conn, 'Musica', 'Electronica');
    $atributo2_entropiaNogen = entropia($conn, 'Musica', 'Nogen');

    //o de miseri, ebribodi guanto to bi mai enemi eoe aisuer ainever bi de seim
    $atributo3_entropiaTerroraud = entropia($conn, 'Audiolib', 'Terroraud'); 
    $atributo3_entropiaComedia = entropia($conn, 'Audiolib', 'Comedia');
    $atributo3_entropiaRomantico = entropia($conn, 'Audiolib', 'Romantico');
    $atributo3_entropiaFiccion = entropia($conn, 'Audiolib', 'Ficcion');
    $atributo3_entropiaNolib = entropia($conn, 'Audiolib', 'Nolib'); 

    $atributo4_entropiaTerrorpod = entropia($conn, 'Podcast', 'Terrorpod');
    $atributo4_entropiaPolitica = entropia($conn, 'Podcast', 'Politica');
    $atributo4_entropiaVideojuegos = entropia($conn, 'Podcast', 'Videojuegos');
    $atributo4_entropiaMusica = entropia($conn, 'Podcast', 'Musica');
    $atributo4_entropiaCine = entropia($conn, 'Podcast', 'Cine');
    $atributo4_entropiaNopod = entropia($conn, 'Podcast', 'Nopod');

    $categoria_entropia = Entropia_Categoria($conn);
    $atributo1_ganancia = ganancia1($conn, $atributo1_entropiaFeliz, $atributo1_entropiaTiste, $atributo1_entropiaNoMusica);
    $atributo2_ganancia = ganancia2($conn, $atributo2_entropiaRock, $atributo2_entropiaPop, $atributo2_entropiaBanda, $atributo2_entropiaReggaeton, $atributo2_entropiaCumbias, $atributo2_entropiaRap, $atributo2_entropiaElectronica, $atributo2_entropiaNogen);
    $atributo3_ganancia = ganancia3($conn, $atributo3_entropiaTerroraud, $atributo3_entropiaComedia, $atributo3_entropiaRomantico, $atributo3_entropiaFiccion, $atributo3_entropiaNolib);
    $atributo4_ganancia = ganancia4($conn, $atributo4_entropiaTerrorpod, $atributo4_entropiaPolitica, $atributo4_entropiaVideojuegos, $atributo4_entropiaMusica, $atributo4_entropiaCine, $atributo4_entropiaNopod);

    $data["atributo1_entropiaFeliz"] = $atributo1_entropiaFeliz;
    $data["atributo1_entropiaTiste"] = $atributo1_entropiaTiste;
    $data["atributo1_entropiaNoMusica"] = $atributo1_entropiaNoMusica;
    
    $data["atributo2_entropiaRock"] = $atributo2_entropiaRock;
    $data["atributo2_entropiaPop"] = $atributo2_entropiaPop;
    $data["atributo2_entropiaBanda"] = $atributo2_entropiaBanda;
    $data["atributo2_entropiaReggaeton"] = $atributo2_entropiaReggaeton;
    $data["atributo2_entropiaCumbias"] = $atributo2_entropiaCumbias;
    $data["atributo2_entropiaRap"] = $atributo2_entropiaRap;
    $data["atributo2_entropiaElectronica"] = $atributo2_entropiaElectronica;
    $data["atributo2_entropiaNogen"] = $atributo2_entropiaNogen;
    
    $data["atributo3_entropiaTerroraud"] = $atributo3_entropiaTerroraud;
    $data["atributo3_entropiaComedia"] = $atributo3_entropiaComedia;
    $data["atributo3_entropiaRomantico"] = $atributo3_entropiaRomantico;
    $data["atributo3_entropiaFiccion"] = $atributo3_entropiaFiccion;
    $data["atributo3_entropiaNolib"] = $atributo3_entropiaNolib;

    $data["atributo4_entropiaTerrorpod"] = $atributo4_entropiaTerrorpod;
    $data["atributo4_entropiaPolitica"] = $atributo4_entropiaPolitica;
    $data["atributo4_entropiaVideojuegos"] = $atributo4_entropiaVideojuegos;
    $data["atributo4_entropiaMusica"] = $atributo4_entropiaMusica;
    $data["atributo4_entropiaCine"] = $atributo4_entropiaCine;
    $data["atributo4_entropiaNopod"] = $atributo4_entropiaNopod;

    $data["atributo1_ganancia"] = $atributo1_ganancia;
    $data["atributo2_ganancia"] = $atributo2_ganancia;
    $data["atributo3_ganancia"] = $atributo3_ganancia;
    $data["atributo4_ganancia"] = $atributo4_ganancia;
    $data["categoria_entropia"] = $categoria_entropia;

    echo json_encode($data);
?>