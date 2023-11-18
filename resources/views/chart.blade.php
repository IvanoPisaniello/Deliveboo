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
            gennaio: {ordini: 0, total_amount: 0},
            febbraio: {ordini: 0, total_amount: 0},
            marzo: {ordini: 0, total_amount: 0},
            aprile: {ordini: 0, total_amount: 0},
            maggio: {ordini: 0, total_amount: 0},
            giugno: {ordini: 0, total_amount: 0},
            luglio: {ordini: 0, total_amount: 0},
            agosto: {ordini: 0, total_amount: 0},
            settembre: {ordini: 0, total_amount: 0},
            ottobre: {ordini: 0, total_amount: 0},
            novembre: {ordini: 0, total_amount: 0},
            dicembre: {ordini: 0, total_amount: 0}
        }

        //ricavo il mese dalla data
        for (let i = 0; i < orders.length; i++) {
            const date = new Date(orders[i].updated_at);
            const mese = date.getMonth();
            const amount = parseInt(orders[i].amount);

            switch (mese) {
                case 0:
                    numberOrdersForMonths.gennaio.ordini++;
                    numberOrdersForMonths.gennaio.total_amount += amount;
                    break;
                case 1:
                    numberOrdersForMonths.febbraio.ordini++;
                    numberOrdersForMonths.febbraio.total_amount += amount;
                    break;
                case 2:
                    numberOrdersForMonths.marzo.ordini++;
                    numberOrdersForMonths.marzo.total_amount += amount;
                    break;
                case 3:
                    numberOrdersForMonths.aprile.ordini++;
                    numberOrdersForMonths.aprile.total_amount += amount;
                    break;
                case 4:
                    numberOrdersForMonths.maggio.ordini++;
                    numberOrdersForMonths.maggio.total_amount += amount;
                    break;
                case 5:
                    numberOrdersForMonths.giugno.ordini++;
                    numberOrdersForMonths.giugno.total_amount += amount;
                    break;
                case 6:
                    numberOrdersForMonths.luglio.ordini++;
                    numberOrdersForMonths.luglio.total_amount += amount;
                    break;
                case 7:
                    numberOrdersForMonths.agosto.ordini++;
                    numberOrdersForMonths.agosto.total_amount += amount;
                    break;
                case 8:
                    numberOrdersForMonths.settembre.ordini++;
                    numberOrdersForMonths.settembre.total_amount += amount;
                    break;
                case 9:
                    numberOrdersForMonths.ottobre.ordini++;
                    numberOrdersForMonths.ottobre.total_amount += amount;
                    break;
                case 10:
                    numberOrdersForMonths.novembre.ordini++;
                    numberOrdersForMonths.novembre.total_amount += amount;
                    break;
                case 11:
                    numberOrdersForMonths.dicembre.ordini++;
                    numberOrdersForMonths.dicembre.total_amount += amount;
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
                label: 'Numero ordini',
                data: [
                    numberOrdersForMonths.gennaio.ordini,
                    numberOrdersForMonths.febbraio.ordini,
                    numberOrdersForMonths.marzo.ordini,
                    numberOrdersForMonths.aprile.ordini,
                    numberOrdersForMonths.maggio.ordini,
                    numberOrdersForMonths.giugno.ordini,
                    numberOrdersForMonths.luglio.ordini,
                    numberOrdersForMonths.agosto.ordini,
                    numberOrdersForMonths.settembre.ordini,
                    numberOrdersForMonths.ottobre.ordini,
                    numberOrdersForMonths.novembre.ordini,
                    numberOrdersForMonths.dicembre.ordini
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
            },
            {
                label: 'Guadagni totali',
                data: [
                    numberOrdersForMonths.gennaio.total_amount,
                    numberOrdersForMonths.febbraio.total_amount,
                    numberOrdersForMonths.marzo.total_amount,
                    numberOrdersForMonths.aprile.total_amount,
                    numberOrdersForMonths.maggio.total_amount,
                    numberOrdersForMonths.giugno.total_amount,
                    numberOrdersForMonths.luglio.total_amount,
                    numberOrdersForMonths.agosto.total_amount,
                    numberOrdersForMonths.settembre.total_amount,
                    numberOrdersForMonths.ottobre.total_amount,
                    numberOrdersForMonths.novembre.total_amount,
                    numberOrdersForMonths.dicembre.total_amount
                ],
                backgroundColor: [
                    'rgba(255, 38, 148, 0.2)',
                    'rgba(255, 180, 50, 0.2)',
                    'rgba(150, 100, 86, 0.2)',
                    'rgba(75, 100, 100, 0.2)',
                    'rgba(100, 234, 235, 0.2)',
                    'rgba(90, 120, 250, 0.2)',
                    'rgba(200, 50, 207, 0.2)',
                    'rgba(160, 160, 100, 0.2)',
                    'rgba(215, 200, 89, 0.2)',
                    'rgba(112, 40, 145, 0.2)',
                    'rgba(229, 44, 229, 0.2)',
                    'rgba(71, 100, 45, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 38, 148)',
                    'rgb(255, 180, 50)',
                    'rgb(150, 100, 86)',
                    'rgb(75, 100, 100)',
                    'rgb(100, 234, 235)',
                    'rgb(90, 120, 250)',
                    'rgb(200, 50, 207)',
                    'rgb(160, 160, 100)',
                    'rgb(215, 200, 89)',
                    'rgb(112, 40, 145)',
                    'rgb(229, 44, 229)',
                    'rgb(71, 100, 45)'
                ],
                borderWidth: 1
            }
        ]
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
