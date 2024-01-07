@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="heade" style="color: #4b4f58;">Data SPK</h2>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn2" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
                        <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                            <a class="text-white" style="text-decoration: none;"href="/dataspk-export"></i> Export </a>
                        </button>
                        <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                            <a href="{{ asset('Template-DataSPK.xlsx') }}" class="text-white" style="text-decoration: none;">
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
                    
                        <div class="container" id="container">

                            <div class="row">
                                <div class="col-md-10">
                                   <form action="/dashboard/data_spk/daftar">
                                        <div class="input-group mb-2">
                                           <input type="text" name="search" class="form-control" placeholder="Cari..." value={{ request('search') }}>
                                           <button class="btn btn-primary" type="submit">Search</button>
                                       </div>
                                   </form>
                               </div>

                                <div class="col">
                                    <button type="button" class="btn btn-success btn2 ms-2" data-toggle="modal" data-target="#exampleModalCenter">
                                    <a class="text-white" style="text-decoration: none;"href="/dashboard/data_spk/tambah"> <i class="fa-solid fa-circle-plus"></i> Tambah SPK </a>
                                    </button>
                                </div>
                  </div>

            <div class="row tampil" id="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered">
                
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nilai</th>
                        <th>Terbilang</th>
                        <th colspan="2">Aksi</th>
                    </tr>

                    
                    @foreach ($dataspks as $key => $spk)
                    <tr>
                        <td style="text-align: center;">{{ $dataspks->firstItem() + $key }}</td>
                        <td>{{ $spk->mitra->name }}</td>
                        <td>{{ $spk->mitra->alamat }}</td> 
                        {{-- <td style="text-align: center;">{{ number_format($spk->nilai, 0, ',', '.') }}</td> --}}
                        <td>@currency($spk->nilai)</td>
                        <td style="text-align: center;">{{ $spk->terbilang }}</td>
                        <td>
                            <a href="/dashboard/data_spk/{{ $spk->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                        </td>
                        <td>
                            <form action="/dashboard/data_spk/{{ $spk->id }}" method="POST" class="d-inline">
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
            
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Data SPK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dataspk-import" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
            @csrf
                        <div>
                            {{-- <label for="formFileLg" class="form-label"><h5>Gunakan nama file selain template-karyawan.xlsx</h5></label> --}}
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
    }
    </script>



</div>
<!-- bagian isi tabel -->

</div>
</div>
<div class="page-nav d-flex justify-content-center">
{{ $dataspks->links() }}
</div>

</div>
@endsection
 
