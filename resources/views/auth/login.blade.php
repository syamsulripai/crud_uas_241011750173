@extends('layouts.app')

@section('title','Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">

                <h4>Login Admin</h4>

            </div>

            <div class="card-body">

                <form action="{{ route('login.process') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Username</label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <button class="btn btn-primary w-100">

                       <i class="bi bi-box-arrow-in-right"></i> Login

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection