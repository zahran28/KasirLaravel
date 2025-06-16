<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />

    {{-- @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js']) --}}
    {{-- Jika Anda menggunakan Vite, uncomment baris di atas dan hapus CDN Tailwind di atas --}}
    {{-- Pastikan @vite('resources/css/app.css') hanya ada sekali jika Anda menggunakan Vite --}}

    <title>Profil Pengguna</title>
    <style>
        /* Custom styles for modals */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
        }

        .modal-content {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            transform: translateY(-20px);
            opacity: 0;
        }

        .modal-content.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* --- Custom styles for sticky header --- */
        /* Memberi padding pada body agar konten tidak tertutup header */
        body {
            padding-top: 80px; /* Sesuaikan ini dengan tinggi header Anda */
            /* Anda bisa menambahkan padding-bottom jika ada footer yang sticky juga */
        }

        /* Styles for the sticky header */
        .sticky-header {
            width: 100%;
            z-index: 50; /* Pastikan header di atas elemen lain */
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-start min-h-screen">
    <header class="bg-blue-600 text-white shadow-md fixed top-0 left-0 right-0 sticky-header">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img alt="Point of Sale logo, blue square with white POS text" class="w-10 h-10 rounded" height="40"
                    src="https://storage.googleapis.com/a1aa/image/0d303e75-897f-4f0e-05ae-cd2427336c44.jpg"
                    width="40" />
                <h1 class="text-2xl font-semibold">
                    Web Kasir
                </h1>
            </div>
            <nav class="hidden md:flex space-x-6 text-white text-lg font-medium">
                <a class="hover:underline" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                <a class="hover:underline" href="#">
                    Produk
                </a>
                <a class="hover:underline" href="#">
                    Transaksi
                </a>
                <a class="hover:underline" href="#">
                    Laporan
                </a>
                <a class="hover:underline" href="#">
                    Pengaturan
                </a>
            </nav>
            <button aria-label="Toggle menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-white"
                id="menu-btn">
                <i class="fas fa-bars text-2xl">
                </i>
            </button>
        </div>
        <nav class="md:hidden bg-blue-700 text-white px-4 py-2 space-y-2 hidden" id="mobile-menu">
            <a class="block py-1 hover:underline" href="#">
                Dashboard
            </a>
            <a class="block py-1 hover:underline" href="#">
                Produk
            </a>
            <a class="block py-1 hover:underline" href="#">
                Transaksi
            </a>
            <a class="block py-1 hover:underline" href="#">
                Laporan
            </a>
            <a class="block py-1 hover:underline" href="#">
                Pengaturan
            </a>
        </nav>
    </header>

    <main class="flex-grow flex items-center justify-center p-4 w-full">
        <div class="bg-white rounded-lg shadow-xl p-6 md:p-8 w-full max-w-2xl">
            <div class="flex items-center mb-8">
                <div class="w-24 h-24 rounded-full bg-gray-300 mr-4 flex-shrink-0">
                    {{-- Anda bisa menampilkan gambar dari database di sini, misalnya: --}}
                    <img src="data:image/jpeg;base64,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"
                        alt="Foto Profil" class="w-full h-full object-cover rounded-full">
                    {{-- Atau gunakan placeholder jika tidak ada gambar: --}}
                    {{-- <div class="w-full h-full rounded-full flex items-center justify-center text-gray-500">
                    <svg class="w-12 h-12 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm0 3a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 14c-2.09 0-3.9.86-5 2.08A8.08 8.08 0 0 1 7 17a6 6 0 0 1 10 0 8.08 8.08 0 0 1 0 2.08c-1.1-.94-2.91-1.8-5-1.8z"/></svg>
                </div> --}}
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>

            <hr class="my-8 border-t border-gray-200">

            <div class="flex flex-col md:flex-row md:space-x-4">
                <button id="openUpdateProfileModal"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 w-full md:w-1/2 mb-4 md:mb-0">
                    Perbarui Profil
                </button>
                <button id="openChangePasswordModal"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75 w-full md:w-1/2">
                    Ganti Password
                </button>
            </div>

            <hr class="my-8 border-t border-gray-200">

            <div class="text-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-5 rounded-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Modal Perbarui Informasi Profil --}}
        <div id="updateProfileModal"
            class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 modal-overlay">
            <div class="bg-white rounded-lg shadow-2xl p-6 md:p-8 w-full max-w-md modal-content">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Perbarui Informasi Profil</h2>
                <form action="{{ route('update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                            Simpan
                        </button>
                        <button type="button" id="closeUpdateProfileModal"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Ganti Password --}}
        <div id="changePasswordModal"
            class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 modal-overlay">
            <div class="bg-white rounded-lg shadow-2xl p-6 md:p-8 w-full max-w-md modal-content">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Ganti Password</h2>
                <form action="{{ route('update-password') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Password
                            Lama:</label>
                        <input type="password" id="current_password" name="current_password" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('current_password') border-red-500 @enderror">
                        @error('current_password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">Password
                            Baru:</label>
                        <input type="password" id="new_password" name="new_password" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('new_password') border-red-500 @enderror">
                        @error('new_password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="new_password_confirmation"
                            class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi
                            Password Baru:</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('new_password_confirmation') border-red-500 @enderror">
                        @error('new_password_confirmation')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                            Ganti Password
                        </button>
                        <button type="button" id="closeChangePasswordModal"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Mobile Menu Toggle
        document.getElementById('menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Modal Logic
        const updateProfileModal = document.getElementById('updateProfileModal');
        const changePasswordModal = document.getElementById('changePasswordModal');
        const openUpdateProfileModalBtn = document.getElementById('openUpdateProfileModal');
        const openChangePasswordModalBtn = document.getElementById('openChangePasswordModal');
        const closeUpdateProfileModalBtn = document.getElementById('closeUpdateProfileModal');
        const closeChangePasswordModalBtn = document.getElementById('closeChangePasswordModal');

        function openModal(modal) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('.modal-content').classList.add('show');
            }, 50);
        }

        function closeModal(modal) {
            modal.querySelector('.modal-content').classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        openUpdateProfileModalBtn.addEventListener('click', () => openModal(updateProfileModal));
        openChangePasswordModalBtn.addEventListener('click', () => openModal(changePasswordModal));
        closeUpdateProfileModalBtn.addEventListener('click', () => closeModal(updateProfileModal));
        closeChangePasswordModalBtn.addEventListener('click', () => closeModal(changePasswordModal));

        updateProfileModal.addEventListener('click', (e) => {
            if (e.target === updateProfileModal) {
                closeModal(updateProfileModal);
            }
        });
        changePasswordModal.addEventListener('click', (e) => {
            if (e.target === changePasswordModal) {
                closeModal(changePasswordModal);
            }
        });

        @if ($errors->has('name') || $errors->has('email'))
            openModal(updateProfileModal);
        @endif

        @if ($errors->has('current_password') || $errors->has('new_password') || $errors->has('new_password_confirmation'))
            openModal(changePasswordModal);
        @endif
    </script>
</body>

</html>
