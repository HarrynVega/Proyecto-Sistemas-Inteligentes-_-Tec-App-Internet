// 1º Gráfica

const ctx1 = document.getElementById('Estado_Animo').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Feliz', 'Triste', 'No escucha música'],
        datasets: [{
            label: '# de respuestas',
            data: [feliz, tiste, nomus],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});

// 2º Gráfica
const ctx2 = document.getElementById('Genero_Musica').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Rock', 'Pop', 'Banda/Corridos', 'Reggaeton', 'Cumbias', 'Rap', 'Electrónica', 'No escucha música'],
        datasets: [{
            label: '# de respuestas',
            data: [rock, pop, banda, rgt, cumbia, rap, elec, nogen],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(64, 245, 239, 0.2)',
                'rgba(245, 64, 227, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(64, 245, 239, 1)',
                'rgba(245, 64, 227, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 3º Gráfica
const ctx3 = document.getElementById('Genero_Audiolibro').getContext('2d');
const myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['Terror', 'Comedia', 'Romantico', 'Ficción', 'No escucha audiolibros'],
        datasets: [{
            label: '# de respuestas',
            data: [terroraud, comedia, romantico, ficcion, nolib],
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(153, 102, 255, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 4º Gráfica
const ctx4 = document.getElementById('Genero_Podcast').getContext('2d');
const myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ['Terror', 'Política', 'Videojuegos', 'Música', 'Cine', 'No escucha Podcast'],
        datasets: [{
            label: '# de respuestas',
            data: [terrorpod, politica, videojuegos, musica, cine, nopod],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)', // Azul
                'rgba(64, 245, 239, 0.2)', // Cyan
                'rgba(255, 206, 86, 0.2)', // Amarillo
                'rgba(255, 99, 132, 0.2)', // Rojo
                'rgba(245, 64, 227, 0.2)', // Rosa              
                'rgba(153, 102, 255, 0.2)' // Morado
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(64, 245, 239, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(245, 64, 227, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 5º Gráfica
const ctx5 = document.getElementById('Usuarios_Nuevos').getContext('2d');
const myChart5 = new Chart(ctx5, {
    type: 'pie',
    data: {
        labels: ['Resultados positivos', 'Resultados negativos'],
        datasets: [{
            label: '# de respuestas',
            data: [si, no],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});