@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Tambah Data SPK</h1>


            <div class="container">
                <form action="/dashboard/data_spk" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="mitra_id">Mitra</label>
                            </div>
                            <div class="col-75">
                                <select id="mitra_id" name="mitra_id" class="form-select" aria-label="Default select example" required> </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="nilai">Nilai</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="nilai" name="nilai" required placeholder="Masukan nilai tapa menggunakan titik" 
                                value="{{ old('nilai') }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                        <div class="col-25">
                                <label for="terbilang">Terbilang</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="terbilang" name="terbilang" value="Rupiah" required placeholder="Terbilang"
                                value="{{ old('terbilang') }}">
                        </div>
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit" value="Tambah">
                        </div>
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

                $("#alamat").select2({
                    placeholder: 'Pilih Alamat',
                    ajax: {
                        url: "{{ route('mitra.index') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.alamat
                                    }
                                })
                            }
                        }
                    }
                });
            })
        </script>
    @endsection
