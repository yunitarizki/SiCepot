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
    <H4 style="text-align: center;">BUKTI PENERIMAAN UANG</H4>
<tr>
@php
    $seenData = []; // Array untuk melacak data yang sudah ditampilkan
@endphp
<table width="1500">
    <tr>
        <td>TELAH TERIMA DARI</td>
        <td> : </td>
        <td>
            PEJABAT PEMBUAT KOMITMEN BPS KAB. CILACAP
        </td>
</tr>
    <tr>
        <td width="220">UNTUK MEMBAYAR</td>
        <td width="10"> : </td>
        <td>
            @foreach ($cetakspj as $key => $master_kegiatan)
    @if (!in_array($master_kegiatan->kegiatan->name, $seenData))
            {{ $master_kegiatan->kegiatan->name }}
        @php
            $seenData[] = $master_kegiatan->kegiatan->name; // Tambahkan data ke array
        @endphp
    @endif
@endforeach
        </td>
    </tr>
    <tr>
        <td>PROGRAM</td>
        <td> : </td>
        <td>
       <div id="selectedValue"></div>
  <script>
    // Mendapatkan nilai dari localStorage
    var selectedValue = localStorage.getItem("selectedProgram");

    // Menampilkan nilai terpilih
    document.getElementById("selectedValue").innerText = selectedValue;
  </script>
        </td>
</tr>
<tr>
    <td>KEGIATAN</td>
    <td> : </td>
    <td>
        <div id="selectedValue2"></div>

        <script>
          // Mendapatkan nilai dari localStorage
          var selectedValue2 = localStorage.getItem("selectedKegiatanlain");
      
          // Menampilkan nilai terpilih
          document.getElementById("selectedValue2").innerText = selectedValue2;
        </script>
    </td>
 </tr>
 
<tr>
    <td>KLASIFIKASI RINCIAN OUTPUT</td>
    <td> : </td>
    <td>
        <div id="selectedValue3"></div>
  <script>
    // Mendapatkan nilai dari localStorage
    var selectedValue3 = localStorage.getItem("selectedOutput");

    // Menampilkan nilai terpilih
    document.getElementById("selectedValue3").innerText = selectedValue3;
  </script>
    </td>
</tr>
<tr>
    <td>RINCIAN OUTPUT</td>
    <td> : </td>
    <td>
        <div id="selectedValue4"></div>

        <script>
          // Mendapatkan nilai dari localStorage
          var selectedValue4 = localStorage.getItem("selectedRincianOutput");
      
          // Menampilkan nilai terpilih
          document.getElementById("selectedValue4").innerText = selectedValue4;
        </script>
    </td>
</tr>
<tr>
    <td>KOMPONEN</td>
    <td> : </td>
    <td>
        <div id="selectedValue5"></div>

        <script>
          // Mendapatkan nilai dari localStorage
          var selectedValue5 = localStorage.getItem("selectedKomponen");
      
          // Menampilkan nilai terpilih
          document.getElementById("selectedValue5").innerText = selectedValue5;
        </script>
    </td>
</tr>
<tr>
    <td>AKUN</td>
    <td> : </td>
    <td>
        <div id="selectedValue6"></div>

        <script>
          // Mendapatkan nilai dari localStorage
          var selectedValue6 = localStorage.getItem("selectedAkun");
      
          // Menampilkan nilai terpilih
          document.getElementById("selectedValue6").innerText = selectedValue6;
        </script>
    </td>
</tr>

</table>
</tr>
<br>

