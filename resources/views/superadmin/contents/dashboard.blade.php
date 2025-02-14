@extends('layouts.app')

@section('title','Superadmin')
@section('content')


<div class="mt-5">
    <section class="section">
        {{-- ! Card --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pegawai</h4>
                        </div>
                        <div class="card-body">
                            523
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Masuk Pengajuan Cuti</h4>
                        </div>
                        <div class="card-body">
                            100
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12 p-0">
            <div class="card">
                <div class="card-header">
                    <h4>Latest Pengajuan Cuti Pegawai</h4>
                    <div class="card-header-action">
                        <a href="{{ route('get.list.cuti.user') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png"
                                                alt="avatar" width="30" class="rounded-circle mr-1"> Bima Eka Putra</a>
                                    </td>
                                    <td>
                                        <a href="#" class="badge badge-secondary">Staff PDSI</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                            data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                            data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection