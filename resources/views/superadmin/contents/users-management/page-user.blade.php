@extends('layouts.app')
@section('title', 'Users Management')
@push('styles')
<link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/izitoast/dist/css/iziToast.min.css">
@endpush
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Managemen User</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.superadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Managemen User</a></div>

        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Tabel Management User</h2>

        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">

                                <div class="d-flex">
                                    <a href="{{ route('page.create.user') }}" class="btn btn-primary my-3">Tambah
                                        User</a>
                                </div>
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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- ! Looping data disini --}}
                                        @forelse($users as $user)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td class="align-middle">
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{-- <img alt="image" src="../assets/img/avatar/avatar-5.png"
                                                    class="rounded-circle" width="35" data-toggle="tooltip"
                                                    title="Wildan Ahdian"> --}}
                                                {{ $user->role }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('show.user',$user->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('destroy.user',$user->id) }}" method="POST">
                                                        @csrf
                                                        @method('post')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>

                                            </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- #TODO: Perbaiki --}}
        {{-- ! Validasi error hapus user --}}
        @if (session('delete-message'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('delete-message') }}
            </div>
        </div>
        @endif

    </div>
</section>

@push('scripts')
<script src="{{ asset('assets/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{asset('node_modules/izitoast/dist/js/iziToast.min.js')}}"></script>
<script src="{{ asset('assets/js/page/modules-toastr.js') }}"></script>

@endpush


@endsection