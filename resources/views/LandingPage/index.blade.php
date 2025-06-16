<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Oiku Kasir - Aplikasi kasir online untuk mengelola bisnis Anda dengan mudah.">
    <meta name="author" content="TeamXcel">
    <title>KasirKu - Aplikasi KasirKu Online</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

    <style>
        /* Custom styles for specific tweaks */
        .swiper-container {
            position: relative;
            overflow: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
        }

        .swiper-next,
        .swiper-prev {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 24px;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 50%;
            z-index: 10;
        }

        .swiper-next {
            right: 10px;
        }

        .swiper-prev {
            left: 10px;
        }

        .site-preloader-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        .swiper-slide:not(.swiper-slide-active) {
            opacity: 0.6;
            transform: scale(0.8);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .swiper-slide-active {
            opacity: 1;
            transform: scale(1);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Preloader -->
    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div>

    <!-- Header Section -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/Logo_KasirKu.png') }}" alt="Oiku Kasir" class="h-12">
            </a>
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="#home" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="#feature" class="text-gray-700 hover:text-blue-600">Fitur</a>
                <a href="#screenshots" class="text-gray-700 hover:text-blue-600">Tampilan</a>
                <a href="#download" class="text-gray-700 hover:text-blue-600">Download</a>
                <a href="#blog" class="text-gray-700 hover:text-blue-600">Order Kasir</a>
                <a href="{{ route('dashboard') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sudah Punya App</a>
            </nav>
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-700 focus:outline-none" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow">
            <ul class="flex flex-col space-y-4 p-4">
                <li><a href="#home" class="text-gray-700 hover:text-blue-600">Home</a></li>
                <li><a href="#feature" class="text-gray-700 hover:text-blue-600">Fitur</a></li>
                <li><a href="#screenshots" class="text-gray-700 hover:text-blue-600">Tampilan</a></li>
                <li><a href="#download" class="text-gray-700 hover:text-blue-600">Download</a></li>
                <li><a href="#blog" class="text-gray-700 hover:text-blue-600">Order Kasir</a></li>
                <li><a href="{{ route('dashboard') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sudah Punya App</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Aplikasi Kasir Online</h1>
            <h2 class="text-2xl md:text-3xl font-semibold mb-6">Dengan Fitur Lengkap & Mudah Digunakan</h2>
            <p class="text-lg md:text-xl mb-8">Solusi terbaik untuk mengelola bisnis dan berbagai jenis usahamu, cukup
                dengan HP Android semua bisa dilakukan dengan mudah dan cepat!</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button onclick="validateDownloadCode('retail')"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-200">Versi Retail</button>
                <button onclick="validateDownloadCode('resto')"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-200">Versi Resto</button>
                <button onclick="validateDownloadCode('pro')"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-200">Versi Retail V 3.2.2</button>
                <button onclick="validateDownloadCode('respro')"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-200">Versi Resto V 3.2.1</button>
            </div>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="https://shopee.co.id"
                    target="_blank">
                    <img src="{{ asset('images/shopee.png') }}" alt="Shopee"
                        class="h-16 w-auto max-w-[140px] object-scale-down">
                </a>
                <a href="https://www.tokopedia.com" target="_blank">
                    <img src="{{ asset('images/tokopedia.png') }}" alt="Tokopedia"
                        class="h-16 w-auto max-w-[140px] object-scale-down">
                </a>
                <a href="https://www.tiktok.com" target="_blank">
                    <img src="{{ asset('images/tiktokshop.png') }}" alt="TikTok Shop"
                        class="h-16 w-auto max-w-[140px] object-scale-down">
                </a>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Mudah Digunakan</h3>
                    <p>Antarmuka intuitif yang memungkinkan Anda menguasai aplikasi dengan cepat tanpa kesulitan.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Efisiensi Bisnis</h3>
                    <p>Mendukung manajemen stok dan penjualan dengan efisien untuk berbagai jenis bisnis.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Laporan Lengkap</h3>
                    <p>Laporan bisnis terperinci untuk membantu Anda membuat keputusan yang lebih baik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog/Order Section -->
    <section id="blog" class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Cara Order</h2>
                <p class="text-lg mt-4">Aplikasi dan peralatan kasir tersedia di berbagai platform seperti
                    <b>Shopee</b>, <b>Tokopedia</b>, dan <b>TikTok Shop</b>.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="data:image/png;base64,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"
                        alt="Shopee" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><a
                                href="https://shopee.co.id/dyqiwibowo?categoryId=100644&entryPoint=ShopByPDP&itemId=10012513730"
                                class="hover:text-blue-600">Order via Shopee</a></h3>
                        <p class="text-gray-600 mb-4">Dapatkan aplikasi dan peralatan kasir untuk berbagai jenis bisnis
                            di Shopee. Optimalkan usaha Anda dengan KasirKu!</p>
                        <a href=""
                            class="text-blue-600 hover:underline">Order Kasir</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="data:image/jpeg;base64,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"
                        alt="Tokopedia" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><a href="https://www.tokopedia.com/dyqiart"
                                class="hover:text-blue-600">Order via Tokopedia</a></h3>
                        <p class="text-gray-600 mb-4">Temukan aplikasi kasir dan peralatan untuk toko, resto, dan
                            lainnya di Tokopedia.</p>
                        <a href="" class="text-blue-600 hover:underline">Order
                            Kasir</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="data:image/png;base64,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"
                        alt="TikTok Shop" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><a href="https://www.tiktok.com/@oikukasir"
                                class="hover:text-blue-600">Order via TikTok Shop</a></h3>
                        <p class="text-gray-600 mb-4">Dapatkan KasirKu dan peralatan untuk bisnis Anda di TikTok
                            Shop.</p>
                        <a href="" class="text-blue-600 hover:underline">Order
                            Kasir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Use Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="relative">
                        <img src="{{ asset('images/MockupWebKasirKu.jpg') }}" alt="Mockup Back" class="w-full">

                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-4">Bagaimana Cara Menggunakannya?</h2>
                    <p class="text-lg mb-6">Penggunaan aplikasi ini mudah dan intuitif. Mulai kelola bisnis Anda dengan
                        cepat!</p>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <svg class="w-8 h-8 text-blue-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                            </svg>
                            <div>
                                <h3 class="text-xl font-semibold">Buat Akun Baru</h3>
                                <p>Daftarkan toko dan akun owner, lalu ubah ke mode premium untuk nikmati semua fitur.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-8 h-8 text-blue-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <h3 class="text-xl font-semibold">Tambahkan Produk</h3>
                                <p>Tambahkan daftar produk dari toko Anda dan mulai jualan dengan mudah.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-8 h-8 text-blue-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="text-xl font-semibold">Pantau Laporan</h3>
                                <p>Pantau penjualan dan stok barang secara real-time dari mana saja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="feature" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Fitur Canggih</h2>
                <p class="text-lg mt-4">Aplikasi kasir kami dilengkapi fitur-fitur canggih untuk memudahkan pengelolaan
                    bisnis Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Powerfull System</h3>
                    <p>Sistem andal untuk mendukung operasional bisnis Anda.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m-4-4c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m6-4c0 1.1.9 2 2 2s2-.9 2-2-2-4-2-4m-6 4c0 1.1-.9 2-2 2s-2-.9-2-2 2-4 2-4">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Personalisasi</h3>
                    <p>Sesuaikan tampilan dan fitur sesuai kebutuhan bisnis Anda.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Kemudahan Akses</h3>
                    <p>Akses cepat ke semua fitur untuk efisiensi maksimal.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Efisiensi Waktu</h3>
                    <p>Monitor penjualan secara real-time dengan cepat.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a2 2 0 00-2-2h-3m-2 4H2v2a2 2 0 002 2h3m2-4H7v-2a2 2 0 012-2h3"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Analisis Toko</h3>
                    <p>penganalisisan Toko dengan cepat dan tepat.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow">
                    <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Pembaruan Berkala</h3>
                    <p>Dapatkan fitur terbaru dengan pembaruan rutin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshots Section -->
    <section id="screenshots" class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Tampilan Aplikasi</h2>
                <p class="text-lg mt-4">Antarmuka menarik dan mudah digunakan untuk pengalaman terbaik.</p>
            </div>
            <div class="swiper-container relative">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img src="{{ asset('images/Login.png') }}" alt="Screenshot 1"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/BuatNamaPesanan.png') }}" alt="Screenshot 2"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/TambahMenu.png') }}" alt="Screenshot 3"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/CrudMenu.png') }}" alt="Screenshot 4"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/EditPesanan.png') }}" alt="Screenshot 5"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/KonfirmasideletePesanan.png') }}" alt="Screenshot 6"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/TambahMenu (2).png') }}" alt="Screenshot 7"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/MetodePembayarabn.png') }}" alt="Screenshot 8"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/PerhitunganKasir.png') }}" alt="Screenshot 9"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/CetakStruk.png') }}" alt="Screenshot 10"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/profile.png') }}" alt="Screenshot 11"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('images/tampilanMenu.png') }}" alt="Screenshot 12"
                            class="w-full h-auto aspect-[18/9] md:aspect-[16/10] object-cover">
                    </div>


                </div>
                <div class="swiper-prev"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg></div>
                <div class="swiper-next"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg></div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Download KasirKu Sekarang!</h2>
                    <p class="text-lg mb-6">Optimalkan bisnis Anda dengan aplikasi KasirKu yang canggih dan mudah
                        digunakan!</p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="validateDownloadCode('retail')"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Versi Retail</button>
                        <button onclick="validateDownloadCode('resto')"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Versi Resto</button>
                        <button onclick="validateDownloadCode('pro')"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Versi Retail V
                            3.2.2</button>
                        <button onclick="validateDownloadCode('respro')"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Versi Resto V
                            3.2.1</button>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('images/CrudMenu.png') }}" alt="Download Mockup" class="w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe Section -->
    <section id="subscribe" class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <img src="{{ asset('images/Logo_KasirKu.png') }}" alt="KasirKU Logo" class="h-16 mx-auto mb-4">
            <p class="text-lg mb-6">Dapatkan Kasirku . Optimalkan bisnis, industri, dan usaha Anda dengan mudah, cepat,
                dan efisien.</p>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>© 2021 Powered by KasirKu Kasir</p>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <a href="#header"
        class="fixed bottom-4 right-4 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
            </path>
        </svg>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Mobile Menu Toggle
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Download Validation
        function validateDownloadCode(version) {
            Swal.fire({
                title: 'Masukkan kode download',
                input: 'text',
                showCancelButton: true,
                confirmButtonText: 'Download',
                cancelButtonText: 'Cancel',
                preConfirm: (code) => {
                    return new Promise((resolve) => {
                        if (code === "1234") {
                            resolve();
                        } else {
                            Swal.showValidationMessage('Kode download salah!');
                        }
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let downloadUrl;
                    if (version === "retail") {
                        downloadUrl = "https://oiku.my.id/Oiku-Platinum-Online-V5.1.1.apk";
                    } else if (version === "resto") {
                        downloadUrl = "https://oiku.my.id/resto/Oiku-Resto-Online-V5.apk";
                    } else if (version === "pro") {
                        downloadUrl = "https://oiku.my.id/Oiku-Platinum-Pro-Retail-V3.2.2.apk";
                    } else if (version === "respro") {
                        downloadUrl = "https://oiku.my.id/Oiku-Platinum-Pro-Resto-V3.2.1.apk";
                    }
                    if (downloadUrl) {
                        window.open(downloadUrl, "_blank");
                    } else {
                        Swal.fire('Error', 'Tidak dapat menentukan URL unduhan.', 'error');
                    }
                }
            });
        }

        const swiper = new Swiper('.swiper-container', {
            loop: true,
            centeredSlides: true, // Ini penting untuk slide utama di tengah
            slidesPerView: 1, // Defaultnya satu slide utama
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            breakpoints: {
                // Lebih kecil dari 640px tetap 1 slide
                640: {
                    slidesPerView: 3, // Mungkin terlihat agak rapat di layar kecil
                },
                768: {
                    slidesPerView: 5, // Satu tengah, dua di samping
                },
                1024: {
                    slidesPerView: 7, // Satu tengah, tiga di samping
                },
                // Layar lebih besar dari ini tetap 7
            }
        });

        // Hide Preloader
        window.addEventListener('load', () => {
            document.querySelector('.site-preloader-wrap').style.display = 'none';
        });
    </script>
</body>

</html>
