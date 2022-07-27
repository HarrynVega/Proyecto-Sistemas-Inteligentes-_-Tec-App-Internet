function repro(){
    var numero = Math.floor(Math.random()*6)+1;
    if (numero == 1){
        reiniciar();
        document.getElementById('player1').play();
        document.getElementById('player1').volume = 0.9;
    }
    if (numero == 2){
        reiniciar();
        document.getElementById('player2').play();
        document.getElementById('player2').volume = 0.8;
    }
    if (numero == 3){
        reiniciar();
        document.getElementById('player3').play();
        document.getElementById('player3').volume = 0.5;
    }
    if (numero == 4){
        reiniciar();
        document.getElementById('player4').play();
        document.getElementById('player4').volume = 0.4;
    }
    if (numero == 5){
        reiniciar();
        document.getElementById('player5').play();
        document.getElementById('player5').volume = 0.4;
    }
    if (numero == 6){
        reiniciar();
        document.getElementById('player6').play();
        document.getElementById('player6').volume = 0.6;
    }
}
function reiniciar(){
    document.getElementById('player1').pause()
    document.getElementById('player1').currentTime = 0;
    document.getElementById('player2').pause()
    document.getElementById('player2').currentTime = 0;
    document.getElementById('player3').pause()
    document.getElementById('player3').currentTime = 0;
    document.getElementById('player4').pause()
    document.getElementById('player4').currentTime = 0;
    document.getElementById('player5').pause()
    document.getElementById('player5').currentTime = 0;
    document.getElementById('player6').pause()
    document.getElementById('player6').currentTime = 0;
}