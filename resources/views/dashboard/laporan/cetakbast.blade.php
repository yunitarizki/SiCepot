@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
					<h2 class="heade" style="color: #4b4f58;">CETAK LAPORAN</h2>
					<hr style="margin-top: -2px;">
					
                    <div class="container" id="container">
                        <div class="row">
                            <div class="col-25">
                                <label for="mitra_id">Nama</label>
                            </div>
                            <div class="col-75">
                                <select id="mitra_id" name="mitra_id" class="form-select" aria-label="Default select example" required> </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="nilai">Tanggal Awal</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="mulai" id="mulai" class="form-control" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="nilai">Tanggal Akhir</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="selesai" id="selesai" class="form-control" >
                            </div>
                        </div>

                        <br>
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/dashboard/laporan/cetakbast/'+ document.getElementById('mitra_id').value + '/' + document.getElementById('mulai').value + '/' + document.getElementById('selesai').value "
                            target="_blank" class="btn btn-primary col-md-12"> Cetak Laporan Pertanggal <i class="fas fa-print"></i></a>
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
            })
            </script>
@endsection
