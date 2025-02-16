<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
        }

        .nav-link {
            color: #fff !important;
        }

        .content {
            padding: 20px;
        }

        canvas{
            width: 500px;
            height: 300px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Панель управления</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Настройки</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active disabled" href="#">
                            <i class="fas fa-chart-line"></i> Отчеты
                        </a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i> Пользователи
                        </a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i> Настройки
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 content">
                <h1>График посещений по часам</h1>
                <canvas id="visitsChart"></canvas>

                <h1>Круговая диаграмма по городам</h1>
                <canvas id="cityChart"></canvas>

            </div>
        </div>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
      const visitsChart = new Chart(document.getElementById('visitsChart'), {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($visitsByHour as $visit)
                        'в {{ $visit->hour }} часов',
                    @endforeach
                ],
                datasets: [{
                    label: 'Количество посещений',
                    data: [
                        @foreach ($visitsByHour as $visit)
                            {{ $visit->count }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: false, 
                maintainAspectRatio: false, 
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const cityChart = new Chart(document.getElementById('cityChart'), {
            type: 'pie',
            options: {
                responsive: false, 
                maintainAspectRatio: false, 
            },
            data: {
                labels: [
                    @foreach ($visitsByCity as $visit)
                        '{{ $visit->city }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach ($visitsByCity as $visit)
                            {{ $visit->count }},
                        @endforeach
                    ],
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
                    borderWidth: 3
                }]
            }
        });
   </script>
</body>

</html>