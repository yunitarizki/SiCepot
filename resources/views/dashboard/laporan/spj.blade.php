@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
					<h2 class="heade" style="color: #4b4f58;">Laporan SPJ</h2>
					<hr style="margin-top: -2px;">					
                        <div class="container" id="container">
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                            <a class="text-white" style="text-decoration: none;"href="/dashboard/laporan/cetakspj"> <i class="fa-solid fa-print me-2"></i> Cetak Laporan</a>
                        </button>
                        <style>
                            /* Menyesuaikan lebar dropdown */
                            .select2-container--default .select2-results__option {
                                margin-bottom: 20px; /* Sesuaikan sesuai kebutuhan Anda */
                            }
                    
                            /* Atau, menyesuaikan lebar maksimal dropdown */
                            .select2-container--default .select2-results__options {
                                max-height: 50px; /* Sesuaikan sesuai kebutuhan Anda */
                                overflow-y: auto;
                            }
                        </style>                      
<br>
<font size="2">
    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            {{-- <th>Bulan</th> --}}
                            <th>Nama</th>
                            <th>Gol</th>
                            <th>Honor Per Dok</th>
                            <th>Banyak Dok</th>
                            <th>Jumlah Bruto</th>
                            <th>Potongan <br>PPh psl 21</th>
                            <th>Jumlah Diterima</th>
                            <th colspan="2">Nama dan Nomor Rekening</th>
                        </tr>
    
                        @php
                            $totalvolume = 0;
                            $totalJB = 0;
                            $totalJD = 0;
                        @endphp
    
                        @foreach ($master_kegiatans as $key => $master_kegiatan)
                        <tr>
                        <td style="text-align: center;">{{ $master_kegiatans->firstItem() + $key }}</td>
                            {{-- <td>{{$master_kegiatan->bulan}}</td> --}}
                            <td>{{ $master_kegiatan->mitra->name}}</td>
                            <td style="text-align: center;">{{ $master_kegiatan->mitra->golongan}}</td>
                            <td style="text-align: center;">@currency ($master_kegiatan->kegiatan->harga )</td>
                            <td style="text-align: center;"><center>{{ $master_kegiatan->volume }}</center></td>
                            <td style="text-align: center;">@currency($master_kegiatan->kegiatan->harga * $master_kegiatan->volume)</td>
                            <td style="text-align: center;">
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
                            </td>
                            <td style="text-align: center;">
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
                            </td>
                            <td>{{ $master_kegiatan->mitra->nama_rek }}</td>
                            <td>{{ $master_kegiatan->mitra->nomor_rek }}</td>
                        </tr>
                        @php
                            $totalvolume += ( $master_kegiatan->volume );
                            $totalJB += ( $master_kegiatan->kegiatan->harga * $master_kegiatan->volume );
                            switch ($master_kegiatan->mitra->golongan){
                            case '3':
                                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) - ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume * 5/100));
                                    break;
                                case '4':
                                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) - ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume * 15/100));
                                    break;
                                case '-':
                                $result = (($master_kegiatan->kegiatan->harga * $master_kegiatan->volume) - ($master_kegiatan->kegiatan->harga * $master_kegiatan->volume * 0));
                                    break;
                                default:
                                $result = 'Tidak Ditemukan';
                                    break;
                            }
                            $totalJD += ($result);
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
                        <td><center><b>@currency($totalJB)</b></center></td>
                        <td></td>
                        <td colspan="3"><b>@currency($totalJD)</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="7"> <center> <b>
                            <div id="hasilTerbilang"></div>
                            <script>
                                var angka = {{ $totalJD }};
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#kegiatan_id").select2({
                    placeholder: 'Pilih Kegiatan',
                    ajax: {
                        url: "{{ route('kegiatan.index') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    }
                                })
                            }
                        }
                    }
                });
            })
        </script>
@endsection
