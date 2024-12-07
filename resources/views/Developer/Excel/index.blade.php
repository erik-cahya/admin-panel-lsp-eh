<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
</head>
<body>
    <h1>Import Excel</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('duplicates') && count(session('duplicates')) > 0)
        <h3>Data yang Duplikat:</h3>
        <table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('duplicates') as $duplicate)
                    <tr>
                        <td>{{ $duplicate['nama_lengkap'] }}</td>
                        <td>{{ $duplicate['nama_tempat_bekerja'] }}</td>
                        <td>{{ $duplicate['alamat'] }}</td>
                        <td>{{ $duplicate['nik'] }}</td>
                        <td>{{ $duplicate['tempat_lahir'] }}</td>
                        <td>{{ $duplicate['tanggal_lahir'] }}</td>
                        <td>{{ $duplicate['jenis_kelamin'] }}</td>
                        <td>{{ $duplicate['alamat_tempat_tinggal'] }}</td>
                        <td>{{ $duplicate['telp'] }}</td>
                        <td>{{ $duplicate['email'] }}</td>
                        <td>{{ $duplicate['pendidikan_terakhir'] }}</td>
                        <td>{{ $duplicate['jabatan_pekerjaan'] }}</td>
                        <td>{{ $duplicate['skema_sertifikasi'] }}</td>
                        <td>{{ $duplicate['rencana_uji_kompetensi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih file Excel:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
