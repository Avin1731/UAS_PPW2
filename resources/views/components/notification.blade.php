<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Backdrop Blur */
    div.swal2-container {
        backdrop-filter: blur(6px) !important;
        background-color: rgba(0, 0, 0, 0.6) !important;
    }
    /* Shadow Card */
    div.swal2-popup {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
        border-radius: 1rem !important;
    }
</style>

<script>
    const baseConfig = {
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonColor: '#10B981',
        cancelButtonColor: '#EF4444',
        showClass: { popup: 'animate__animated animate__fadeInDown animate__faster' },
        hideClass: { popup: 'animate__animated animate__fadeOutUp animate__faster' }
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

    // 2. ERROR
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

                const formData = new FormData(form);
                let recapHtml = '';
                
                // --- CASE 1: FORM PEGAWAI
                if (formData.has('email')) {
                    const nama = formData.get('nama');
                    const email = formData.get('email');
                    
                    // Ambil Text dari Select Option
                    const selectPekerjaan = form.querySelector('select[name="pekerjaan_id"]');
                    const namaPekerjaan = selectPekerjaan ? selectPekerjaan.options[selectPekerjaan.selectedIndex].text : '-';

                    // Gender Translate
                    const genderVal = formData.get('gender');
                    const gender = genderVal === 'male' ? 'Laki-laki' : (genderVal === 'female' ? 'Perempuan' : '-');

                    // Status
                    const isActive = formData.get('is_active') ? 'Aktif' : 'Non-Aktif';
                    const statusClass = formData.get('is_active') ? 'text-green-600' : 'text-red-600';

                    recapHtml = `
                        <div class="text-left bg-gray-50 p-4 rounded-md border border-gray-200 text-sm shadow-sm space-y-2">
                            <div class="grid grid-cols-3 gap-2">
                                <span class="font-bold text-gray-700">Nama:</span>
                                <span class="col-span-2 text-gray-900">${nama}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="font-bold text-gray-700">Email:</span>
                                <span class="col-span-2 text-gray-900">${email}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="font-bold text-gray-700">Pekerjaan:</span>
                                <span class="col-span-2 text-gray-900">${namaPekerjaan}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="font-bold text-gray-700">Gender:</span>
                                <span class="col-span-2 text-gray-900">${gender}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="font-bold text-gray-700">Status:</span>
                                <span class="col-span-2 font-bold ${statusClass}">${isActive}</span>
                            </div>
                        </div>
                    `;
                } 
                // --- CASE 2: FORM PEKERJAAN
                else if (formData.has('deskripsi')) {
                    const nama = formData.get('nama');
                    const deskripsi = formData.get('deskripsi');
                    
                    recapHtml = `
                        <div class="text-left bg-gray-50 p-4 rounded-md border border-gray-200 text-sm shadow-sm space-y-2">
                            <div>
                                <span class="block font-bold text-gray-700">Nama Pekerjaan:</span>
                                <span class="text-gray-900">${nama}</span>
                            </div>
                            <div>
                                <span class="block font-bold text-gray-700">Deskripsi:</span>
                                <span class="text-gray-900 italic">"${deskripsi}"</span>
                            </div>
                        </div>
                    `;
                }

                Swal.fire({
                    ...baseConfig,
                    title: 'CEK DATA KEMBALI',
                    html: recapHtml + '<p class="mt-3 text-sm text-gray-500 text-center">Pastikan data di atas sudah benar.</p>',
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