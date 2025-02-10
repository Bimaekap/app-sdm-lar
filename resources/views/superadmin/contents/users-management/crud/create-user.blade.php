@extends('layouts.app')
@section('title', 'Users Management')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Buat User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Form Buat User</a></div>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('create.user') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="alert alert-info">
                    <b>Note!</b> Form ini di gunakan untuk membuat user baru
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="superadmin">Superadmin</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                {{-- <button class="btn btn-secondary" type="reset">Reset</button> --}}
            </div>
        </form>

    </div>
</section>
@endsection