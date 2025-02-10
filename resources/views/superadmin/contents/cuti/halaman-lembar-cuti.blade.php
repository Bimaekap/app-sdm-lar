@extends('layouts.app')
@section('title', 'Halaman Lembar Cuti')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>File Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Halaman File cuti</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">File Pengajuan Cuti User</h2>
        <img src="{{ asset('img/contoh_lembar_cuti.jpg') }}" alt="">
    </div>
</section>
@endsection