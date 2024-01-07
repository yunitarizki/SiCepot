@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
					<h2 class="heade" style="color: #4b4f58;">Master Lain</h2>
                        {{-- <button type="button" class="btn btn-success btn2" data-bs-toggle="modal" data-bs-target="#importModal">Import</button> --}}
                        
                    
			<hr style="margin-top: -2px;">
					
                @if (session()->has('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="container" id="container">
                    <div class="row"> 
                        <div class="col-md-8">
                        <form action="/dashboard/masterlain/daftar">
                            <div class="input-group mb-2">
                                <input type="text" name="search" class="form-control" placeholder="Cari...." value={{ request('search') }}>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
        
                    <div class="col">
                        <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                        <a class="text-white" style="text-decoration: none;"href="/dashboard/masterlain/tambah"> <i class="fa-solid fa-circle-plus"></i> Tambah Master Lain</a>                                   
                        </button>
                        <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                            <a class="text-white" style="text-decoration: none;"href="/masterlain-export"></i> Export </a>
                        </button>  
                    </div>
                 </div>

            <div class="row tampil" id="row">
				<div class="col-md-12">
					<div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Program</th>
                        <th>Kegiatan</th>
                        <th>Output</th>
                        <th>Rincian Output</th>
                        <th>Komponen</th>
                        <th>Akun</th>

                        <th colspan="2">Actions</th>
                    </tr>

                @foreach ($master_lains as $key => $masterlain)
                    <tr>
                        <td style="text-align: center;">{{ $master_lains->firstItem() + $key }}</td>
                        <td>{{ $masterlain->program }}</td>
                        <td>{{ $masterlain->kegiatanlain}}</td>
                        <td>{{ $masterlain->output }}</td>
                        <td>{{ $masterlain->rincian_output }}</td>
                        <td>{{ $masterlain->komponen}}</td>
                        <td>{{ $masterlain->akun }}</td>
                        <td>
                            <a href="/dashboard/masterlain/{{ $masterlain->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                        </td>
                        <td>
                            <form action="/dashboard/masterlain/{{ $masterlain->id }}" method="POST"
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
        <!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="importModalLabel">Import Master Lain</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/masterlain-import" method="post" enctype="multipart/form-data">
                @csrf
                <div class="from grup mb-3">
                    <label for="">Pilih File</label>
                    <input  type="file" class="form-control" name="file">
                </div>
                <button class="btn btn-success btn2" type="submit">Import</button>
            </form>
        </div>
      </div>
    </div>

</div>
					<!-- bagian isi tabel -->	
		</div>
	</div>
            <div class="page-nav d-flex justify-content-center">
                {{ $master_lains->links() }}
            </div>
    </div>
</div>
@endsection
