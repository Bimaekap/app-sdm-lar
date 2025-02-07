@extends('layouts.app')
@section('title', 'Format Cuti')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Pengajuan Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Pengajuan Cuti</a></div>
        </div>
    </div>
    <h2 class="section-title">Form Pengajuan Cuti</h2>

    <div class="col-12 col-md-6 col-lg-6">
        <form action="{{ route('post.pengajuan.cuti') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-header">
                    <h4>Isi Form Dibawah</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <b>Note!</b> Pastikan Semua Data Dan Jenis Cuti Yang Anda Pilih Sudah Benar
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" readonly="" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" readonly="" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <input type="text" name="email" class="form-control" readonly="" value="{{ $user->role }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Cuti</label>
                        <select class="form-control" name="jenis_cuti">
                            {{-- Looping --}}
                            <option>Pilih Jenis Cuti</option>
                            @foreach ($collections as $item)
                            @foreach ($item->CutiUser as $data)
                            <option value="{{ $data->jenis_cuti }}">{{ $data->jenis_cuti }}</option>
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file_pengajuan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Total Cuti</label>
                        <div>
                            <span class="">Berapa hari cuti yang akan diambil ?</span>
                        </div>
                        <input type="number" name="jumlah_cuti" class="form-control" placeholder="Hari" min="1">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                </div>
            </div>
    </div>


</section>

@endsection