@extends('layouts.app')
@section('title', 'Pengajuan Cuti')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Buat Jenis Cuti</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#!">Form Buat Jenis Cuti</a></div>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('post.tambah.cuti') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="alert alert-info">
                    <b>Note!</b> Form ini di gunakan untuk membuat jenis cuti baru
                </div>

                <div class="form-group">
                    <label>Nama Cuti</label>
                    <input type="text" name="jenis_cuti" class="form-control">
                    @if($errors->has('jenis_cuti'))
                    <div class="alert alert-danger alert-dismissible show fade mt-5 w-25">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $errors->first('jenis_cuti') }}
                        </div>
                    </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Total Cuti</label>
                    <div>
                        <span>Total cuti yang sesuai dengan peraturan SDM</span>
                    </div>
                    <input type="number" name="jumlah_cuti" placeholder="hari" min="1" class="form-control">
                    @if($errors->has('jumlah_cuti'))
                    <div class="alert alert-danger alert-dismissible show fade mt-5  w-25">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $errors->first('jumlah_cuti') }}
                        </div>
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" placehorder="pilih status">
                        {{-- <option>Pilih Status</option> --}}
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                {{-- <button class="btn btn-secondary" type="reset">Reset</button> --}}
            </div>
        </form>

    </div>


</section>

@push('name')

@endpush
@endsection