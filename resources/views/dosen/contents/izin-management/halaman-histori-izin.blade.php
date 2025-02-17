@extends('layouts.app')
@section('title', 'Users Management')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Menu Pengajuan Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.dosen') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">History Pengajuan Cuti</a></div>
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

                                        <th scope="col" class="p-4">Jenis Cuti</th>
                                        <th scope="col" class="p-4">Jumlah Cuti Di Pakai</th>
                                        <th scope="col" class="p-4">Tanggal Di Ajukan</th>
                                        <th scope="col" class="p-4">File Cuti</th>
                                    </tr>
                                    <tbody>
                                        {{-- ! Looping data disini --}}
                                        @foreach ($pengajuanIzinPerUser as $item)
                                        @forelse ($item->pengajuanIzinUser as $item)
                                        <tr>
                                            <td>Kosong</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Data masih kosong</td>
                                        </tr>
                                        @endforelse
                                        @endforeach
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