<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styler.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <!-- <link rel="stylesheet" href="/css/table.css"> -->
    <link rel="stylesheet" href="/css/form.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://kit.fontawesome.com/59795479c6.js" crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
 
</head>

<body>
    <div style="max-width: 1000px; margin: 0 auto; padding: 10px;">
        <p style="max-width: 100%; margin-left: 50%;">
    </div>
        <?php
        $printedNames = []; // Array untuk melacak nama-nama yang sudah ditampilkan

        foreach ($cetakpertanggal as $key => $master_kegiatan) {
            // Cek apakah nama mitra sudah ditampilkan sebelumnya
            if (!in_array($master_kegiatan->mitra->name, $printedNames)) {
                echo '<div style="text-align: left; margin-left: 350px;">'; // Sesuaikan nilai margin-right sesuai kebutuhan
                echo '<p> Lampiran SPK </p>';
                echo (isset($master_kegiatan->perihal_spk) ? $master_kegiatan->perihal_spk : 'Nama Lampiran Tidak Tersedia');
                echo '<p>Nomor : ' . (isset($master_kegiatan->nospk) ? $master_kegiatan->nospk : 'Nomor Lampiran Tidak Tersedia') . '</p>';
                echo '</div>';
                echo '<p> NAMA MITRA : ' . $master_kegiatan->mitra->name . '</p>';

            // Tambahkan nama ke dalam array
            $printedNames[] = $master_kegiatan->mitra->name;
            }
        }
        ?>
<font size="2"> 
                <table class="table table-sm table-striped table-bordered">
                
                    <tr>
                        {{-- <th rowspan="2" class="">No</th> --}}
                        <th rowspan="2">Uraian Tugas</th>
                        <th rowspan="2">Jangka Waktu</th>
                        <th colspan="2">Target Pekerjaan</th>
                        <th rowspan="2">Harga Satuan</th>
                        <th rowspan="2">Nilai Perjanjian</th>
                        <th rowspan="2">Beban Anggaran</th>
                    </tr>
                    @php
                        $totalvolume = 0;
                        $nilaiperjanjian = 0;
                    @endphp
                    <tr>
                        <th style="color:black">Volume</th>
                        <th style="color:black">Satuan</th>
                    </tr>
                    
                @foreach ($cetakpertanggal as $key => $master_kegiatan)
                        <tr>
                            {{-- <td style="text-align: center;">{{ $master_kegiatans->firstItem() + $key }}</td> --}}
                            <td>{{ $master_kegiatan->kegiatan->name }}</td>
                            <td style="text-align: center;">
                                {{ date('d ', strtotime($master_kegiatan->mulai)) . ' - ' . date('d F Y', strtotime($master_kegiatan->selesai)) }}
                            </td>
                            <td style="text-align: center">{{ $master_kegiatan->volume }}</td>
                            <td style="text-align: center">{{ $master_kegiatan->kegiatan->satuan->name }}</td>
                            <td style="text-align: center">@currency($master_kegiatan->kegiatan->harga)</td>
                            <td style="text-align: center">@currency($master_kegiatan->volume * $master_kegiatan->kegiatan->harga)</td>
                            <td style="text-align: center">{{ $master_kegiatan->kegiatan->ba }}</td>
                        </tr>

                        @php
                            $totalvolume += ( $master_kegiatan->volume );
                            $nilaiperjanjian += ( $master_kegiatan->kegiatan->harga * $master_kegiatan->volume );
                        @endphp
                        
                        @endforeach
                        <script>
                            function terbilang(angka) {
                                var bilne = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan",
                                             "Sembilan", "Sepuluh", "Sebelas"];
                                if (angka < 12) {
                                    return bilne[angka];
                                } else if (angka < 20) {
                                    return terbilang(angka - 10) + " Belas";
                                } else if (angka < 100) {
                                    return terbilang(Math.floor(angka / 10)) + " Puluh " + terbilang(angka % 10);
                                } else if (angka < 200) {
                                    return "seratus " + terbilang(angka - 100);
                                } else if (angka < 1000) {
                                    return terbilang(Math.floor(angka / 100)) + " Ratus " + terbilang(angka % 100);
                                } else if (angka < 2000) {
                                    return "seribu " + terbilang(angka - 1000);
                                } else if (angka < 1000000) {
                                    return terbilang(Math.floor(angka / 1000)) + " Ribu " + terbilang(angka % 1000);
                                } else if (angka < 1000000000) {
                                    return terbilang(Math.floor(angka / 1000000)) + " Juta " + terbilang(angka % 1000000);
                                } else if (angka < 1000000000000) {
                                    return terbilang(Math.floor(angka / 1000000000)) + " Milyar " + terbilang(angka % 1000000000);
                                }
                            }
                        </script>

                        <tr>
                            <td colspan="3"><center><b>Total Terbilang</b></center></td>
                            <td colspan="2"><center><b>
                                <div id="hasilTerbilang"></div>
                                <script>
                                    var angka = {{ $nilaiperjanjian }};
                                    var hasilTerbilang = terbilang(angka);
                                    document.getElementById('hasilTerbilang').innerHTML = hasilTerbilang + "Rupiah";
                                </script></b></center>
                            </td>
                            <td><center><b>@currency($nilaiperjanjian)</b></center></td>
                            <td colspan="2"></td>
                        </tr>
                </table>
                </font>

    <script>window.print()</script>

</body>

</html>