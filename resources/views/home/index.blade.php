<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dasboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <header class="bg-blue-600 text-white shadow-md">
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
                <a class="hover:underline" href="#">
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
                <a class="hover:underline" href="">
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
                Logout
            </a>
        </nav>
    </header>
    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-xl p-6">
                <p class="text-gray-500">Penjualan Hari Ini</p>
                <p class="text-2xl font-bold text-blue-600">{{ $customerHariIni }}</p>
            </div>
            <div class="bg-white shadow-md rounded-xl p-6">
                <p class="text-gray-500">Total Customer</p>
                <p class="text-2xl font-bold text-green-600">{{ $totalCustomer }}</p>
            </div>
            <div class="bg-white shadow-md rounded-xl p-6">
                <p class="text-gray-500">Pendapatan Hari Ini</p>
                <p class="text-2xl font-bold text-yellow-600">Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                </p>
            </div>
        </div>


        <button id="openModalBtn"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
            Buat Pesanan
        </button>

        <a href="{{ route('ViewTambah') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
                Update Produk
            </button>
        </a>
        <a href="{{ route('Metode') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
                metode pembayaran
            </button>
        </a>
        <a href="{{ route('show') }}">
           <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
               Analisis Menu
           </button>
       </a>
        <a href="{{ route('show') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
                Profile
            </button>
        </a>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Konfirmasi Pesanan</h3>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>

                <!-- Form Pesanan -->
                <form action="{{ route('buat_pesanan') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                        <input type="text" id="nama" name="name" class="mt-2 p-2 w-full border rounded-md">
                    </div>

                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow w-full">
                        Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- JavaScript untuk Menampilkan dan Menyembunyikan Modal -->
        <script>
            const openModalBtn = document.getElementById("openModalBtn");
            const modal = document.getElementById("modal");
            const closeModalBtn = document.getElementById("closeModalBtn");

            openModalBtn.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });

            closeModalBtn.addEventListener("click", () => {
                modal.classList.add("hidden");
            });

            // Menutup modal jika klik di luar modal
            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        </script>

</body>

</html>
