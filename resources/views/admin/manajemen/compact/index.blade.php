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
    <a href="/asesor">Back</a>
        <table style="margin: 20px" id="data-table">
            <tr>
                <th>No</th>
                <th>Nama Asesor</th>
                <th>No REG</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Foto Asesor</th>
                <th>Tanda Tangan</th>
            </tr>

            @foreach ($dataAsesor as $asesor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $asesor->nama_asesor }}</td>
                    <td>{{ $asesor->no_reg }}</td>
                    <td>{{ $asesor->no_telp }}</td>
                    <td>{{ $asesor->alamat }}</td>
                    
                    <td>
                        @if ($asesor->foto_asesor == null)
                            <span class="text-muted d-block">Tidak Ada Profile</span>
                        @else
                            <a class="d-block" href="{{ asset('img/foto_asesor/' . $asesor->foto_asesor) }}" download="{{ $asesor->foto_asesor }}">Download Profile</a>
                        @endif
                    </td>
                    <td>
                        {{-- Download Foto Profile --}}
                        @if ($asesor->gambar_tanda_tangan == null)
                                <span class="text-muted d-block">Tidak ada ttd</span>
                            @else
                                <a class="d-block" href="{{ asset('img/gambar_tanda_tangan/' . $asesor->gambar_tanda_tangan) }}" download="{{ $asesor->gambar_tanda_tangan }}">Download ttd</a>
                        @endif
                    </td>
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