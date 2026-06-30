@extends('layouts.app')

@section('title', 'Tambah Data Aplikasi Mobile')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h4>Tambah Data Aplikasi Mobile</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('mobile.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Aplikasi</label>
                <input type="text" name="nama_aplikasi" class="form-control" value="{{ old('nama_aplikasi') }}">
                @error('nama_aplikasi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Developer</label>
                <input type="text" name="developer" class="form-control" value="{{ old('developer') }}">
                @error('developer')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Versi</label>
                <input type="text" name="versi" class="form-control" value="{{ old('versi') }}">
                @error('versi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>

            <a href="{{ route('mobile.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>

        </form>

    </div>

</div>

@endsection