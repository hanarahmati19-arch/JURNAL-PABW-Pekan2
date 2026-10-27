@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
    <h1 class="mb-6 text-2xl font-semibold text-gray-900 dark:text-gray-100">Profil Petugas</h1>
    <dl class="divide-y divide-gray-200 rounded-md bg-white px-6 shadow-sm dark:divide-gray-700 dark:bg-gray-800">
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-600 dark:text-gray-300">Nama</dt>
            <dd class="mt-1 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-600 dark:text-gray-300">Email</dt>
            <dd class="mt-1 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-600 dark:text-gray-300">Akun dibuat</dt>
            <dd class="mt-1 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
        </div>
    </dl>
</div>
@endsection
