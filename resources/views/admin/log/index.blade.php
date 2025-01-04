<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin LSP LOG</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px
        }

        .highlight {
            background-color: #ef4444;
            color: white;
        }
    </style>
</head>
<body>
    <h1>ini adalah page log</h1>

    <table style="margin: 20px; font-size: 12px" id="data-table">
        <thead>
            <th nowrap>No</th>
            <th nowrap>Ip address</th>
            <th nowrap>Name User</th>
            <th nowrap>Location</th>
            <th nowrap>Internet Services</th>
        </thead>
        <tbody>
            @foreach ($logData as $log)
            <tr>
                <td nowrap>1</td>
                <td nowrap>{{ $log['ip_address'] }}</td>
                <td nowrap>{{ $log['name'] }}</td>
                <td nowrap>{{ $log['city'] .', '. $log['regionName'] .' '. $log['country'] }}</td>
                <td nowrap>{{ $log['isp'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
