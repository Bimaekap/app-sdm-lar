@extends('layouts.app')
@section('title', 'Pengajuan Cuti')
@section('content')
<nav class="text-sm font-medium text-neutral-600 dark:text-neutral-300" aria-label="breadcrumb">
    <ol class="flex flex-wrap items-center gap-1">
        <li class="flex items-center gap-1.5">
            <a href="{{ route('dashboard.superadmin') }}" aira-label="home"
                class="hover:text-neutral-900 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"
                    class="size-4">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z" />
                </svg>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </li>
        <li class="flex items-center gap-1">
            <a href="#" class="hover:text-neutral-900 dark:hover:text-white">Cuti Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </li>
        <li class="flex items-center gap-1">
            <a href="#" class="hover:text-neutral-900 dark:hover:text-white">Pengajuan Cuti</a>

        </li>
    </ol>
</nav>

{{-- #TODO: Pengajuan cuti --}}

<div class="container mt-8">
    <h1 class="text-white text-xl font-semibold my-5">Pengajuan Cuti</h1>
    <span class="text-sm text-neutral-500"> Isi Form Di Bawah Untuk Melanjutkan Pengajuan Cuti</span>
</div>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
{{-- <p class="text-white">pengajuan cuti</p> --}}

<form action="{{ route('pengajuan.cuti', Auth::user()->id) }}" enctype="multipart/form-data" method="POST"
    class="grid grid-cols-2 gap-4 mt-16 ">
    @csrf
    @method('post')
    {{-- ! Flex row 1 --}}
    <div class="">
        <label for="" class=" text-white text-xl mb-5">Nama <span class="text-base text-red-500">*</span></label>
        <br>
        <span class="text-neutral-500 text-sm italic">Sertakan Gelar Pada Kolom</span>
        <div>
            <input name="" value="{{ Auth::user()->name }}" type="text"
                class="mt-5 rounded-md w-96 py-2 my-4 border-1  bg-neutral-800 text-neutral-100">
        </div>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
        <label for="" name="email" class=" text-white text-xl ">Email <span
                class="text-sm text-red-500">*</span></label>
        <div>
            <input type="email" value="{{ Auth::user()->email }}" placeholder="Masukkan Email Universitas"
                class="text-sm mt-5 rounded-md w-96 py-2 my-4 border-1 p-1  bg-neutral-800 text-neutral-100">
        </div>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
        <label for="" class="text-white my-5 text-xl">File Pengajuan <span class="text-sm text-red-500">*</span></label>
        <br>
        <span class="text-neutral-500 text-sm my-5 italic">File wajib di isi</span>
        <div>
            <input type="file" name="file_pengajuan" class=" my-5 font-medium text-white">
        </div>
        <label for=""></label>
        {{--
        <hr class="text-neutral-700 my-5"> --}}
    </div>
    {{-- ! Flex row 2 --}}

    <div class="border-l-2 border-neutral-800 pl-4">
        <label for="" class=" text-white text-xl mb-5">Jenis Cuti <span class="text-sm text-red-500">*</span></label>
        <div class="mt-1">
            <span class="italic text-sm text-neutral-500">pilih jenis pengajuan cuti yang ingin anda ajukan</span>
        </div>
        {{-- #TODO: Tampilkan Sisa Cuti User ketika berhasil pilih cuti --}}
        <div>
            <select name="jenis_cuti" id=""
                class="rounded-sm  bg-neutral-300 font-semibold cursor-pointer px-3 py-2 mt-5">
                {{-- #TODO: Looping data cuti user disini --}}
                <option class="font-semibold">Pilih Cuti</option>
                @foreach($collections as $collect)
                @foreach($collect->CutiUser as $item)
                <option value="{{ $item->jenis_cuti }}" class="cursor-pointer font-semibold">{{ $item->jenis_cuti }} <=
                        {{ $item->jumlah_cuti
                        }}
                </option>
                @endforeach
                @endforeach

            </select>
        </div>
        <hr class="h-px mt-5 mb-3 bg-gray-200 border-0 dark:bg-gray-700">
        <label for="" class="text-white text-xl">Masukkan Cuti <span class="text-sm text-red-500">*</span></label>
        <div>
            <span class="italic text-neutral-500 text-sm">Berapa hari cuti yang mau dipakai ?</span>
        </div>
        {{-- #TODO: buat min max cuti --}}
        <div class="">
            <input type="number" name="jumlah_cuti" placeholder="jumlah hari" min="1"
                class="text-sm  mt-5 rounded-md w-96 py-2 my-2 border-1 p-1  bg-neutral-800 text-neutral-100">
        </div>
        {{-- ! Button --}}
        <input type="submit" value="Kirim"
            class="relative mt-20 cursor-pointer bg-neutral-200 hover:bg-neutral-500 text-base font-semibold rounded-sm py-2 px-5 ">
    </div>

</form>

{{-- #NOTE: Session success dan error --}}

@if(Session::has('success'))
<div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
    class="relative w-full overflow-hidden rounded-md border border-green-500 bg-white text-neutral-600 dark:bg-stone-950 dark:text-neutral-300"
    role="alert" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
    <div class="flex w-full items-center gap-2 bg-green-500/10 p-4">
        <div class="bg-green-500/15 text-green-500 rounded-full p-1" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-2">
            <h3 class="text-sm font-semibold text-green-500">Successfully Saved
            </h3>
            <p class="text-xs font-medium sm:text-sm">{{ Session::get('success') }}</p>
        </div>
        <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif
@if(Session::has('jumlah_cuti'))
<div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
    class="relative w-full overflow-hidden rounded-radius border border-danger bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark"
    role="alert" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
    <div class="flex w-full items-center gap-2 bg-danger/10 p-4">
        <div class="bg-danger/15 text-danger rounded-full p-1" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-2">
            <h3 class="text-sm font-semibold text-danger text-white">Cuti</h3>
            <p class="text-xs font-medium sm:text-sm text-white">{{Session::has('jumlah_cuti') }}</p>
        </div>
        <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif






@endsection