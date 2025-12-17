@extends('base')
@section('title','Tambah Pegawai')
@section('menupegawai', 'underline decoration-4 underline-offset-7')

@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-8 text-center">Tambah Pegawai</h1>
        
        <div class="mx-auto max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg p-6 sm:p-8">
            <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-5 save-form" autocomplete="off">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required placeholder="Nama Pegawai">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required placeholder="email@contoh.com">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Pekerjaan</label>
                    <select name="pekerjaan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                    <div class="flex gap-6">
                        <div class="flex items-center">
                            <input type="radio" id="male" name="gender" value="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                            <label for="male" class="ml-2 text-sm font-medium text-gray-900">Laki-laki</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="female" name="gender" value="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                            <label for="female" class="ml-2 text-sm font-medium text-gray-900">Perempuan</label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="is_active" name="is_active" type="checkbox" value="1" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_active" class="ml-2 text-sm font-medium text-gray-900">Status Aktif</label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('pegawai.index') }}" class="rounded-md border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer">Batal</a>
                    <button type="submit" class="rounded-md bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 cursor-pointer shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </section>
    @include('components.notification')
@endsection