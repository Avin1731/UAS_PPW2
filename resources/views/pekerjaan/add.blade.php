@extends('base')
@section('title','Tambah Pekerjaan')
@section('menupekerjaan', 'underline decoration-4 underline-offset-7')
@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Tambah Pekerjaan</h1>
        <div class="mx-auto max-w-screen-xl">
            <form action="{{ route('pekerjaan.store') }}" method="POST" class="space-y-4 save-form" autocomplete="off">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                    <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required placeholder="Contoh: Staff IT">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required placeholder="Deskripsi pekerjaan..."></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ route('pekerjaan.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer text-center">Batal</a>
                    <button type="submit" class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </section>

    @include('components.notification')
@endsection