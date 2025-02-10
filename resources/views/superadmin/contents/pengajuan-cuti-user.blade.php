@extends('layouts.app')
@section('title', 'Management Pengajuan Cuti User')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Menu Pengajuan Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Management Pengajuan Cuti Pegawai</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tabel Pengajuan Cuti Pegawai</h2>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th>Nama</th>
                                            <th>Divisi</th>
                                            <th>Jenis Cuti</th>
                                            <th>Jumlah Cuti</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- ! Looping data disini --}}
                                        <tr>

                                            <td>Bima Eka Putra</td>
                                            <td>
                                                <a href="#" class="badge badge-secondary">Staff PDSI</a>
                                            </td>
                                            <td class="align-middle">
                                                Cuti tahunan
                                            </td>
                                            <td>
                                                10
                                            </td>

                                            <td>
                                                filepengajuancuti.pdf
                                            </td>

                                            <td><a href="{{ route('get.lembar.cuti.user') }}"
                                                    class="btn btn-primary">Show</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection