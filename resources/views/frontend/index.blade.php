@extends('layouts.app')

@section('title', 'Data Aplikasi Mobile')

@section('content')

<div class="p-5 mb-5 bg-primary text-white rounded-4 shadow">

    <h1 class="display-5 fw-bold">
        📱 Data Aplikasi Mobile
    </h1>

    <p class="lead">
        Selamat datang di Sistem Informasi Data Aplikasi Mobile.
        Website ini menampilkan daftar aplikasi yang telah tersimpan pada database.
    </p>

</div>

<div class="row">

    @forelse($mobileApps as $mobile)

    <div class="col-md-4 mb-4">

        <div class="card shadow-lg border-0 h-100 rounded-4">

            <img src="{{ asset('uploads/'.$mobile->gambar) }}"
                 class="card-img-top"
                 style="height:230px; object-fit:cover;">

            <div class="card-body">

                <h5 class="fw-bold text-primary">
                    {{ $mobile->nama_aplikasi }}
                </h5>

                <hr>

                <p>
                    <i class="bi bi-person-fill"></i>
                    {{ $mobile->developer }}
                </p>

                <p>
                    <i class="bi bi-phone-fill"></i>
                    Versi {{ $mobile->versi }}
                </p>

                <p>
                    {{ Str::limit($mobile->deskripsi, 80) }}
                </p>

                <a href="{{ route('mobile.show', $mobile->id) }}"
                   class="btn btn-primary w-100">
                    <i class="bi bi-eye"></i> Detail
                </a>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">
        <div class="alert alert-warning">
            Belum ada data aplikasi.
        </div>
    </div>

    @endforelse

</div>

@endsection