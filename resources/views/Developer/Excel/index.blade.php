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
                        <td>{{ $duplicate['nama_asesi'] }}</td>
                        <td>{{ $duplicate['nik'] }}</td>
                        <td>{{ $duplicate['tempat_lahir'] }}</td>
                        <td>{{ $duplicate['tanggal_lahir'] }}</td>
                        <td>{{ $duplicate['jenis_kelamin'] }}</td>
                        <td>{{ $duplicate['tempat_tinggal'] }}</td>
                        <td>{{ $duplicate['kode_kabupaten'] }}</td>
                        <td>{{ $duplicate['kode_provinsi'] }}</td>
                        <td>{{ $duplicate['telp'] }}</td>
                        <td>{{ $duplicate['email'] }}</td>
                        <td>{{ $duplicate['kode_pendidikan'] }}</td>
                        <td>{{ $duplicate['kode_pekerjaan'] }}</td>
                        <td>{{ $duplicate['kode_jadwal'] }}</td>
                        <td>{{ $duplicate['tanggal_uji'] }}</td>
                        <td>{{ $duplicate['nomor_registrasi_asesor'] }}</td>
                        <td>{{ $duplicate['kode_sumber_anggaran'] }}</td>
                        <td>{{ $duplicate['kode_kementrian'] }}</td>
                        <td>{{ $duplicate['status_kompeten'] }}</td>
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
