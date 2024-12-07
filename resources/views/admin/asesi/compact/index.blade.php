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
                <th nowrap>Nama Asesi</th>
                <th nowrap>NIK</th>
                <th nowrap>Tempat Lahir</th>
                <th nowrap>Tanggal Lahir</th>
                <th nowrap>Jenis Kelamin</th>
                <th nowrap>Kode Kabupaten</th>
                <th nowrap>Kode Provinsi</th>
                <th nowrap>Telp</th>
                <th nowrap>Email</th>
                <th nowrap>Kode Pendidikan</th>
                <th nowrap>Kode Pekerjaan</th>
                <th nowrap>Kode Jadwal</th>
                <th nowrap>Tanggal Uji</th>
                <th nowrap>Nomor Registrasi Asesor</th>
                <th nowrap>Kode Sumber Anggaran</th>
                <th nowrap>Kode Kementrian</th>
                <th nowrap>Kode Sumber Anggaran</th>
                <th nowrap>Status Kompeten</th>
            </tr>

            @foreach ($dataAsesi as $asesi)
                <tr>
                    <td nowrap>{{ $loop->iteration }}</td>
                    <td nowrap>
                        {{ $asesi->nama_asesi }}
                    </td>
                    <td nowrap>{{ $asesi->nik }}</td>
                    <td nowrap>{{ $asesi->tempat_lahir }}</td>
                    <td nowrap>{{ $asesi->tanggal_lahir }}</td>
                    <td nowrap>{{ $asesi->jenis_kelamin }}</td>
                    <td nowrap>{{ $asesi->tempat_tinggal }}</td>
                    <td nowrap>{{ $asesi->kode_kabupaten }}</td>
                    <td nowrap>{{ $asesi->kode_provinsi }}</td>
                    <td nowrap>{{ $asesi->telp }}</td>
                    <td nowrap>{{ $asesi->email }}</td>
                    <td nowrap>{{ $asesi->kode_pendidikan }}</td>
                    <td nowrap>{{ $asesi->kode_pekerjaan }}</td>
                    <td nowrap>{{ $asesi->kode_jadwal }}</td>
                    <td nowrap>{{ $asesi->tanggal_uji }}</td>
                    <td nowrap>{{ $asesi->nomor_registrasi_asesor }}</td>
                    <td nowrap>{{ $asesi->kode_sumber_anggaran }}</td>
                    <td nowrap>{{ $asesi->kode_kementrian }}</td>
                    <td nowrap>{{ $asesi->status_kompeten }}</td>
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