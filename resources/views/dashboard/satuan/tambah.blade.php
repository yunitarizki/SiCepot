@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Tambah Satuan</h1>


            <div class="container">
                <form action="/dashboard/satuan" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Nama Satuan</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" required placeholder="Masukan Satuan" value="{{ old('name') }}">
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