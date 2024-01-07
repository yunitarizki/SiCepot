@extends('layouts.main')

@section('container')
    <h3>Daftar Kegiatan</h3>

    <div class="table">
            <table class="content-table table table-sm table-hover table-striped table-bordered">

                    <tr>
                        <th class="">No</th>
                        <th>Nama Kegiatan</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Beban Anggaran</th>
                        
                    </tr>
                @foreach ($kegiatans as $key => $kegiatan)
                    <tr>
                    <td style="text-align: center;">{{ $kegiatans->firstItem() + $key }}</td>
                        <td>{{ $kegiatan->name }}</td>
                        <td>{{ $kegiatan->satuan->name}}</td>
                        <td>{{ $kegiatan->harga }}</td>
                        {{-- <td style="text-align: center;"></td> --}}
                        <td>{{ $kegiatan->ba }}</td>
                        
                    </tr>
                @endforeach


            </table>

    <div class="page-nav d-flex justify-content-center">
        {{ $kegiatans->links() }}
    </div>

@endsection
