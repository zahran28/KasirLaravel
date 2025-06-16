<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    <div
        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 p-4 pt-2 px-[5%] py-10">
        @foreach ($metode as $item)
            <form action="{{ route('pilih', $code) }}" method="post" class="payment-form">
                @csrf

                <input type="hidden" value="{{ $item->LinkTujuan }}" name="Tujuan">

                <div
                    class="payment-logo-container cursor-pointer bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden p-4
                           flex items-center justify-center h-32 w-full transition-all duration-300 ease-in-out hover:shadow-lg hover:border-blue-400">
                    <img src="{{ $item->LinkLogo }}" alt="{{ $item->Nama }}"
                        class="max-h-full max-w-full object-contain mx-auto" style="object-fit: contain;">
                </div>
            </form>
        @endforeach
    </div>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const paymentContainers = document.querySelectorAll('.payment-logo-container');

                console.log('Jumlah kontainer pembayaran ditemukan:', paymentContainers.length);
                if (paymentContainers.length === 0) {
                    console.warn(
                        'Tidak ada elemen dengan kelas .payment-logo-container ditemukan. Pastikan HTML sudah dirender dengan benar.'
                        );
                }

                paymentContainers.forEach(container => {
                    container.addEventListener('click', function() {
                        console.log('Logo pembayaran diklik!');
                        const form = this.closest('form');
                        if (form) {
                            console.log('Form ditemukan, mencoba submit...');
                            form.submit();
                        } else {
                            console.error('ERROR: Form tidak ditemukan untuk container ini!');
                        }
                    });
                });
            });
        </script>
    @endpush


    @stack('scripts')

</body>

</html>
