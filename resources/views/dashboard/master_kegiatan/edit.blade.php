@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Edit Master Kegiatan</h1>


            <div class="container">
                <form action="/dashboard/master_kegiatan/{{$master_kegiatans->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-25">
                        <label for="bulan">Bulan Kegiatan</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="bulan" name="bulan"  required value="{{ old('bulan', $master_kegiatans->bulan) }}" placeholder="Masukan Bulan" style="width: 743px; height: 50px;" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="mitra_id">Mitra</label>
                        </div>
                        <div class="col-75">
                            <select id="mitra_id" name="mitra_id" class="form-select" aria-label="Default select example" required style="width: 743px; height: 50px;" class="form-control"> </select>
                        </div>
                    </div>

                        <div class='row'>
                            <div class="col-25">
                                <label for="kegiatan_id">Kegiatan</label>
                            </div>
                            <div class="col-75">
                                <select id="kegiatan_id" name="kegiatan_id" class="form-select"
                                aria-label="Default select example" required style="width: 743px; height: 50px;" class="form-control">
                                </select>
                            </div>
                        </div>
            
                        <div class="row mb-2">
                            <div class="col-25">
                                <label for="mulai">Awal Mulai Kegiatan</label>
                            </div>
                            <div class="col-75" >
                                <input type="date" id="mulai" name="mulai" value="{{ old('mulai', $master_kegiatans->mulai) }}" style="width: 743px; height: 50px;" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="selesai">Selesai Kegiatan</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="selesai" name="selesai" value="{{ old(' selesai', $master_kegiatans->selesai) }}" style="width: 743px; height: 50px;" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                             <div class="col-25">
                                <label for="volume">Volume Kegiatan</label>
                            </div>
                            <div class="col-75">
                            <input type="number" id="volume" name="volume" required value="{{ old('volume', $master_kegiatans->volume) }}" placeholder="Masukan Volume" style="width: 743px; height: 50px;" class="form-control">
                            </div>
                        </div>
              
                        <div class="row">
                            <div class="col-25">
                            <label for="perihal_spk">Perihal SPK</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="perihal_spk" name="perihal_spk"  required value="{{ old('perihal_spk', $master_kegiatans->perihal_spk) }}" placeholder="Masukan Perihal SPK" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="nospk">Nomer SPK</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="nospk" name="nospk"  required value="{{ old('nospk', $master_kegiatans->nospk) }}" placeholder="Masukan Nomor SPK">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="perihal_bast">Perihal BAST</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="perihal_bast" name="perihal_bast"  required value="{{ old('perihal_bast', $master_kegiatans->perihal_bast) }}" placeholder="Masukan Perihal BAST">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="nobast">Nomer BAST</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="nobast" name="nobast"  required value="{{ old('nobast', $master_kegiatans->nobast) }}" placeholder="Masukan Nomor BAST">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit" value="Submit">
                        </div>
                    </form>  
                </div>              
            </div>
        </div>
</div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                var selectedMitraId = <?php echo json_encode($selectedMitraId); ?>;
                var selectedMitraName = <?php echo json_encode($selectedMitraName); ?>;
                var selectedMitraId2 = <?php echo json_encode($selectedMitraId2); ?>;
                var selectedMitraName2 = <?php echo json_encode($selectedMitraName2); ?>;
                $("#mitra_id").select2({
                    placeholder: 'Pilih Mitra',
                    ajax: {
                        url: "{{ route('mitra.index') }}",
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

                // Menetapkan nilai awal dropdown saat halaman dimuat
                if (selectedMitraId) {
                    var mitraOption = new Option( selectedMitraName, selectedMitraId, true, true);
                    $("#mitra_id").append(mitraOption).trigger('change');
                }

                // Event listener untuk menetapkan nilai dropdown saat dipilih
                $("#mitra_id").on('select2:select', function(e) {
                    // Set nilai input terkait (jika diperlukan)
                    $("#mitra_id").val(e.params.data.id);
                });

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

                // Menetapkan nilai awal dropdown saat halaman dimuat
                if (selectedMitraId2) {
                    var mitraOption = new Option( selectedMitraName2, selectedMitraId2, true, true);
                    $("#kegiatan_id").append(mitraOption).trigger('change');
                }

                // Event listener untuk menetapkan nilai dropdown saat dipilih
                $("#kegiatan_id").on('select2:select', function(e) {
                    // Set nilai input terkait (jika diperlukan)
                    $("#kegiatan_id").val(e.params.data.id);
                });

            })
        </script>
        @endsection
  
