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

        .highlight {
            background-color: #ef4444;
            color: white;
        }
    </style>
</head>
<body>
    <a href="{{ route('asesiIndex') }}">Back</a>
        <table style="margin: 20px; font-size: 12px" id="data-table">
            <tr>
                <th nowrap>NO</th>
                <th nowrap>Nama Lengkap Asesi</th>
                <th nowrap>Nama Tempat Bekerja</th>
                <th nowrap>Alamat Tempat Bekerja</th>
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

            @foreach ($dataAsesi as $asesi)
                <tr>
                    <td nowrap>{{ $loop->iteration }}</td>
                    <td nowrap>{{ $asesi->nama_lengkap }}</td>
                    <td nowrap>{{ $asesi->nama_tempat_bekerja }}</td>
                    <td nowrap>{{ $asesi->alamat }}</td>
                    <td nowrap>{{ $asesi->nik }}</td>
                    <td nowrap>{{ $asesi->tempat_lahir }}</td>
                    <td nowrap>{{ $asesi->tanggal_lahir }}</td>
                    <td nowrap>{{ $asesi->jenis_kelamin }}</td>
                    <td nowrap>{{ $asesi->alamat_tempat_tinggal }}</td>
                    <td nowrap>{{ $asesi->telp }}</td>
                    <td nowrap>{{ $asesi->email }}</td>
                    <td nowrap>{{ $asesi->pendidikan_terakhir }}</td>
                    <td nowrap>{{ $asesi->jabatan_pekerjaan }}</td>
                    <td nowrap>{{ $asesi->skema_sertifikasi }}</td>
                    <td nowrap>{{ $asesi->rencana_uji_kompetensi }}</td>

                </tr>
            @endforeach
        </table>

    <script>
        // Mendapatkan semua baris dalam tabel kecuali header
        const rows = document.querySelectorAll("#data-table tbody tr");

        rows.forEach(row => {
            row.addEventListener("click", function() {
            // Menghapus kelas highlight dari semua baris
            rows.forEach(r => r.classList.remove("highlight"));
            // Menambahkan kelas highlight pada baris yang diklik
            this.classList.add("highlight");
            });
        });
    </script>
</body>
</html>
