<!DOCTYPE html>
<html>

<head>
    <title>User PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            font-size: 8pt;
        }
    </style>
    <main role="main"><br><br>

        <?php $total; ?>
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="7" class="text-center" scope="col">Customer Report</th>
                </tr>
                <tr>
                    <td colspan="5" scope="col">Printed at : <?php echo date("l, d F Y h:i:s A"); ?></td>
                    <td align="left" scope="col">Print by :</td>
                    <td align="center" scope="col"><strong>{{ Session('username') }}</strong></td>
                </tr>
                <tr>
                    <th colspan="7" class="table-dark text-center">Customers</th>
                </tr>
            </thead>
            <tbody>
                @if($member->isEmpty())
                    <tr>
                        <td colspan="7" align="center">Tidak ada data yang ditampilkan</td>
                    </tr>
                @else
                <?php $count = 0; ?>
                @foreach($member AS $u)
                    <tr>
                        <td rowspan="5" class="text-center">{{ $loop->iteration }}</td>
                    </tr>
                    <tr>
                        <td>Username</td><td>{{ $u->username }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $u->email }}</td>
                    </tr>
                    <tr>
                        <td>join on</td>
                        <td>{{ $u->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><strong>{{ $u->label }}</strong></td>
                    </tr>
                <?php $count++; ?>
                @endforeach
                    <tr>
                        <td colspan="6" class="text-center">Total Customers</td>
                        <td class="text-center">{{ $count }}</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="table-dark text-center">Copyright 2020 - Azure Cinema</td>
                    </tr>
                @endif
        </table>

    </main>
</body>

</html>