<font size="2">
    <table class="table table-sm table-striped table-bordered">
        <tr>
            {{-- <th>No</th> --}}
            <th>Nama</th>
            <th>Gol</th>
            <th>Honor Per Dok</th>
            <th>Banyak Dokumen</th>
            <th>Jumlah Bruto</th>
            <th>Potongan <br>PPh Pasal 21</th>
            <th>Jumlah Diterima</th>
            <th colspan="2">Nama dan Nomor Rekening</th>
        </tr>

        @php
            $totalvolume = 0;
            $totalbruto = 0;
            $totalPPH = 0;
            $totalDiterima = 0;
        @endphp

        @foreach ($cetakspj as $key => $master_kegiatan)
        <tr>
        {{-- <td style="text-align: center;">{{ $master_kegiatans->firstItem() + $key }}</td> --}}
            <td>{{ $master_kegiatan->mitra->name}}</td>
            <td><center>{{ $master_kegiatan->mitra->golongan}}</center></td>
            <td><center>@currency ($master_kegiatan->kegiatan->harga )</center></td>
            <td><center>{{ $master_kegiatan->volume }}</center></td>
            {{-- Jumlah Bruto --}}
            <td><center>@currency($master_kegiatan->kegiatan->harga * $master_kegiatan->volume)</center></td>
            {{-- Potongan PPH Pasal 21 --}}
            <td><center>
                @switch ($master_kegiatan->mitra->golongan)
                    @case ('3')
                    @currency (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) * 5/100)
                        @break
                    @case ('4')
                    @currency (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) * 15/100)
                        @break
                    @case ('-')
                   -
                        @break
                    @default
                        Tidak Ditemukan
                        @break
                @endswitch
            </center></td>
            {{-- Jumlah DIterima --}}
            <td> <center>
                @switch ($master_kegiatan->mitra->golongan)
                @case ('3')
                @currency ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume - ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume * 5/100))
                    @break
                @case ('4')
                @currency ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume - ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume * 15/100))
                     @break
                @case ('-')
                @currency ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume)
                    @break
                @default
                    Tidak Ditemukan
                    @break
                @endswitch
            </center></td>
            {{-- <td>{{ $master_kegiatan->mitra->nama_rek . ' ' . $master_kegiatan->mitra->nomor_rek }}</td> --}}
            <td>{{ $master_kegiatan->mitra->nama_rek }}</td>
            <td>{{ $master_kegiatan->mitra->nomor_rek }}</td>
        </tr>

        @php
            $totalvolume += ( $master_kegiatan->volume );
            $totalbruto += ( $master_kegiatan->kegiatan->harga * $master_kegiatan->volume );

            switch ($master_kegiatan->mitra->golongan){
                case '3':
                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) * 5/100);
                    break;
                case '4':
                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) * 15/100);
                    break;
                case '-':
                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) * 0);
                    break;
                default:
                $result = 'Tidak Ditemukan';
                    break;
            }
            $totalPPH += ($result);
        @endphp

    @endforeach
        <tr>
            <td colspan="3"><center>Jumlah Total Rupiah</center></td>
            <td><center>{{ $totalvolume }}</center></td>
            <td><center>@currency($totalbruto)</center></td>
            <td><center>@currency($totalPPH)</center></td>
            <td><center>@currency($totalbruto - $totalPPH)</center></td>
        </tr>
    </table>

    <table border="0" width="1300" style="margin: 0 auto; margin-left: 0 auto">
        <tr>
            <td width="30"></td>
            <td  width="80"></td>
            <td  width="500"></td>
            <td  width="300">
                Cilacap,...................
            </td>
        </tr>
        <tr>
            <td></td>
            <td >LUNAS PADA TGL.....................</td>         
            <td><center>SETUJU DIBAYAR;</center></td>
        </tr>
        <tr>
            <td></td>
            <td>
                Bendaharawan Pengeluaran,                
            </td>
            <td><center>
                Pejabat Pembuatan Komitmen,
            </center></td>
            <td>
                Pembuat Daftar,
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><center>BPS Kabupaten Cilacap</center></td>
            <td></td>
        </tr>
        <tr> <td></td><td></td> <td height="75"></td> <td></td></tr>
        <tr>
            <td></td>
            <td>Indah Setyastuti, A.Md</td>
            <td><center>Romdlon Abdulah Tsani, SE</center></td>
            <td>Romdlon Abdulah Tsani, SE</td>
        </tr>
        <tr>
            <td></td>
            <td>NIP. 198603152009022009</td>
            <td><center>NIP. 198505272009021003</center></td>
            <td>NIP. 198505272009021003</td>
        </tr>
    </table>
</font>

    <script>window.print()</script>

</body>

</html>