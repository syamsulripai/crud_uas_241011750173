@extends('layouts.app')

@section('title', 'Detail Aplikasi Mobile')

@section('content')

<div class="card shadow">

    <div class="card-header bg-info text-white">
        <h4><i class="bi bi-eye"></i> Detail Aplikasi Mobile</h4>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4 text-center">

                <img src="{{ asset('uploads/'.$mobile->gambar) }}"
                     class="img-fluid rounded shadow"
                     style="max-height:300px;object-fit:cover;">

            </div>

            <div class="col-md-8">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">Nama Aplikasi</th>
                        <td>{{ $mobile->nama_aplikasi }}</td>
                    </tr>

                    <tr>
                        <th>Developer</th>
                        <td>{{ $mobile->developer }}</td>
                    </tr>

                    <tr>
                        <th>Versi</th>
                        <td>{{ $mobile->versi }}</td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $mobile->deskripsi }}</td>
                    </tr>

                </table>

                <a href="{{ url()->previous() }}" class="btn btn-secondary">
    <i class="bi bi-arrow-left-circle"></i> Kembali
</a>

            </div>

        </div>

    </div>

</div>

@endsection