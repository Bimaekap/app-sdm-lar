@extends('layouts.app')
@section('title', 'Users Management')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data List Permohonon Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.dosen') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Data List Permohonon Anggota</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">History</h2>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-striped" id="table-2">
                                    <tr>

                                        <th scope="col" class="p-4">Nama Pengaju</th>
                                        <th scope="col" class="p-4">Jenis Cuti</th>
                                        <th scope="col" class="p-4">Status Validasi</th>
                                        <th scope="col" class="p-4">Waktu Diajukan</th>
                                        <th scope="col" class="p-4">Action</th>
                                    </tr>
                                    <tbody>
                                        {{-- ! Looping data disini --}}
                                        <tr>
                                            @foreach ($dataPermohonanCuti as $item)
                                            <td>{{ $item->nama_pengaju }}</td>
                                            <td>{{ $item->jenis_cuti }}</td>
                                            <td>
                                                @if( $item->status_validasi == 0)
                                                <span class="badge badge-danger">Belum di validasi</span>
                                                @else
                                                <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            @if($item->status_validasi == 0)
                                            <td>
                                                <form action="{{ route('post.validasi.permohonan') }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-success" type="submit">Approve</button>
                                                </form>
                                            </td>
                                            @endif

                                            @endforeach
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