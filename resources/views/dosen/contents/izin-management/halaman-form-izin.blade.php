@extends('layouts.app')
@section('title', 'Pengajuan Izin')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Pengajuan Izin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.dosen') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Pengajuan Izin</a></div>
        </div>
    </div>
    <h2 class="section-title">Form Pengajuan Izin</h2>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('post.pengajuan.cuti') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-header">
                        <h4>Isi Form Dibawah</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <b>Note!</b> Isi semua kolom untuk pengajuan izin
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" readonly="" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="email" class="form-control" readonly="" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="email" class="form-control" readonly="" value="{{ $user->role }}">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="email" class="form-control" readonly="" value="{{ $user->role }}">
                        </div>

                        <div class="form-group">
                            <label>File Pendukung</label>
                            <input type="file" name="file_pengajuan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                    </div>
                </div>
        </div>
    </div>
</section>


@endsection