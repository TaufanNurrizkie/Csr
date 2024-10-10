document.addEventListener('DOMContentLoaded', function () {
    const notificationIcon = document.getElementById('notification-icon');
    const notificationCount = document.getElementById('notification-count');
    const notificationModal = document.getElementById('notification-modal');
    const closeModalButton = document.getElementById('close-modal');
    const notificationList = document.getElementById('notification-list');

    // Ambil notifikasi dari backend menggunakan AJAX
    function fetchNotifications() {
        fetch('/notifications')
            .then(response => response.json())
            .then(data => {
                // Kosongkan daftar notifikasi
                notificationList.innerHTML = '';

                // Tampilkan jumlah notifikasi
                notificationCount.textContent = data.length;

                // Tampilkan notifikasi di dalam modal
                data.forEach(notification => {
                    const notificationItem = document.createElement('div');
                    notificationItem.classList.add('p-2', 'border', 'border-gray-200', 'rounded-md');
                    notificationItem.innerHTML = `
                        <p class="font-bold">${notification.title}</p>
                        <p>${notification.message}</p>
                        <small>${new Date(notification.created_at).toLocaleString()}</small>
                    `;
                    notificationList.appendChild(notificationItem);
                });
            });
    }

    // Ketika ikon notifikasi diklik
    notificationIcon.addEventListener('click', function () {
        notificationModal.classList.remove('hidden');
        fetchNotifications();
    });

    // Ketika tombol close di modal diklik
    closeModalButton.addEventListener('click', function () {
        notificationModal.classList.add('hidden');
    });
});
