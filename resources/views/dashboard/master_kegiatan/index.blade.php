@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

                <div class="row">
                    <div class="col-md-6">
					<h2 class="heade" style="color: #4b4f58;">Master Kegiatan</h2>
					</div>
                    <div class="col" align="right">
                    <button type="button" class="btn btn-success btn2" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
                    <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                        <a class="text-white" style="text-decoration: none;"href="/masterkegiatan-export"></i> Export </a>
                    </button>
                    <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                        <a href="{{ asset('Template-MasterKegiatan.xlsx') }}" class="text-white" style="text-decoration: none;">
                            <i class="fas fa-download"></i> Template
                        </a>
                    </button>
                </div>
                    
            <hr style="margin-top: -2px;">
                
                @if (session()->has('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <style>
                    .lebar-kolom {
                        width: 150px; /* Sesuaikan dengan kebutuhan Anda */
                    }
                </style>

                <div class="container" id="container">

        <div class="row">
                <div class="col-md-9">
                <form action="/dashboard/master_kegiatan/daftar">
                    <div class="input-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Cari..." value={{ request('search') }}>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>

        {{-- </div> --}}
            <div class="col">
                <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                <a class="text-white" style="text-decoration: none;"href="/dashboard/master_kegiatan/tambah"> <i class="fa-solid fa-circle-plus"></i> Tambah Master Kegiatan </a>
                </button>
            </div>
        </div>

            <div class="row tampil" id="row">
				<div class="col-md-12">
					<div class="table-responsive">
            {{-- <table class="table table-sm table-hover table-striped table-bordered" style="width: 100%; font-size: 14px;"> --}}
                <table class="table table-sm table-hover table-striped table-bordered w-100 font-size: 14px;">

                    <tr>
                        <th>No</th>
                        <th>Bulan Kegiatan</th>
                        <th>Mitra</th>
                        <th>Uraian Kegiatan</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Volume</th>
                        <th>Harga Satuan</th>
                        <th>Nilai Perjanjian</th>
                        <th>Perihal SPK</th>
                        <th class="lebar-kolom">No SPK</th>
                        <th>Perihal BAST</th>
                        <th>No BAST</th>

                        <th colspan="2">Actions</th>
                    </tr>

                @foreach ($master_kegiatans as $key => $master_kegiatan)
                    <tr>
                        <td style="text-align: center;">{{ $master_kegiatans->firstItem() + $key }}</td>
                        <td>{{ $master_kegiatan->bulan }}</td>
                        <td>{{ $master_kegiatan->mitra->name }}</td>
                        <td>{{ $master_kegiatan->kegiatan->name }}</td>
                        <td>{{ $master_kegiatan->mulai }}</td>
                        <td>{{ $master_kegiatan->selesai }}</td>
                        <td>{{ $master_kegiatan->volume }}</td>
                        <td>@currency($master_kegiatan->kegiatan->harga)</td>
                        <td>@currency($master_kegiatan->volume * $master_kegiatan->kegiatan->harga)</td>
                        <td >{{ $master_kegiatan->perihal_spk }}</td>
                        <td class="lebar-kolom">{{ $master_kegiatan->nospk }}</td>
                        <td>{{ $master_kegiatan->perihal_bast }}</td>
                        <td>{{ $master_kegiatan->nobast }}</td>
                        <td>
                            <a href="/dashboard/master_kegiatan/{{ $master_kegiatan->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                        </td>
                        <td>
                            <form action="/dashboard/master_kegiatan/{{ $master_kegiatan->id }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin?')"><span><i
                                            data-feather="trash-2"></i></span></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </table>
            </div>
                </div>
            </div>
        </div>
       <!-- Modal Import Excel-->
       <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Master Kegiatan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/masterkegiatan-import" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                @csrf
                            <div>
                                <label for="formFileLg" class="form-label">Masukkan File Excel</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file_excel" multiple>
                            </div>
                        {{-- </div> --}}
                        <br>
                        <div class="col" align="right">
                        <button type="button" onclick="submitForm()" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Import</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        function submitForm() {
            var fileInput = document.getElementById('formFileLg');
            if (fileInput.files.length === 0) {
                alert('Masukkan File terlebih dahulu.');
                return;
            }
            document.getElementById('frmFileUpload').submit();
        }</script>

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