@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Tambah Master Lain</h1>


            <div class="container">
                <form action="/dashboard/masterlain" method="POST">
                    @csrf
                    <div class="row">
                       <div class="col-25">
                            <label for="program">Program</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="program" name="program" required placeholder="Exp : [54.01.WA] Program Dukungan Manajemen"
                                value="{{ old('program') }}">
                        </div>
                        </div>

                        <div class='row'>
                            <div class="col-25">
                                <label for="kegiatanlain">Kegiatan</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="kegiatanlain" required placeholder="Exp : [2897] Pelayanan dan Pengembangan Diseminasi Informasi Statistik"
                                value="{{ old('kegiatanlain') }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-25">
                                <label for="output">Output</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="output" name="output" required placeholder="Exp : [2897.BMA] Data dan Informasi Publik" value="{{ old('output') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="rincian_output">Rincian Output</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="rincian_output" name="rincian_output" required placeholder="Exp : [2906.BMA.006] PUBLIKASI/LAPORAN SUSENAS"
                                value="{{ old('rincian_output') }}">
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                                <label for="komponen">Komponen</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="komponen" name="komponen" required placeholder="Exp : [051] PERSIAPAN"
                                value="{{ old('komponen') }}">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                    <label for="akun">Akun</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="akun" name="akun" required placeholder="Exp : [521211] Belanja Bahan"
                                    value="{{ old('akun') }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit" value="Submit">
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
