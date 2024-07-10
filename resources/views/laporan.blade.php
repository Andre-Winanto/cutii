<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 0px solid rgb(31, 73, 125);
            padding-bottom: 0px;
            text-align: center;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .content {
            text-align: center;
            margin-top: 20px;
        }

        .content h3,
        .content h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .main {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .main th,
        .main td {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
        }

        .main th {
            background-color: #f0f0f0;
            font-size: 14px;
        }

        .main td {
            text-align: left;
            font-size: 12px;
        }

        .signature {
            font-size: 14px;
            text-align: right;
            margin-top: 50px;
        }
        .signature .tgl {
            
            margin-right: 30px
        }
        .signature .jbt {
            
            margin-right: 53px
        }
        .signature .name {
            margin-top: 60px;
            margin-right: 10px; /* Mengubah dari 40px menjadi 50px untuk menggeser sedikit ke kanan */
            font-weight: bold;
            font-size: 14px;
}
        


        @media print {
            .line1,
            .line2 {
                background-color: transparent !important;
                color: #000 !important;
                border-bottom: 1px solid #1065c0 !important;
                margin-top: 4px !important;
                height: 4px !important;
            }

            .line2 {
                height: 2px !important;
            }

            .no-print {
                display: none !important;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('assets/images/KOP.png') }}" alt="Logo Perusahaan">
            </div>
        </div>

        <div class="content">
            <h3>Laporan Pengajuan Cuti</h3>
            <h4>Periode {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h4>
        </div>

        <table class="main">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Cuti</th>
                <th>Alasan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Alamat Cuti</th>
                <th>Status</th>
            </tr>
            @foreach ($dataPengajuanCuti as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->NIP }}</td>
                    <td>{{ $data->pegawai->nama }}</td>
                    <td>{{ $data->jenis_cuti }}</td>
                    <td>{{ $data->alasan }}</td>
                    <td>{{ $data->tanggal_mulai_cuti }}</td>
                    <td>{{ $data->tanggal_akhir_cuti }}</td>
                    <td>{{ $data->alamat_cuti }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
            @endforeach
        </table>

        <div class="signature">
            <p class="tgl"> Jambi, <span>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span></p>
            <p class="jbt" > Kepala Balai </P>
            <p class="name">Dr. Salwati, SP., M.Si </p>
            <p class="nip" >NIP.197303071998032001 </p>
        </div>
    </div>
    
</body>

</html>