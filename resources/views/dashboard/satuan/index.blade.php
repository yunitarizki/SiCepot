@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">
                <h2 class="heade" style="color: #4b4f58;">Satuan</h2>
					<hr style="margin-top: -2px;">
                    <div class="container" id="container">

                    <div class="row">
                         <div class="col-md-9">
                            <form action="/dashboard/kegiatan/daftar">
                                 <div class="input-group mb-2">
                                    <input type="text" name="search" class="form-control" placeholder="Search..." value={{ request('search') }}>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    
                        <div class="col">
                            <button type="button" class="btn btn-success btn2" data-toggle="modal" data-target="#exampleModalCenter">
                                <a class="text-white" style="text-decoration: none;"href="/dashboard/satuan/tambah"> <i class="fa-solid fa-circle-plus"></i> Tambah Satuan</a>
                            </button>
                            </div>
                        </div>
    
                    @if (session()->has('success'))
                        <div class="alert alert-success mt-2" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
    
                                <div class="row tampil" id="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                        <table class="table table-sm table-hover table-striped table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Satuan</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
    
                                        @foreach ($satuans as $key => $satuan)
                                            <tr>
                                                <td style="text-align: center;">{{ $satuans->firstItem() + $key }}</td>
                                                <td>{{ $satuan->name }}</td>
                                                <td>
                                                    <a href="/dashboard/satuan/{{ $satuan->id }}/edit" class="badge bg-warning">
                                                        <span data-feather="edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/satuan/{{ $satuan->id }}" method="POST" class="d-inline">
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
                    <!-- bagian isi tabel -->
                        
                </div>
            </div>
                <div class="page-nav d-flex justify-content-center">
                    {{ $satuans->links() }}
                </div>
    
        </div>
    @endsection        