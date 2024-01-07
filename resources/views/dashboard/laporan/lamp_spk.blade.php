@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
					<h2 class="heade" style="color: #4b4f58;">Lampiran SPK</h2>
					<hr style="margin-top: -2px;">
                        <div class="container" id="container">

                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                             <a class="text-white" style="text-decoration: none;"href="/dashboard/laporan/cetak"> <i class="fa-solid fa-print me-2"></i> Cetak Laporan</a>
                        </button>
<br>
                <font size="2">
                <table class="table table-sm table-striped table-bordered">

                    <tr>
                        <th rowspan="2" class="">No</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Uraian Tugas</th>
                        <th rowspan="2">Jangka Waktu</th>
                        <th colspan="2">Target Pekerjaan</th>
                        <th rowspan="2">Harga Satuan</th>
                        <th rowspan="2">Nilai Perjanjian</th>
                        <th rowspan="2">Beban Anggaran</th>
                    </tr>
                    @php
                        $totalvolume = 0;
                        $totalHS = 0;
                        $totalNP = 0;
                    @endphp
                    <tr>
                        <th style="color:black">Volume</th>
                        <th style="color:black">Satuan</th>
                    </tr>

                    @foreach ($master_kegiatans as $key => $master_kegiatan)
                        <tr>
                            <td style="text-align: center;">{{ $master_kegiatans->firstItem() + $key }}</td>
                            <td>{{ $master_kegiatan->mitra->name }}</td>
                            <td>{{ $master_kegiatan->kegiatan->name }}</td>
                            <td style="text-align: center;">
                                {{ date('d ', strtotime($master_kegiatan->mulai)) . ' - ' . date('d F Y', strtotime($master_kegiatan->selesai)) }}
                            </td>
                            <td><center>{{ $master_kegiatan->volume }}</center></td>
                            <td>{{ $master_kegiatan->kegiatan->satuan->name }}</td>
                            <td style="text-align: center;" width="100">@currency($master_kegiatan->kegiatan->harga)</td>
                            <td style="text-align: center;" width="100">@currency($master_kegiatan->volume * $master_kegiatan->kegiatan->harga)</td>
                            <td>{{ $master_kegiatan->kegiatan->ba }}</td>
                        </tr>

                    {{-- PERHITUNGAN --}}
                    @php
                        $totalvolume += ( $master_kegiatan->volume );
                        $totalHS += ( $master_kegiatan->kegiatan->harga );
                        $totalNP += ( $master_kegiatan->volume * $master_kegiatan->kegiatan->harga );
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
                        <td colspan="4"><center><b>Total Terbilang</b></center></td>
                        <td><center><b>{{ $totalvolume }}</b></center></td>
                        <td></td>
                        <td><center><b>@currency($totalHS)</b></center></td>
                        <td><center><b>@currency($totalNP)</b></center></td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="10"> <center> <b>
                            <div id="hasilTerbilang"></div>
                            <script>
                                var angka = {{ $totalNP }};
                                var hasilTerbilang = terbilang(angka);
                                document.getElementById('hasilTerbilang').innerHTML = hasilTerbilang + "Rupiah";
                            </script></b></center>
                        </td>
                    </tr>
                </table>
                </font>
            </div>
        </div>
    </div>
</div>
            <!-- bagian isi tabel -->
</div>
</div>
    <div class="page-nav d-flex justify-content-center">
        {{ $master_kegiatans->links() }}
    </div>
</div>
</div>
@endsection