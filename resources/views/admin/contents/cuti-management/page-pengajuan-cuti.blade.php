@extends('layouts.app')
@section('title', 'Users Management')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pengajuan Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Pengajuan Cuti</a></div>
        </div>
    </div>
    <h2 class="section-title">Halaman Cuti Saya</h2>

    <div class="card">
        <div class="card-header">
            <h4>Daftar Sisa Cuti Saya</h4>
        </div>
        {{-- ! Looping data cuti berdasarkan user --}}
        <div class="card-body">
            <ul class="list-group">
                @foreach ($collections as $item)
                @foreach ($item->CutiUser as $data)

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $data->jenis_cuti }}
                    <span class="badge badge-primary badge-pill">{{ $data->jumlah_cuti }}</span>
                </li>
                @endforeach
                @endforeach
            </ul>
            <a href="{{ route('form.pengajuan.cuti',Auth::user()->name) }}" class="btn btn-primary my-3">Ajukan Cuti</a>
        </div>

    </div>



</section>


@endsection