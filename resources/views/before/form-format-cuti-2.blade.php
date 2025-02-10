@extends('layouts.app')
@section('title','form ubah cuti')
@vite('resources/css/addon.css')
@section('content')

<nav class="text-sm font-medium text-neutral-600 dark:text-neutral-300" aria-label="breadcrumb">
    <ol class="flex flex-wrap items-center gap-1">
        <li class="flex items-center gap-1.5">
            <a href="{{ route('dashboard.admin') }}" aira-label="home"
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
            <a href="{{ route('page.format.cuti') }}" class="hover:text-neutral-900 dark:hover:text-white">Format
                Cuti</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </li>
        <li class="flex items-center gap-1">
            <a href="{{ route('page.format.cuti') }}" class="hover:text-neutral-900 dark:hover:text-white">
                Form Ubah Cuti</a>
        </li>
    </ol>
</nav>

<div class="container h-full mt-8 rounded-xl ">
    <div class=" h-20">
        <h1 class="text-white text-xl font-semibold">Pengaturan Data Cuti</h1>
        <span class="mt-5  text-sm text-neutral-500">Halaman Pengaturan Data Cuti SDM</span>
    </div>

    <div x-data="{ selectedTab: 'likes' }" class="w-full">
        <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()"
            class="flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700" role="tablist"
            aria-label="tab options">

            <button @click="selectedTab = 'groups'" :aria-selected="selectedTab === 'groups'"
                :tabindex="selectedTab === 'groups' ? '0' : '-1'"
                :class="selectedTab === 'groups' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelGroups">Tambah
                Cuti</button>
            <button @click="selectedTab = 'likes'" :aria-selected="selectedTab === 'likes'"
                :tabindex="selectedTab === 'likes' ? '0' : '-1'"
                :class="selectedTab === 'likes' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelLikes">Edit
                Cuti</button>
        </div>

        {{-- ! Form Tambah Cuti Baru --}}
        <div class="px-2 py-4 text-neutral-600 dark:text-neutral-300">
            <div x-show="selectedTab === 'groups'" id="tabpanelGroups" role="tabpanel" aria-label="groups">
                <form action="{{ route('post.tambah.cuti') }}" method="POST" aria-hidden="true">
                    @csrf
                    @method('post')
                    <div class="flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Nama Cuti</label>
                        <input id="textInputDefault" type="text"
                            class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                            name="jenis_cuti" autocomplete="name" required />
                    </div>
                    <div class="flex w-full mt-5 max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Jumlah Cuti</label>
                        <span class=" text-xs text-neutral-500">Masukkan jumlah cuti sesuai dengan peraturan
                            SDM</span>
                        <input id="textInputDefault" type="number"
                            class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                            name="jumlah_cuti" placeholder="1-100" autocomplete="name" required />
                    </div>

                    <button type="submit" class="mt-5 cursor-pointer whitespace-nowrap rounded-md bg-sky-500 px-4 py-2 text-sm font-medium tracking-wide
                         text-white transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 
                         focus-visible:outline-offset-2 focus-visible:outline-sky-500 active:opacity-100 active:outline-offset-0 
                         disabled:opacity-75 disabled:cursor-not-allowed dark:bg-sky-500 dark:text-white
                          dark:focus-visible:outline-sky-500">Simpan</button>
                </form>
                @if(Session::has('messages'))
                <div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
                    class=" w-1/4 absolute bottom-1 right-5 overflow-hidden rounded-md border border-green-500 bg-white text-neutral-600 dark:bg-stone-950 dark:text-neutral-300"
                    role="alert" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <div class="flex w-full items-center gap-2 bg-green-500/10 p-4">
                        <div class="bg-green-500/15 text-green-500 rounded-full p-1" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-6" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-2">
                            <h3 class="text-sm font-semibold text-green-500">Berhasil
                            </h3>
                            <p class="text-xs font-medium sm:text-sm">{{ Session::get('messages') }}</p>
                        </div>
                        <button type="button" @click="alertIsVisible = false" class="ml-auto"
                            aria-label="dismiss alert">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endif
            </div>

            {{-- ! Form Edit Cuti --}}
            {{-- #README: https://datatables.net/examples/api/form.html --}}
            <div x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel" aria-label="likes">
                {{-- <form action="#" method="POST">
                    @csrf
                    @method('post') --}}
                    {{-- ! Tabel Cuti --}}
                    <button type="submit" id="submit">Submit Form</button>
                    <div
                        class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                        <table id="table-edit-cuti"
                            class="w-full display text-left text-sm text-neutral-600 dark:text-neutral-300">
                            <thead
                                class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">

                                <tr>
                                    <th scope="col" class="p-4">Jenis Cuti</th>
                                    <th scope="col" class="p-4">Jumlah Cuti</th>
                                    <th scope="col" class="p-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                                @foreach ($kategoriCuti as $itemCuti)

                                <tr>
                                    <td class="p-4">{{ $itemCuti->jenis_cuti }}</td>
                                    <td>
                                        <input id="textInputDefault" type="number"
                                            class="w-1/4 rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                            name="jumlah_cuti" autocomplete="name" />
                                    </td>
                                    <td>
                                        <div
                                            class="relative flex w-1/4 max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="absolute pointer-events-none right-1 top-2 h-5 w-4">
                                                <path fill-rule="evenodd"
                                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{-- #TODO: styling button option status dibawah --}}
                                            <select id="status" name="status" id="row-1-status" name="row-1-status"
                                                class="w-full appearance-none rounded-md border border-neutral-300  bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700
                                             dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                                @if($itemCuti->status == 1)
                                                <option value="1" selected="selected">
                                                    <span
                                                        class="inline-flex overflow-hidden rounded-md border border-green-500 px-1 py-0.5 text-xs font-medium text-green-500 bg-green-500/10">Aktif</span>
                                                </option>
                                                <option value="2">
                                                    <span
                                                        class="inline-flex overflow-hidden rounded-md border border-red-500 px-1 py-0.5 text-xs font-medium text-red-500 bg-red-500/10">Nonaktif</span>
                                                </option>
                                                @else
                                                <option value="1">
                                                    <span
                                                        class="inline-flex overflow-hidden rounded-md border border-green-500 px-1 py-0.5 text-xs font-medium text-green-500 bg-green-500/10">Aktif</span>
                                                </option>
                                                <option value="2" selected="selected">
                                                    <span
                                                        class="inline-flex overflow-hidden rounded-md border border-red-500 px-1 py-0.5 text-xs font-medium text-red-500 bg-red-500/10">Nonaktif</span>
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    {{-- @if($itemCuti->status == 1)
                                    <td class="p-4"><span
                                            class="inline-flex overflow-hidden rounded-md border border-green-500 px-1 py-0.5 text-xs font-medium text-green-500 bg-green-500/10">Aktif</span>
                                    </td>
                                    @else
                                    <td class="p-4">
                                        <span
                                            class="inline-flex overflow-hidden rounded-md border border-red-500 px-1 py-0.5 text-xs font-medium text-red-500 bg-red-500/10">Canceled</span>
                                    </td>
                                    @endif --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- @foreach ($kategoriCuti as $namaCuti)
                    <div class="flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm">{{ $namaCuti->jenis_cuti }}</label>
                        <input id="textInputDefault" type="number"
                            class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                            name="name" placeholder="" autocomplete="name" />
                    </div>
                    @endforeach --}}
                    {{--
                </form> --}}
            </div>

        </div>
    </div>

</div>

@endsection