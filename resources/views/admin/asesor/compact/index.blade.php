<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px
        }
    </style>
</head>
<body>
    <a href="/asesor">Back</a>
        <table style="margin: 20px">
            <tr>
                <th>No</th>
                <th>Nama Asesor</th>
                <th>No REG</th>
                <th>No Telp</th>
                <th>Alamat</th>
            </tr>

            @foreach ($dataAsesor as $asesor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $asesor->nama_asesor }}</td>
                    <td>{{ $asesor->no_reg }}</td>
                    <td>{{ $asesor->no_telp }}</td>
                    <td>{{ $asesor->alamat }}</td>
                </tr>
            @endforeach
        </table>
</body>
</html>