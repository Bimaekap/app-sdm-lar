@extends('layouts.app')
@section('title', 'Show Users')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Edit User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Form Edit User</a></div>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('edit.user') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="alert alert-info">
                    <b>Note!</b> Form ini di gunakan untuk Edit Data User
                </div>
                <div class="form-group" style="display: none">
                    <label>id</label>
                    <input type="text" name="id" class="form-control" value="{{ $user->id }}">
                </div>
                <div class="form-group" style="display: none">
                    <label>status_validasi</label>
                    <input type="text" name="status_validasi" class="form-control" value="{{ $user->status_validasi }}">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>NIP/NIDN</label>
                    <input type="text" name="NIP" class="form-control" placeholder="{{ $user->NIP }}">
                </div>
                <div class="form-group">
                    <label>Divisi</label>
                    <select class="form-control" name="divisi">
                        <option value="{{ $user->divisi }}">{{ $user->divisi }}</option>
                        <option value="staff">Staff</option>
                        <option value="hrd">HRD</option>
                        <option value="dosen">Dosen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $user->jabatan }}">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="{{ $user->role }}">{{ $user->role }}</option>
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