@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
		<div class="konten khusus2">
			<div class="konten_dalem khusus3 mt-5">

            <h1>Edit Master Lain</h1>


            <div class="container">
                <form action="/dashboard/masterlain/{{$master_lains->id}}" method="POST">
                    @method('put')
                    @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="program">Program</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="program" name="program"  required value="{{ old('program', $master_lains->program) }}">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-25">
                                <label for="kegiatanlain">Kegiatan</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="kegiatanlain" name="kegiatanlain"  required value="{{ old('kegiatan', $master_lains->kegiatanlain) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-25">
                                <label for="output">Output</label>
                            </div>
                            <div class="col-75" >
                                <input type="text" id="output" name="output" value="{{ old('output', $master_lains->output) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="rincian_output">Rincian Output</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="rincian_output" name="rincian_output" value="{{ old(' rincian_output', $master_lains->rincian_output) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="komponen">Komponen</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="komponen" name="komponen" required value="{{ old('komponen', $master_lains->komponen) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="akun">Akun</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="akun" name="akun"  required value="{{ old('akun', $master_lains->akun) }}">
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
  
