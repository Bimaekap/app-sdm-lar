{{-- #TODO: Kerjaan --}}


@extends('layouts.app')
@section('title', 'Format Cuti')
@push('styles')
<link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Format Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Format Cuti</a></div>
        </div>
    </div>
    <h2 class="section-title">Pengaturan Menu Cuti</h2>
    {{-- <div class="card">
        <div class="card-header">
            <h4>Daftar Cuti Aktif</h4>
            <hr class="">
        </div>
        <ul class="list-group">
            @foreach ($kategoriCuti as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->jenis_cuti }}
                <span class="badge badge-primary badge-pill">
                    {{ $item->jumlah_cuti }}
                </span>
            </li>
            @endforeach
        </ul>
    </div> --}}

    {{-- !Tambah Tabel --}}

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('form.tambah.cuti')}}" class="btn btn-primary my-3">Tambah
                    Cuti</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                            <tr>
                                <th>Jenis Cuti</th>
                                <th>Jumlah Cuti</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriCuti as $item)
                            <tr>
                                <td>
                                    {{ $item->jenis_cuti }}
                                </td>
                                <td>{{ $item->jumlah_cuti }}</td>
                                <td>
                                    @if ($item->status === 1)
                                    <span class="badge badge-success">Aktif</span>
                                    @elseif($item->status === 0)
                                    <span class="badge badge-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class=" btn btn-secondary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@if (\Session::has('messages'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! \Session::get('messages') !!}
    </div>
</div>
@endif
@push('scripts')
<script src="{{ asset('assets/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endpush

@endsection