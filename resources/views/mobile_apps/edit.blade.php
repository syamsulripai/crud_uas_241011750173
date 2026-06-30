@extends('layouts.app')

@section('title', 'Edit Data Aplikasi Mobile')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">
        <h4>Edit Data Aplikasi Mobile</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('mobile.update', $mobile->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3 text-center">

                <img src="{{ asset('uploads/'.$mobile->gambar) }}" width="180" class="mb-3">

            </div>

            <div class="mb-3">
                <label>Gambar Baru</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Aplikasi</label>
                <input type="text" name="nama_aplikasi" class="form-control"
                    value="{{ $mobile->nama_aplikasi }}">
            </div>

            <div class="mb-3">
                <label>Developer</label>
                <input type="text" name="developer" class="form-control"
                    value="{{ $mobile->developer }}">
            </div>

            <div class="mb-3">
                <label>Versi</label>
                <input type="text" name="versi" class="form-control"
                    value="{{ $mobile->versi }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="5"
                    class="form-control">{{ $mobile->deskripsi }}</textarea>
            </div>

            <button class="btn btn-warning">
               <i class="bi bi-arrow-repeat"></i> Update
            </button>

            <a href="{{ route('mobile.index') }}"
                class="btn btn-secondary">

               <i class="bi bi-arrow-left-circle"></i> Kembali

            </a>

        </form>

    </div>

</div>

@endsection