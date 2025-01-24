@extends('layouts.app')
@section('title', 'Users Management')
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
            <a href="#" class="hover:text-neutral-900 dark:hover:text-white">Users Management</a>

        </li>
    </ol>
</nav>

{{-- card --}}
<div class="container mt-5">
    <h1 class="text-gray-300 text-2xl font-semibold"> Users Management</h1>
    <span class="text-gray-500 mt-5">Pengaturan Management Semua Users</span>
</div>

{{-- #README : https://datatables.net/manual/installation --}}

<div class="container mt-5">
    <div class="grid grid-cols-2">
        <div class="">
            <h1 class="text-white font-bold text-2xl pt-4 mb-5">All Users {{ count($users) }}</h1>
        </div>
        <div class="">
            <div class=" flex items-center flex-row gap-4 justify-end">
                <!-- search  -->
                <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                        stroke-width="2"
                        class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input type="search" id="search-input-users"
                        class=" w-full border border-neutral-300 rounded-md bg-white px-2 py-1.5 pl-9 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-950/50 dark:focus-visible:outline-white"
                        name="search" aria-label="Search" placeholder="Search" />
                </div>

                {{-- button tambah users --}}
                {{-- ! Modal Users --}}
                <div x-data="{modalIsOpen: false}">
                    <button @click="modalIsOpen = true" type="button"
                        class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Add
                        User</button>
                    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms
                        x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false"
                        @click.self="modalIsOpen = false"
                        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
                        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                        <!-- Modal Dialog -->
                        <div x-show="modalIsOpen"
                            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                            x-transition:enter-start="opacity-0 -translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                            <!-- Dialog Header -->
                            <div
                                class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-stone-950/20">
                                <h3 id="defaultModalTitle"
                                    class="font-semibold tracking-wide text-neutral-900 dark:text-white">Add User
                                </h3>
                                <button @click="modalIsOpen = false" aria-label="close modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                        stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Dialog Body -->
                            <div class="px-4 py-8 " aria-hidden="true">

                                <form action="{{ route('create.user') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="grid grid-cols-2 gap-4">

                                        {{-- username --}}
                                        <div
                                            class="col-span-2  mr-5 w-full max-w-xs  gap-1 text-neutral-600 dark:text-neutral-300">
                                            <input id="textInputDefault" type="text"
                                                class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                                name="name" placeholder="Enter Name " autocomplete="name" />
                                        </div>

                                        {{-- Email --}}

                                        <div
                                            class="col-span-2   w-full max-w-xs gap-1 text-neutral-600 dark:text-neutral-300">
                                            <input id="textInputDefault" type="email"
                                                class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                                name="email" placeholder="Enter email" autocomplete="email" />
                                        </div>

                                        {{-- Password --}}
                                        <div class="w-full max-w-xs  gap-1 text-neutral-600 dark:text-neutral-300">
                                            <div x-data="{ showPassword: false }" class="relative">
                                                <input :type="showPassword ? 'text' : 'password'" id="passwordInput"
                                                    class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                                    name="password" autocomplete="current-password"
                                                    placeholder="Enter your password" />
                                                <button type="button" @click="showPassword = !showPassword"
                                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-neutral-600 dark:text-neutral-300"
                                                    aria-label="Show password">
                                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" aria-hidden="true" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" aria-hidden="true" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Select Role --}}
                                        <div
                                            class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                            {{-- <label for="os" class="w-fit pl-0.5 text-sm">Role</label> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="absolute pointer-events-none right-4 top-2 h-5 w-5">
                                                <path fill-rule="evenodd"
                                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <select id="role" name="role" required
                                                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                                <option selected>Pilih Role</option>
                                                <option value="superadmin">superadmin</option>
                                                <option value="admin">admin</option>
                                                <option value="dosen">dosen</option>
                                                <option value="staff">staff</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div
                                        class="mt-5 flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4  dark:bg-stone-900/20 sm:flex-row sm:items-center md:justify-end">
                                        {{-- <button @click="modalIsOpen = false" type="button"
                                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind
                                            me later</button> --}}
                                        <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md 
                                            bg-stone-950 px-4 py-2 text-sm font-medium tracking-wide
                                             text-neutral-300 transition hover:opacity-75 text-center 
                                             focus-visible:outline focus-visible:outline-2
                                              focus-visible:outline-offset-2 focus-visible:outline-stone-950 active:opacity-100 active:outline-offset-0
                                               disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:text-neutral-600 
                                               dark:focus-visible:outline-white">Save</button>
                                    </div>
                                    {{-- js --}}
                                </form>
                            </div>
                            <!-- Dialog Footer -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div x-data="{ checkAll : false }"
        class="overflow-hidden w-full overflow-x-auto rounded-md  border-neutral-300 dark:border-neutral-700">

        {{-- Table --}}
        <table id="users-table" class="display nowrap w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
            <thead
                class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-black dark:text-white">
                <tr>
                    <th scope="col" class="p-4">
                        <label for="checkAll"
                            class="flex items-center cursor-pointer text-neutral-600 dark:text-neutral-300 ">
                            <div class="relative flex items-center">
                                <input type="checkbox" x-model="checkAll" id="checkAll"
                                    class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-neutral-300 bg-white before:absolute before:inset-0 checked:border-black checked:before:bg-black focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-neutral-800 checked:focus:outline-black active:outline-offset-0 dark:border-neutral-700 dark:bg-neutral-900 dark:checked:border-white dark:checked:before:bg-white dark:focus:outline-neutral-300 dark:checked:focus:outline-white" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="4"
                                    class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-neutral-100 peer-checked:visible dark:text-black">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                        </label>
                    </th>
                    <th scope="col" class="p-4">User Name</th>
                    <th scope="col" class="p-4">Role</th>
                    <th scope="col" class="p-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @forelse ($users as $user)
                <tr>
                    <td class="p-4">
                        <label for="user2335"
                            class="flex items-center cursor-pointer text-neutral-600 dark:text-neutral-300 ">
                            <div class="relative flex items-center">
                                <input type="checkbox" id="user2335"
                                    class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-neutral-300 bg-white before:absolute before:inset-0 checked:border-black checked:before:bg-black focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-neutral-800 checked:focus:outline-black active:outline-offset-0 dark:border-neutral-700 dark:bg-neutral-900 dark:checked:border-white dark:checked:before:bg-white dark:focus:outline-neutral-300 dark:checked:focus:outline-white"
                                    :checked="checkAll" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="4"
                                    class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-neutral-100 peer-checked:visible dark:text-black">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                        </label>
                    </td>

                    <td class="p-4">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold text-neutral-900 dark:text-white">{{ $user->name
                                }}</span>
                            <span class="w-32 overflow-hidden text-ellipsis text-xs md:w-36" aria-hidden="true">{{
                                $user->email }}</span>
                        </div>
                    </td>
                    <td class="p-4">
                        {{ $user->role }}
                    </td>
                    <td class="p-4"><button type="button"
                            class="cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-black outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-white dark:outline-white">Edit</button>
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
    {{-- #README: https://www.penguinui.com/components/paginations --}}
    {{-- #TODO: buat pagination untuk semua data users --}}
</div>
@if(Session::has('messages'))
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
            <p class="text-xs font-medium sm:text-sm">{{ Session::get('messages') }}</p>
        </div>
        <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endif
@endsection