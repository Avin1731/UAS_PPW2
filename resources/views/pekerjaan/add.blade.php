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
                    <input type="text" name="nama" value="{{ old('nama') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required placeholder="Contoh: Staff IT">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required placeholder="Deskripsi pekerjaan...">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Keamanan</label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="captcha-img-container rounded overflow-hidden shadow-sm border border-gray-300 bg-white flex items-center justify-center min-w-[150px]">
                            {!! captcha_img('flat') !!}
                        </div>
                        
                        <button type="button" class="btn-refresh-captcha px-3 py-2 text-sm font-medium text-blue-600 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300">
                            Refresh
                        </button>
                        
                        <input type="text" name="captcha" class="flex-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" required placeholder="Masukkan kode captcha...">
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ route('pekerjaan.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer text-center">Batal</a>
                    <button type="submit" class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </section>

    @include('components.notification')

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const btnRefresh = document.querySelector('.btn-refresh-captcha');
            btnRefresh.addEventListener('click', function(){
                fetch('/captcha/flat')
                    .then(response => response.blob())
                    .then(blob => {
                       const imgContainer = document.querySelector('.captcha-img-container');
                       const timestamp = new Date().getTime();
                       imgContainer.innerHTML = '<img src="/captcha/flat?'+timestamp+'" />';
                    });
            });
        });
    </script>
@endsection