<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .container {
            margin: auto;
            width: 500px;
            border: 1px solid #333;
            padding: 10px;
        }

        tr, th, td {
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th, td {
            padding: 0 15px 5px 0;
        }

        hr {
            border-left: 1px solid #333;
        }
    </style>
</head>
<body>

<section class="container">
        <span class="date">{{ $transact->created_at }}</span>
        <h1>{{ $transact->ticket->film->item_name }}</h1>
        <p>Show in the {{ $transact->ticket->cinema->cinema_name }}</p>

        <hr>

        <table>
            <tbody>
                <tr>
                    <th>Customer</th>
                    <td>{{ Session('username') }}</td>
                </tr>
                <tr>
                    <th>Seat</th>
                    <td>{{ $transact->seat->seat_name }}</td>
                </tr>
                <tr>
                    <th>Valid until</th>
                    <td>{{ $transact->valid_until }}</td>
                </tr>
                <tr>
                    <th>Broadcast date</th>
                    <td>{{ $transact->ticket->broadcast_date }}</td>
                </tr>
                <tr>
                    <th>Broadcast time</th>
                    <td>{{ $transact->ticket->broadcast_time }}</td>
                </tr>
            </tbody>
        </table>
</section>

</body>
</html>
