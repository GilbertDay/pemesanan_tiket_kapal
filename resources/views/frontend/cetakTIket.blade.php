<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titleLeft}}</title>
    <style>
        #tabel {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabel td,
        #tabel th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tabel tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tabel tr:hover {
            background-color: #ddd;
        }

        #tabel th {
            padding-top: 8px;
            padding-bottom: 8px;
            text-align: left;
            background-color: #df680c;
            color: white;
        }

    </style>
</head>

<body>
    @inject('carbon', 'Carbon\Carbon')

    <table style="width: 100%; margin-bottom: 40px;">
        <tr style="font-weight: 500;">
            <td style="width: 20%; ">
                <div style="text-align: center;color: #151F57; font-size: large;">E-Tiket</div>
                <div style="font-size: smaller;text-align: center;">Kapal Penyebrangan</div>
            </td>
            <td style="width: 50%; text-align:right; font-size: x-large; color: #151F57;">{{$titleRight}}</td>
        </tr>
    </table>
    <table style="width: 100%; font-weight: 700;">
        <td style="width: 20%;">
            <div style="text-align: center;">
                {{$data->jadwal->speedboat->nama_speedboat}}
            </div>
            <div style="text-align: center;">
                <img src="{{ public_path('/assets/qr-code.png')}}" alt="" width="100px">
            </div>
        </td>
        <td>
            <div style="text-align: center; margin-bottom: 3px;">
                {{$carbon::parse($data->jadwal->tgl_berangkat)->translatedFormat('l, j F, Y')}}
            </div>
            <div style="text-align: center; margin-bottom: 20px;">{{$data->jadwal->jam_brgkt}} -
                {{$data->jadwal->jam_tiba}}</div>
            <table style="width: 100%;">
                <td>{{$data->jadwal->pel_asal}}</td>
                <img src="{{ public_path('/assets/line-2.jpg')}}" style="margin-top: 8px;" alt="" width="40px">
                <td>{{$data->jadwal->pel_tujuan}}</td>

            </table>
        </td>
        <td style="width: 20%; text-align: center; padding-bottom: 50px;">
            Tiket {{$data->jenis_layanan}}
        </td>

    </table>
    <hr style=" border: 2px solid orange;">
    <table>
        <td>
            <table>
                <td>
                    <img src="{{ public_path('/assets/icon-1.png')}}" style="margin-top: 5px;" alt="" width="30px">

                </td>
                <td style="text-align: justify;">Wajib menunjukan E-tiket dan kartu identitas para penumpang saat masuk
                    pelabuhan</td>
            </table>
        </td>
        <!-- Untuk Spasi -->
        <td style="color: white;">
            space
        </td>
        <td>
            <table>
                <img src="{{ public_path('/assets/icon-3.png')}}" style="margin-top: 5px;" alt="" width="30px">
                <td style="text-align: justify;">Tiket akan hangus (expired) apabila anda belum masuk pelabuhan hingga
                    melewati batas
                    waktu jadwal yang anda pilih</td>
            </table>
        </td>
    </table>
    <hr style=" border: 2px solid orange;">
    <div>
        <div style="font-weight: 600; margin-bottom: 10px;">Rincian Data Penumpang</div>
        <table id="tabel">
            <thead>
                <tr>
                    <th style="width: 20px;">No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataPenumpang as $dp)
                <tr>
                    <td scope="row">1</td>
                    <td>{{$dp->nama}}</td>
                    <td>{{$dp->id}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <hr style=" border: 2px solid orange;">
    <div>
        <div style="font-weight: 600; margin-bottom: 10px;">Informasi Pemesanan</div>
        <table id="tabel">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>{{$data->user->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$data->user->email}}</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>{{$data->user->no_telp}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr style=" border: 2px solid orange;">
</body>

</html>
