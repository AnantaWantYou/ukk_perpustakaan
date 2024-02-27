<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($tanggal_pengembalian as $item)
                        {{ $item }}
                    @endforeach
                ],
                datasets: [{
                    label: 'Selesai Dipinjam',
                    data: [
                        @foreach ($count as $item)
                            {{ $item }}
                        @endforeach
                    ],
                    backgroundColor: '#39cccc',

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

</body>
</html>
