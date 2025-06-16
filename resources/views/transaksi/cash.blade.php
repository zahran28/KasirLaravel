<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
       <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <style>
                     input[type=number] {
            appearance: none;
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
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
    @if (session('error'))
        <div id="alert-error"
            class="fixed top-5 right-5 bg-red-500 text-white px-5 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in z-50"
            role="alert">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856C18.07 20.662 19 19.388 19 18V6c0-1.388-.93-2.662-2.071-2.938H6.071C4.93 3.338 4 4.612 4 6v12c0 1.388.93 2.662 2.071 2.938z" />
            </svg>
            <span class="flex-1">{{ session('error') }}</span>
            <button onclick="document.getElementById('alert-error').remove()" class="text-white hover:text-gray-200">
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
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2l4 -4M12 22C6.48 22 2 17.52 2 12S6.48 2 12 2s10 4.48 10 10s-4.48 10 -10 10z" />
            </svg>
            <span class="flex-1">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="text-white hover:text-gray-200">
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

    <div class="max-w-md mx-auto bg-white p-6 mt-10 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Pembayaran</h1>

        <form action="{{ route('sementara') }}" method="post" id="paymentForm">
            @csrf
            <input type="hidden" name="id" value="{{ $code }}">

            <!-- Total Belanja -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Total Belanja (termasuk PPN 11%)</label>
                <input type="text" id="totalBelanja" value="{{ 'Rp ' . number_format($total, 0, ',', '.') }}"
                    class="w-full p-2 border rounded bg-gray-100" readonly>
                <input type="hidden" id="totalHidden" value="{{ $total }}" name="total">
            </div>

            <!-- Uang Masuk -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Uang Masuk (Rp)</label>
                <input type="number" placeholder="Masukkan uang dari pelanggan"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="uang_masuk" id="uangMasuk" oninput="hitungKembalian()">
            </div>

            <!-- Kode Diskon -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Kode Diskon</label>
                <input type="text" placeholder="Contoh: HEMAT10"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="hemat">
            </div>

            <!-- Perhitungan Sementara -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Perhitungan Sementara</label>
                <div class="bg-gray-100 p-3 rounded">
                    <p>Total Belanja: <span id="totalBelanjaView"></span></p>
                    <p>PPN 11%: <span id="ppnView"></span></p>
                    <p>Total: <span id="totalView"></span></p>
                    <p>Uang Masuk: <span id="uangMasukView"></span></p>
                    <p>Kembalian: <span id="kembalianView"></span></p>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition">
                Simpan Pembayaran
            </button>
        </form>
    </div>

    <script>
        function hitungKembalian() {
            // Ambil nilai total belanja dan uang masuk
            const totalBelanja = parseFloat(document.getElementById('totalHidden').value);
            const uangMasuk = parseFloat(document.getElementById('uangMasuk').value) || 0;

            // Hitung PPN
            const ppn = totalBelanja * 0.11;
            const totalDenganPPN = totalBelanja + ppn;

            // Hitung kembalian
            const kembalian = uangMasuk - totalDenganPPN;

            // Hitung total
            const total = ppn + totalBelanja

            // Format rupiah function
            function formatRupiah(angka) {
                return 'Rp ' + angka.toLocaleString('id-ID', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
            }

            // Update view
            document.getElementById('totalBelanjaView').textContent = formatRupiah(totalBelanja);
            document.getElementById('ppnView').textContent = formatRupiah(ppn);
            document.getElementById('uangMasukView').textContent = formatRupiah(uangMasuk);
            document.getElementById('kembalianView').textContent = kembalian >= 0 ? formatRupiah(kembalian) :
                'Uang tidak cukup';
            document.getElementById('totalView').textContent = formatRupiah(total);

        }
    </script>
    </div>

</body>
