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
    <a href="/surat-tugas-asesor">Back</a>
        <table style="margin: 20px" id="data-table">
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Skema</th>
                <th>Asesor</th>
                <th>No REG</th>
                <th>Tanggal Uji</th>
                <th>Tanggal Surat</th>
                <th>Download</th>
            </tr>

            @foreach ($data_surat as $surat_tugas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat_tugas->nomor_surat }}</td>
                    <td>{{ $surat_tugas->skema }}</td>
                    <td>{{ $surat_tugas->nama_asesor }}</td>
                    <td>{{ $surat_tugas->no_reg }}</td>
                    <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $surat_tugas->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                    <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $surat_tugas->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>

                        <td>
                        <a class="dropdown-item" href="{{ route('surat-tugas-asesor.generatePdf', $surat_tugas->id) }}" target="_blank"><i class="ri-file-pdf-fill"></i> Download PDF</a>
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