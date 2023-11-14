@extends('layouts.app')

@section('content')
    <h1 class="text-center my-3">Statistiche ordini</h1>

    <div class="container my-4" style="width: 65%;">
        <canvas id="myChart"></canvas>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const orders = {{ Js::from($orders) }}
        const months = {{ Js::from($labels) }}

        //oggetto che conterrà il numero di ordini per ogni mese
        numberOrdersForMonths = {
            gennaio: 0,
            febbraio: 0,
            marzo: 0,
            aprile: 0,
            maggio: 0,
            giugno: 0,
            luglio: 0,
            agosto: 0,
            settembre: 0,
            ottobre: 0,
            novembre: 0,
            dicembre: 0
        }

        //ricavo il mese dalla data
        for (let i = 0; i < orders.length; i++) {
            const date = new Date(orders[i].updated_at);
            const mese = date.getMonth();

            switch (mese) {
                case 0:
                    numberOrdersForMonths.gennaio++;
                    break;
                case 1:
                    numberOrdersForMonths.febbraio++;
                    break;
                case 2:
                    numberOrdersForMonths.marzo++;
                    break;
                case 3:
                    numberOrdersForMonths.aprile++;
                    break;
                case 4:
                    numberOrdersForMonths.maggio++;
                    break;
                case 5:
                    numberOrdersForMonths.giugno++;
                    break;
                case 6:
                    numberOrdersForMonths.luglio++;
                    break;
                case 7:
                    numberOrdersForMonths.agosto++;
                    break;
                case 8:
                    numberOrdersForMonths.settembre++;
                    break;
                case 9:
                    numberOrdersForMonths.ottobre++;
                    break;
                case 10:
                    numberOrdersForMonths.novembre++;
                    break;
                case 11:
                    numberOrdersForMonths.dicembre++;
                    break;
                default:
                    break;
            }
        }

        //ora numberOrdersForMonths contiene il numero di ordini per mese
        console.log(numberOrdersForMonths)

        console.log(orders, months)

        const data = {
            labels: months,
            datasets: [{
                label: 'Statistiche ordini',
                data: [
                    numberOrdersForMonths.gennaio,
                    numberOrdersForMonths.febbraio,
                    numberOrdersForMonths.marzo,
                    numberOrdersForMonths.aprile,
                    numberOrdersForMonths.maggio,
                    numberOrdersForMonths.giugno,
                    numberOrdersForMonths.luglio,
                    numberOrdersForMonths.agosto,
                    numberOrdersForMonths.settembre,
                    numberOrdersForMonths.ottobre,
                    numberOrdersForMonths.novembre,
                    numberOrdersForMonths.dicembre
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 100, 207, 0.2)',
                    'rgba(160, 200, 207, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(115, 40, 145, 0.2)',
                    'rgba(115, 53, 51, 0.2)',
                    'rgba(71, 255, 255, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',
                    'rgb(160, 200, 207)',
                    'rgb(201, 100, 207)',
                    'rgb(115, 53, 51)',
                    'rgb(71, 255, 255)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );


    </script>
@endsection
