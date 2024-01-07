@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
					<h2 class="heade" style="color: #4b4f58;">CETAK LAPORAN</h2>
					<hr style="margin-top: -2px;">
					

                        <div class="container" id="container">
                            <font size="2">
                                <table>
                                    <tr>
                                        <div class="row mb-2">
                                            <div class="col-25">
                                                <label for="">TELAH TERIMA DARI</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" id="telahterima" name="telahterima" required value="PEJABAT PEMBUAT KOMITMEN BPS KAB. CILACAP">
                                            </div>
                                        </div>
                                    </tr>
                                
                                    <tr>
                                        <div class='row'>
                                            <div class="col-25">
                                                <label for="">UNTUK MEMBAYAR</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="kegiatan_id" name="kegiatan_id" class="form-select"
                                                aria-label="Default select example" required>
                                            </select>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="row mb-2">
                                            <div class="col-25">
                                                <label for="">PROGRAM</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="program" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Program</option>
                                                    @foreach ($master_lains->unique('program') as $masterlain)
                                                    <option value="{{$masterlain->program}}">{{$masterlain->program}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr> 
                                    <tr>
                                        <div class='row'>
                                            <div class="col-25">
                                                <label for="">KEGIATAN</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="kegiatanlain" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Kegiatan</option>
                                                    @foreach ($master_lains as $masterlain)
                                                    <option value="{{$masterlain->kegiatanlain}}">{{$masterlain->kegiatanlain}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="row mb-2">
                                            <div class="col-25">
                                                <label for="">KLASIFIKASI RINCIAN OUTPUT</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="output" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Klasifikasi Rincian Output</option>
                                                    @foreach ($master_lains->unique('output') as $masterlain)
                                                    <option value="{{$masterlain->output}}">{{$masterlain->output}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                    </tr> 
                                    <tr>
                                        <div class='row'>
                                            <div class="col-25">
                                                <label for="">RINCIAN OUTPUT</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="rincian_output" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Rincian Output</option>
                                                    @foreach ($master_lains->unique('rincian_output') as $masterlain)
                                                    <option value="{{$masterlain->rincian_output}}">{{$masterlain->rincian_output}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class='row'>
                                            <div class="col-25">
                                                <label for="">KOMPONEN</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="komponen" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Komponen</option>
                                                    @foreach ($master_lains->unique('komponen') as $masterlain)
                                                    <option value="{{$masterlain->komponen}}">{{$masterlain->komponen}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class='row'>
                                            <div class="col-25">
                                                <label for="">AKUN</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="akun" class="form-control" onchange="saveSelectedValue()">
                                                    <option value="">Pilih Akun</option>
                                                    @foreach ($master_lains->unique('akun') as $masterlain)
                                                    <option value="{{$masterlain->akun}}">{{$masterlain->akun}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="">BULAN</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="bulan" class="form-control">
                                                    <option value="">Pilih Bulan</option>
                                                    @foreach ($master_kegiatans->unique('bulan') as $master_kegiatan)
                                                    <option value="{{$master_kegiatan->bulan}}">{{$master_kegiatan->bulan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr>

                                <br>

                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/dashboard/laporan/cetakspj/'+ document.getElementById('bulan').value + '/' + document.getElementById('kegiatan_id').value"
                            target="_blank" class="btn btn-primary col-md-12"> Cetak Laporan Pertanggal <i class="fas fa-print"></i></a>
                        </div> 
                    </table>
                </font>
                    </div>


                    <script>
                        // Event listener untuk dropdown pertama
                        document.getElementById("program").addEventListener('change', function () {
                            console.log("Dropdown 1 changed!");
                            updateSelectedValue('selectedProgram', this);
                        });
                    
                        // Event listener untuk dropdown kedua
                        document.getElementById("kegiatanlain").addEventListener('change', function () {
                            console.log("Dropdown 2 changed!");
                            updateSelectedValue('selectedKegiatanlain', this);
                        });

                        // Event listener untuk dropdown ketiga
                        document.getElementById("output").addEventListener('change', function () {
                            console.log("Dropdown 3 changed!");
                            updateSelectedValue('selectedOutput', this);
                        });

                        // Event listener untuk dropdown keempat
                        document.getElementById("rincian_output").addEventListener('change', function () {
                            console.log("Dropdown 4 changed!");
                            updateSelectedValue('selectedRincianOutput', this);
                        });

                        // Event listener untuk dropdown kelima
                        document.getElementById("komponen").addEventListener('change', function () {
                            console.log("Dropdown 5 changed!");
                            updateSelectedValue('selectedKomponen', this);
                        });

                        // Event listener untuk dropdown ketiga
                        document.getElementById("akun").addEventListener('change', function () {
                            console.log("Dropdown 6 changed!");
                            updateSelectedValue('selectedAkun', this);
                        });
                    
                        // Fungsi untuk memperbarui nilai dan menyimpan di localStorage
                        function updateSelectedValue(localStorageKey, program) {
                            var selectedValue = program.options[program.selectedIndex].value;
                            
                            // Mendapatkan elemen dropdown kedua
                            var kegiatanlain = document.getElementById("kegiatanlain");
                            var selectedValue2 = kegiatanlain.options[kegiatanlain.selectedIndex].value;

                            // Mendapatkan elemen dropdown ketiga
                            var output = document.getElementById("output");
                            var selectedValue3 = output.options[output.selectedIndex].value;

                            // Mendapatkan elemen dropdown keempat
                            var rincian_output = document.getElementById("rincian_output");
                            var selectedValue4 = rincian_output.options[rincian_output.selectedIndex].value;

                            // Mendapatkan elemen dropdown kelima
                            var komponen = document.getElementById("komponen");
                            var selectedValue5 = komponen.options[komponen.selectedIndex].value;

                            // Mendapatkan elemen dropdown keenam
                            var akun = document.getElementById("akun");
                            var selectedValue6 = akun.options[akun.selectedIndex].value;
                    
                            // Simpan nilai ke localStorage
                            localStorage.setItem(localStorageKey, selectedValue);
                            console.log(localStorageKey + " updated to: " + selectedValue);

                            localStorage.setItem(localStorageKey + "2", selectedValue2);
                            console.log(localStorageKey + " 2 updated to: " + selectedValue2);

                            localStorage.setItem(localStorageKey + "3", selectedValue3);
                            console.log(localStorageKey + " 3 updated to: " + selectedValue3);

                            localStorage.setItem(localStorageKey + "4", selectedValue4);
                            console.log(localStorageKey + " 4 updated to: " + selectedValue4);

                            localStorage.setItem(localStorageKey + "5", selectedValue5);
                            console.log(localStorageKey + "5 updated to: " + selectedValue5);

                            localStorage.setItem(localStorageKey + "6", selectedValue6);
                            console.log(localStorageKey + " 6 updated to: " + selectedValue6);
                        }
                    </script>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
            <!-- bagian isi tabel -->	
</div>
</div>
    <div class="page-nav d-flex justify-content-center">
        {{-- {{ $master_kegiatans->links() }} --}}
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
