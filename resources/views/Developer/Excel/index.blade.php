<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
    
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

        /* Badge Styling */
        .badge {
            display: inline-block;
            padding: 0.4em 0.7em;
            font-size: 0.85em;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border-radius: 0.75rem;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning{
            background-color: #F8BE1C;
        }
    </style>
</head>
<body>
    <h1>Import Excel</h1>

    @if(session('success'))
        <p>
            {{ count(session('duplicates')) > 0
                ? 'data asesi berhasil diimpor, namun ada yang duplikat sebanyak : ' . count(session('duplicates')) . 'data' 
                : session('success') 
            }}
        </p>
    @endif

    @if(session('duplicates') && count(session('duplicates')) > 0)
        <h3>Data yang Duplikat:</h3>
        <table border="1" style="margin: 20px; font-size: 12px">
            <thead>
                <tr>
                    <th nowrap>Nama Lengkap</th>
                    <th nowrap>Nama Tempat Bekerja</th>
                    <th nowrap>Alamat Bekerja</th>
                    <th nowrap>NIK</th>
                    <th nowrap>Tempat Lahir</th>
                    <th nowrap>Tanggal Lahir</th>
                    <th nowrap>Jenis Kelamin</th>
                    <th nowrap>Alamat Tempat Tinggal</th>
                    <th nowrap>No Telp</th>
                    <th nowrap>Email</th>
                    <th nowrap>Pendidikan Terakhir</th>
                    <th nowrap>Jabatan Pekerjaan</th>
                    <th nowrap>Skema Sertifikasi</th>
                    <th nowrap>Rencana Uji Kompetensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('duplicates') as $duplicate)
                    <tr>
                        <td nowrap>{{ $duplicate['nama_lengkap'] }}</td>
                        <td nowrap>{{ $duplicate['nama_tempat_bekerja'] }}</td>
                        <td nowrap>{{ $duplicate['alamat'] }}</td>
                        <td nowrap>{{ $duplicate['nik'] }}</td>
                        <td nowrap>{{ $duplicate['tempat_lahir'] }}</td>
                        <td nowrap>{{ $duplicate['tanggal_lahir'] }}</td>
                        <td nowrap>{{ $duplicate['jenis_kelamin'] }}</td>
                        <td nowrap>{{ $duplicate['alamat_tempat_tinggal'] }}</td>
                        <td nowrap>{{ $duplicate['telp'] }}</td>
                        <td nowrap>{{ $duplicate['email'] }}</td>
                        <td nowrap>{{ $duplicate['pendidikan_terakhir'] }}</td>
                        <td nowrap>{{ $duplicate['jabatan_pekerjaan'] }}</td>
                        <td nowrap>{{ $duplicate['skema_sertifikasi'] }}</td>
                        <td nowrap>{{ $duplicate['rencana_uji_kompetensi'] }}</td>
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
