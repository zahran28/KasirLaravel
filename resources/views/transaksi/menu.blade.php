<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        input[type=number] {
            appearance: none;
            -moz-appearance: textfield;
        }
    </style>

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
    <main class="pt-2">
        @if (session('error'))
            <div id="alert-error"
                class="fixed top-5 right-5 bg-red-500 text-white px-5 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in z-50"
                role="alert">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856C18.07 20.662 19 19.388 19 18V6c0-1.388-.93-2.662-2.071-2.938H6.071C4.93 3.338 4 4.612 4 6v12c0 1.388.93 2.662 2.071 2.938z" />
                </svg>
                <span class="flex-1">{{ session('error') }}</span>
                <button onclick="document.getElementById('alert-error').remove()"
                    class="text-white hover:text-gray-200">
                    &times;
                </button>
            </div>
            <script>
                // Auto close after 3 detik
                setTimeout(() => {
                    const alert = document.getElementById('alert-error');
                    if (alert) {
                        alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif
        @if (session('success'))
            <div id="alert-success"
                class="fixed top-5 right-5 bg-green-500 text-white px-5 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in z-50"
                role="alert">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2l4 -4M12 22C6.48 22 2 17.52 2 12S6.48 2 12 2s10 4.48 10 10s-4.48 10 -10 10z" />
                </svg>
                <span class="flex-1">{{ session('success') }}</span>
                <button onclick="document.getElementById('alert-success').remove()"
                    class="text-white hover:text-gray-200">
                    &times;
                </button>
            </div>

            <script>
                setTimeout(() => {
                    const alert = document.getElementById('alert-success');
                    if (alert) {
                        alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <div class="px-[5%] py-10">
            <form id="form-pesanan" action="{{ route('tambah_menu') }}" method="POST">
                @csrf
                <input type="hidden" name="id_transaksi" value="{{ $code }}">

               <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
                    @foreach ($menus as $menu)
                        <div
                            class="bg-white rounded-xl shadow-lg p-5 border hover:shadow-xl transition-all duration-200 w-full">

                            <div class="relative">
                                @if ($menu->stok == 0)
                                    <div
                                        class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow-lg z-10">
                                        Stok Habis
                                    </div>
                                @endif

                                <img src="{{ $menu->link ?? 'https://via.placeholder.com/150' }}"
                                    alt="{{ $menu->nama_makanan }}" class="w-full h-48 object-cover rounded-lg mb-3" />
                            </div>

                            <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $menu->nama_makanan }}</h2>
                            <p class="text-sm text-gray-500 mb-2">{{ $menu->deskripsi }}</p>

                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-green-600 font-medium">Stok: {{ $menu->stok }}</span>
                                <span class="text-blue-600 font-bold">Rp {{ number_format($menu->harga) }}</span>
                            </div>

                            <input type="hidden" name="id_makanan[]" value="{{ $menu->id_makanan }}">

                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah:</label>
                            <div class="flex items-center gap-2">
                                <button type="button"
                                    class="btn-decrement bg-gray-300 px-3 py-1 rounded disabled:opacity-50"
                                    onclick="decrement(this)" {{ $menu->stok == 0 ? 'disabled' : '' }}>-</button>
                                <input type="number" name="jumlah[]" min="0" max="{{ $menu->stok }}"
                                    value="0" class="w-16 text-center border-gray-300 rounded px-2 py-1"
                                    readonly>
                                <button type="button"
                                    class="btn-increment bg-gray-300 px-3 py-1 rounded disabled:opacity-50"
                                    onclick="increment(this)" {{ $menu->stok == 0 ? 'disabled' : '' }}>+</button>
                            </div>

                            <label for="catatan-{{ $menu->id }}"
                                class="block text-sm font-medium text-gray-700 mt-3 mb-1">Catatan:</label>
                            <textarea id="catatan-{{ $menu->id }}" name="catatan[]" rows="2"
                                placeholder="Tambahkan catatan (opsional)..."
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-y transition duration-200"></textarea>
                        </div>
                    @endforeach
                </div>
            </form>


        </div>

    </main>


    <div class="fixed bottom-6 right-6 flex gap-4 z-50">
        <button type="submit" form="form-pesanan"
            class="bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-3 px-6 rounded-full shadow-lg">
            ✅ Submit Pesanan
        </button>


    </div>



    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        function updateButtons(input) {
            const min = parseInt(input.min) || 0;
            const max = parseInt(input.max) || 0;
            const val = parseInt(input.value) || 0;
            const container = input.parentElement;
            const btnDec = container.querySelector('.btn-decrement');
            const btnInc = container.querySelector('.btn-increment');

            if (max === 0) {
                // Kalau stok 0, tombol semua disable
                btnDec.disabled = true;
                btnInc.disabled = true;
            } else {
                btnDec.disabled = val <= min;
                btnInc.disabled = val >= max;
            }
        }

        function increment(button) {
            const input = button.previousElementSibling;
            const max = parseInt(input.max) || 0;
            let val = parseInt(input.value) || 0;
            if (val < max) {
                input.value = val + 1;
                updateButtons(input);
            }
        }

        function decrement(button) {
            const input = button.nextElementSibling;
            const min = parseInt(input.min) || 0;
            let val = parseInt(input.value) || 0;
            if (val > min) {
                input.value = val - 1;
                updateButtons(input);
            }
        }

        // Saat halaman load, cek tombol yg harus disable
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[name="jumlah[]"]').forEach(input => {
                updateButtons(input);
            });
        });

        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            }
        });

        function increment(button) {
            const input = button.parentElement.querySelector('input[name="jumlah[]"]');
            const max = parseInt(input.max);
            let value = parseInt(input.value);
            if (value < max) {
                input.value = value + 1;
                button.previousElementSibling.previousElementSibling.disabled = false;
            }
            if (parseInt(input.value) >= max) {
                button.disabled = true;
            }
        }

        function decrement(button) {
            const input = button.parentElement.querySelector('input[name="jumlah[]"]');
            let value = parseInt(input.value);
            if (value > 0) {
                input.value = value - 1;
                button.nextElementSibling.nextElementSibling.disabled = false;
            }
            if (parseInt(input.value) <= 0) {
                button.disabled = true;
            }
        }
    </script>

</body>

</html>
