@extends('layouts.app')
@section('title', 'Format Cuti')
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
            <a href="#" class="hover:text-neutral-900 dark:hover:text-white">Format Cuti</a>
        </li>
    </ol>
</nav>

{{-- #TODO: Lanjutkan pengembangan widget cuti --}}
<div class="container mt-5 ml-5 p-3 bg-neutral-900 text-white border-transparent w-80 border rounded-lg">
    <div class="flex justify-between">
        <h1 class="text-base">Format Cuti</h1>
        <div x-data="{
            open: false,
            get isOpen() { return this.open },
            toggle() { this.open = ! this.open },
        }" x-on:keydown.esc.window="open = false" class="flex gap-10">
            <button class="hover:duration-300 hover:bg-gray-800 p-1 700 rounded-lg self-center" @click="toggle()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </button>
            <div x-cloak x-show="isOpen" class="rounded-xl h-fit w-fit p-2 bg-neutral-800 w-48 ml-9 absolute"
                x-on:click.outside="open = false" x-on:keydown.down.prevent="$focus.wrap().next()"
                x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="open">
                <ul>
                    <li class="text-sm">
                        <a href="{{ route('form.ubah.cuti') }}"
                            class="hover:duration-300 hover:bg-gray-500 rounded-lg p-1 ">Ubah data</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <ul class="m-3">
            <div class="mt-5 flex justify-between bg-widget-1 p-2 rounded-lg">
                <li class="text-sm text-neutral-800 font-medium text-white ">Cuti Tahunan</li>
                {{-- #TODO: Perbaiki pengambilan data query ke database menggunakan chunk --}}
                <div class="font-semibold  text-black  justify-end bg-gray-300 px-5 rounded-xl self-center">
                    {{-- @if($kategoriCuti[0]->jenis_cuti == 'cuti-tahunan') --}}
                    <p class="text-sm">{{ $kategoriCuti[0]->jumlah_cuti }}</p>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="flex mt-1 justify-between p-2 bg-widget-2 rounded-lg ">
                <li class="text-sm font-medium pt-1 ">Cuti Sakit</li>
                <div class="text-black font-semibold bg-gray-300 px-5 rounded-xl self-center ">
                    {{-- @if($kategoriCuti->jenis_cuti == 'cuti-sakit') --}}
                    <p class="text-sm">{{ $kategoriCuti[1]->jumlah_cuti }}</p>
                    {{-- @endif --}}
                </div>

            </div>
            <div class="flex mt-1 justify-between p-2 bg-widget-3 rounded-lg">
                <li class="text-sm font-medium pt-1">Cuti Melahirkan</li>
                <div class="text-black font-semibold bg-gray-300 px-5 rounded-xl self-center  ">
                    {{-- @if($kategoriCuti->jenis_cuti == 'cuti-melahirkan') --}}
                    <p class="text-sm">{{ $kategoriCuti[2]->jumlah_cuti }}</p>
                    {{-- @endif --}}
                </div>

            </div>
            <div class="flex justify-between p-2">
                <li class="text-sm pt-1">Lihat Selanjutnya</li>
                <div class="font-semibold bg-gray-300 px-5 rounded-xl self-center ">
                    <p class="text-sm">lihat</p>

                </div>

            </div>
        </ul>
    </div>
</div>

{{-- #NOTE: Tabel --}}
<div class="container mt-5">
    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
        <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
            <thead
                class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">User</th>
                    <th scope="col" class="p-4">Role</th>
                    <th scope="col" class="p-4">Status</th>
                    <th scope="col" class="p-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @foreach ($users as $user)
                @foreach ($user as $item)

                <tr>
                    <td class="p-4">
                        <div class="flex w-max items-center gap-2">
                            <img class="size-10 rounded-full object-cover"
                                src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp"
                                alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-white">{{ dd($item
                                    ) }}</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-neutral-300">{{
                                    $user->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">{{ $user->role }}</td>
                    <td class="p-4"><span
                            class="inline-flex overflow-hidden rounded -md border border-green-500 px-1 py-0.5 text-xs font-medium text-green-500 bg-green-500/10">Active</span>
                    </td>

                    {{-- Modal --}}
                    {{-- #TODO: looping data cuti view di dalam modal berdasarkan user id --}}
                    <td class="p-4">
                        <div x-data="{modalIsOpen: false}">
                            <button @click="modalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
                                focus-visible:outline-black active:opacity-100 active:outline-offset-0
                                 dark:bg-white dark:text-black dark:focus-visible:outline-white">View</button>
                            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms
                                x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false"
                                @click.self="modalIsOpen = false"
                                class="fixed inset-0 z-30 flex w-full items-end justify-end bg-black/20 p-4 pb-8 lg:p-8"
                                role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                <!-- Modal Dialog -->
                                <div x-show="modalIsOpen"
                                    x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                    x-transition:enter-start="opacity-0 scale-50"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                                    <!-- Dialog Header -->
                                    <div
                                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                                        <h3 id="defaultModalTitle"
                                            class="font-semibold tracking-wide text-neutral-900 dark:text-white">Special
                                            Offer</h3>
                                        <button @click="modalIsOpen = false" aria-label="close modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Dialog Body -->
                                    <form action="{{ route('show.cuti.user',$user->id) }}" method="GET">
                                        @csrf
                                        @method('get')
                                        <div class="px-4 py-8">
                                            <ul>
                                                <li>

                                                    {{ $user->role}}
                                                </li>
                                                <li>

                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                    <!-- Dialog Footer -->
                                    <div
                                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                                        <button @click="modalIsOpen = false" type="button"
                                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind
                                            me later</button>
                                        <button @click="modalIsOpen = false" type="button"
                                            class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Upgrade
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endforeach

            </tbody>
        </table>
    </div>

</div>


@endsection