@extends('layouts.app')
@section('title', 'Management Pengajuan Cuti User')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Menu Pengajuan Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Management Pengajuan Cuti User</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tabel Management Pengajuan Cuti User</h2>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <a href="{{ route('page.create.user') }}" class="btn btn-primary my-3">Tambah User</a>
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Nama</th>
                                            <th>Jenis Cuti</th>
                                            <th>Jumlah Cuti</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- ! Looping data disini --}}
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>pegawai 1</td>
                                            <td class="align-middle">
                                                Cuti Sakit
                                            </td>
                                            <td>
                                                10

                                            </td>
                                            <td>
                                                filepengajuancuti.pdf
                                            </td>
                                            <td><a href="#" class="btn btn-secondary">Edit</a></td>
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