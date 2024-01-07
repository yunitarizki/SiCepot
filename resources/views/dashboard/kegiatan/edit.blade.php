@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Edit Kegiatan</h1>


            <div class="container">
                <form action="/dashboard/kegiatan/{{$kegiatan->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Nama Kegiatan</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" required placeholder="Masukan Nama Kegiatan" value="{{ old('name', $kegiatan->name) }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="satuan_id">Tipe Satuan</label>
                        </div>
                        <div class="col-75">
                            <select id="satuan_id" name="satuan_id">
                                @foreach ($satuans as $satuan)
                                    @if (old('satuan_id') == $satuan->id)
                                        <option value="{{ $satuan->id }} selected">{{ $satuan->name }}</option>
                                    @else
                                        <option value="{{ $satuan->id }}">{{ $satuan->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="harga">Harga per Satuan</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="harga" name="harga" required placeholder="Masukan Harga satuan tanpa titik" value="{{ old('harga', $kegiatan->harga) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="ba">BA</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="ba" name="ba" required placeholder="Masukan BA" value="{{ old('ba', $kegiatan->ba) }}">
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
    @endsection