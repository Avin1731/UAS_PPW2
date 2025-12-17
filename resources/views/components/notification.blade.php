<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Membuat background belakang menjadi blur */
    div.swal2-container {
        backdrop-filter: blur(6px) !important;
        background-color: rgba(0, 0, 0, 0.6) !important;
    }
    /* Bayangan card (Shadow) */
    div.swal2-popup {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
        border-radius: 1rem !important;
    }
</style>

<script>
    // Config dasar agar style konsisten
    const baseConfig = {
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonColor: '#10B981',
        cancelButtonColor: '#EF4444',
        // Animasi muncul
        showClass: {
            popup: 'animate__animated animate__fadeInDown animate__faster'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp animate__faster'
        }
    };

    // 1. SUKSES
    @if(session('success'))
        Swal.fire({
            ...baseConfig,
            icon: 'success',
            title: 'BERHASIL',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK, Lanjutkan',
        });
    @endif

    // 2. ERROR / VALIDASI
    @if(session('errors') || $errors->any())
        Swal.fire({
            ...baseConfig,
            icon: 'error',
            title: 'GAGAL MENYIMPAN',
            html: '<ul style="text-align: left; margin-left: 1rem;">' +
                  @foreach($errors->all() as $error) '<li>{{ $error }}</li>' + @endforeach
                  '</ul>',
            confirmButtonText: 'Saya Perbaiki',
            confirmButtonColor: '#d33', 
        });
    @endif

    document.addEventListener('DOMContentLoaded', () => {
        
        // 3. LOGIC HAPUS
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    ...baseConfig,
                    title: 'ANDA YAKIN?',
                    text: "Data yang dihapus tidak dapat dikembalikan lagi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({ title: 'Menghapus...', didOpen: () => Swal.showLoading() });
                        form.submit();
                    }
                });
            });
        });

        // 4. LOGIC SIMPAN & UPDATE
        document.querySelectorAll('.save-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                // Ambil data dari inputan user
                const formData = new FormData(form);
                const nama = formData.get('nama');
                const deskripsi = formData.get('deskripsi');

                // Tampilan Recap
                const recapHtml = `
                    <div class="text-left bg-gray-50 p-4 rounded-md border border-gray-200 text-sm shadow-sm">
                        <div class="mb-2">
                            <span class="block font-bold text-gray-700">Nama Pekerjaan:</span>
                            <span class="text-gray-900">${nama}</span>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-700">Deskripsi:</span>
                            <span class="text-gray-900">${deskripsi}</span>
                        </div>
                    </div>
                    <p class="mt-3 text-sm text-gray-500">Pastikan data di atas sudah benar.</p>
                `;

                Swal.fire({
                    ...baseConfig,
                    title: 'CEK DATA KEMBALI',
                    html: recapHtml,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Edit Lagi',
                    confirmButtonColor: '#F59E0B',
                    cancelButtonColor: '#3085d6',
                    reverseButtons: true,
                    width: '500px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({ title: 'Menyimpan...', didOpen: () => Swal.showLoading() });
                        form.submit();
                    }
                });
            });
        });

    });
</script>