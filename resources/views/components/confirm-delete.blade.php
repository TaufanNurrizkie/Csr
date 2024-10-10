<div x-data="{ open: false }" @confirm-delete.window="
Swal.fire({
    title: 'Kamu yakin?',
    text: 'Sektor ini tidak dapat dikembalikan setelah dihapus!', // Mengganti teks ke bahasa Indonesia
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!'
}).then((result) => {
    if (result.isConfirmed) {
        // Panggil metode delete dari Livewire
        @this.delete();

        Swal.fire({
            title: 'Dihapus!',
            text: 'Sektor telah berhasil dihapus.',
            icon: 'success'
        });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
            title: 'Dibatalkan',
            text: 'Sektor kamu aman :)',
            icon: 'error'
        });
    }
});

">
    <!-- Konten lainnya di sini -->
</div>
