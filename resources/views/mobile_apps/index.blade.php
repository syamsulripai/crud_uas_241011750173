@extends('layouts.app')

@section('title','Data Aplikasi Mobile')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Data Aplikasi Mobile</h3>



    
    <div>

        <a href="{{ route('mobile.create') }}" class="btn btn-success">
    <i class="bi bi-plus-circle"></i> Tambah Data
</a>

        <a href="{{ route('mobile.exportPdf') }}" class="btn btn-danger">
    <i class="bi bi-file-earmark-pdf"></i> Export PDF
</a>

    </div>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card bg-primary text-white shadow">

            <div class="card-body">

                <h5>Total Aplikasi</h5>

                <h2>{{ $mobileApps->count() }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card bg-success text-white shadow">

            <div class="card-body">

                <h5>Total Developer</h5>

                <h2>{{ $mobileApps->pluck('developer')->unique()->count() }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card bg-danger text-white shadow">

            <div class="card-body">

                <h5>Export Data</h5>

                <a href="{{ route('mobile.exportPdf') }}"
                    class="btn btn-light mt-2">

                    Download PDF

                </a>

            </div>

        </div>

    </div>

</div>

<table class="table table-bordered table-striped" id="table">

    <thead class="table-dark">

    <tr>

        <th>No</th>

        <th>Gambar</th>

        <th>Nama</th>

        <th>Developer</th>

        <th>Versi</th>

        <th>Aksi</th>

    </tr>

    </thead>

    <tbody>

    @foreach($mobileApps as $mobile)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td width="120">

            <img src="{{ asset('uploads/'.$mobile->gambar) }}"
                 width="100">

        </td>

        <td>{{ $mobile->nama_aplikasi }}</td>

        <td>{{ $mobile->developer }}</td>

        <td>{{ $mobile->versi }}</td>

        <td>

            <a href="{{ route('mobile.show',$mobile->id) }}"
               class="btn btn-info btn-sm">

                <i class="bi bi-eye"></i> Detail

            </a>

            <a href="{{ route('mobile.edit',$mobile->id) }}"
               class="btn btn-warning btn-sm">

                <i class="bi bi-pencil-square"></i> Edit

            </a>

            <form action="{{ route('mobile.destroy',$mobile->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                    <i class="bi bi-trash"></i> Hapus

                </button>

            </form>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection

@push('scripts')

<script>

$(document).ready(function(){

    $('#table').DataTable();

});

</script>

@endpush