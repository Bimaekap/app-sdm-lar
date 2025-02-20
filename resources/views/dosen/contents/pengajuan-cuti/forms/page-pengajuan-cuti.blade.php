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




<div class="container">

</div>
@endsection