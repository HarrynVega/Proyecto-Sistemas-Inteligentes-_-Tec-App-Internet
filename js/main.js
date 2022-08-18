$(document).ready(function(){
    $.ajax({
        url:"php/calculos.php",
        method:"POST",
        data:{},
        dataType:"JSON",
        success:function(data){
            const ctx = document.getElementById('Grafica').getContext('2d');
            const myChart5 = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Ganancia 1º atributo', 'Ganancia 2º atributo', 'Ganancia 3º atributo', 'Ganancia 4º atributo', 'Ganancia Categoría'],
                    datasets: [{
                        label: 'Comparación de Ganancias',
                        data: [data.atributo1_ganancia, data.atributo2_ganancia, data.atributo3_ganancia, data.atributo4_ganancia, data.categoria_entropia],
                        backgroundColor: [
                            'rgba(64, 245, 239, 0.2)', 
                            'rgba(255, 206, 86, 0.2)', 
                            'rgba(255, 99, 132, 0.2)', 
                            'rgba(245, 64, 227, 0.2)',             
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(64, 245, 239, 0.2)', 
                            'rgba(255, 206, 86, 0.2)', 
                            'rgba(255, 99, 132, 0.2)', 
                            'rgba(245, 64, 227, 0.2)',             
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            $("#atributo1_ganancia").text("La ganancia del primer atributo es de : "+data.atributo1_ganancia);
            $("#atributo2_ganancia").text("La ganancia del segundo atributo es de : "+data.atributo1_ganancia);
            $("#atributo3_ganancia").text("La ganancia del tercer atributo es de : "+data.atributo1_ganancia);
            $("#atributo4_ganancia").text("La ganancia del cuarto atributo es de : "+data.atributo1_ganancia);
            $("#categoria_entropia").text("La ganancia de la prgunta de categoría es de : "+data.categoria_entropia);

        }
    })
});