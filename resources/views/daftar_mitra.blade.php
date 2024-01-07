@extends('layouts.main')

@section('container')
    <h3>Daftar Mitra</h3>
    <div class="table">
            <table class="content-table table table-sm table-hover table-striped table-bordered">

                    <tr>
                        <th class="">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gol</th>
                        <th>Nama Rekening</th>
                        <th>Bank</th>
                        <th>Nomor Rekening</th>
                    </tr>
                @foreach ($mitras as $key => $mitra)
                    <tr>
                    <td style="text-align: center;">{{ $mitras->firstItem() + $key }}</td>
                        <td>{{ $mitra->name }}</td>
                        <td>{{ $mitra->alamat }}</td>
                        <td style="text-align: center;">{{ $mitra->golongan }}</td>
                        <td>{{ $mitra->nama_rek }}</td>
                        <td>{{ $mitra->bank->name }}</td>
                        <td>{{ $mitra->nomor_rek }}</td>
                    </tr>
                @endforeach


            </table>

    <div class="page-nav d-flex justify-content-center">
        {{ $mitras->links() }}
    </div>
    
@endsection
