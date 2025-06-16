<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order</title>
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
    <main>
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

        <div class="px-6 md:px-12 lg:px-24 py-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Detail Transaksi: <span
                    class="text-blue-600">{{ $code }}</span></h2>
            <p class="mb-6 text-gray-600">Nama Pemesan:
                <strong>{{ $namaTransaksi->nama_pesanan ?? 'Tidak ditemukan' }}</strong>
            </p>
            <p class="mb-6 text-gray-600">Total Harga: Rp
                <strong>{{ number_format($totalHarga ?? ' tidak di temukan') }}</strong>
            </p>


            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow rounded-xl overflow-hidden border">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-sm font-medium text-gray-700">
                            <th class="p-4">Nama Makanan</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Harga</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $trx)
                            <tr class="border-t hover:bg-gray-50 text-sm">
                                <td class="p-4 font-medium text-gray-800">{{ $trx->menu->nama_makanan ?? '-' }}</td>
                                <td class="p-4">{{ $trx->jumlah }}</td>
                                <td class="p-4">Rp {{ number_format($trx->menu->harga ?? 0) }}</td>
                                <td class="p-4">Rp {{ number_format(($trx->menu->harga ?? 0) * $trx->jumlah) }}</td>
                                <td class="p-4 text-center space-x-2">
                                    <!-- Edit Button -->
                                    <button data-bs-toggle="modal" data-bs-target="#modalEdit{{ $trx->id }}"
                                        class="px-3 py-1 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition">
                                        Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <button onclick="openModal('modalDelete{{ $trx->id }}')"
                                        class="px-3 py-1 rounded-lg text-white bg-red-600 hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div id="modalEdit{{ $trx->id }}" tabindex="-1"
                                class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-0 transition-opacity duration-300 flex items-center justify-center">
                                <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4 text-gray-800">Edit Pesanan</h2>
                                    <form action="{{ route('edit') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $trx->id }}">

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-600">Nama Makanan</label>
                                            <input type="text" value="{{ $trx->menu->nama_makanan ?? '-' }}"
                                                disabled
                                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 text-gray-800">
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah</label>
                                            <div class="flex items-center gap-2">
                                                <button type="button" onclick="decrement(this)"
                                                    class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">−</button>

                                                <input type="number" name="jumlah" required
                                                    value="{{ $trx->jumlah }}"
                                                    class="w-20 text-center border border-gray-300 rounded-lg shadow-sm py-1"
                                                    min="0">

                                                <button type="button" onclick="increment(this)"
                                                    class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">+</button>
                                            </div>

                                            <script>
                                                function increment(button) {
                                                    const input = button.previousElementSibling;
                                                    input.value = parseInt(input.value) + 1;
                                                }

                                                function decrement(button) {
                                                    const input = button.nextElementSibling;
                                                    if (parseInt(input.value) > 0) {
                                                        input.value = parseInt(input.value) - 1;
                                                    }
                                                }
                                            </script>

                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-600">Catatan</label>
                                            <textarea name="note_makanan" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm">{{ $trx->note_makanan }}</textarea>
                                        </div>

                                        <div class="flex justify-end gap-2 mt-4">
                                            <button type="button"
                                                onclick="closeModal('modalEdit{{ $trx->id }}')"
                                                class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div id="modalDelete{{ $trx->id }}"
                                class="fixed inset-0 z-50 hidden bg-black bg-opacity-30 flex items-center justify-center">
                                <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-xl">
                                    <h2 class="text-lg font-semibold text-red-600 mb-3">Konfirmasi Hapus</h2>
                                    <p class="text-gray-700 mb-4">Apakah kamu yakin ingin menghapus pesanan
                                        <strong>{{ $trx->menu->nama_makanan ?? '-' }}</strong>?
                                    </p>
                                    <form action="{{ route('hapus') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $trx->id }}">
                                        <div class="flex justify-end gap-3 mt-4">
                                            <button type="button"
                                                onclick="closeModal('modalDelete{{ $trx->id }}')"
                                                class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white">Ya,
                                                Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <!-- Tombol Tambah Menu -->
                <div class="mt-6 text-right">
                    <button onclick="openModal('modalTambahMenu')"
                        class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg shadow-md transition">
                        ➕ Tambah Menu
                    </button>
                </div>

                <!-- Modal Tambah Menu -->
                <div id="modalTambahMenu"
                    class="fixed inset-0 z-50 hidden bg-black bg-opacity-70 flex items-center justify-center p-6 overflow-auto">

                    <div
                        class="bg-white rounded-xl shadow-xl w-full max-w-9xl h-full max-h-[90vh] overflow-y-auto p-6 relative">
                        <button onclick="closeModal('modalTambahMenu')"
                            class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Menu ke Transaksi</h2>

                        <form action="{{ route('tambah-item', $code) }}" method="POST"
                            class="h-full flex flex-col">
                            @csrf
                            <input type="hidden" name="kode_transaksi" value="{{ $code }}">

                            <div class="flex-grow overflow-auto">

                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">


                                    @foreach ($listMenu as $menu)
                                        <div
                                            class="bg-white rounded-xl shadow-lg p-5 border hover:shadow-xl transition-all duration-200 w-full flex flex-col">
                                            <div class="relative">
                                                @if ($menu->stok == 0)
                                                    <div
                                                        class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow-lg z-10">
                                                        Stok Habis
                                                    </div>
                                                @endif

                                                <img src="{{ $menu->link ?? 'https://via.placeholder.com/150' }}"
                                                    alt="{{ $menu->nama_makanan }}"
                                                    class="w-full h-48 object-cover rounded-lg mb-3" />
                                            </div>

                                            <h2 class="text-lg font-semibold text-gray-800 mb-1">
                                                {{ $menu->nama_makanan }}</h2>
                                            <p class="text-sm text-gray-500 mb-2">{{ $menu->deskripsi }}</p>

                                            <div class="flex justify-between text-sm mb-2">
                                                <span class="text-green-600 font-medium">Stok:
                                                    {{ $menu->stok }}</span>
                                                <span class="text-blue-600 font-bold">Rp
                                                    {{ number_format($menu->harga) }}</span>
                                            </div>

                                            <input type="hidden" name="id_makanan[]"
                                                value="{{ $menu->id_makanan }}">

                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah:</label>
                                            <div class="flex items-center gap-2">
                                                <button type="button"
                                                    class="btn-decrement bg-gray-300 px-3 py-1 rounded disabled:opacity-50"
                                                    onclick="decrement(this)"
                                                    {{ $menu->stok == 0 ? 'disabled' : '' }}>-</button>
                                                <input type="number" name="jumlah[]" min="0"
                                                    max="{{ $menu->stok }}" value="0"
                                                    class="w-16 text-center border-gray-300 rounded px-2 py-1"
                                                    readonly>
                                                <button type="button"
                                                    class="btn-increment bg-gray-300 px-3 py-1 rounded disabled:opacity-50"
                                                    onclick="increment(this)"
                                                    {{ $menu->stok == 0 ? 'disabled' : '' }}>+</button>
                                            </div>

                                            <label for="catatan-{{ $menu->id }}"
                                                class="block text-sm font-medium text-gray-700 mt-3 mb-1">Catatan:</label>
                                            <textarea id="catatan-{{ $menu->id }}" name="catatan[]" rows="2"
                                                placeholder="Tambahkan catatan (opsional)..."
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-y transition duration-200"></textarea>
                                        </div>
                                    @endforeach
                                    </grid>

                                </div>

                                <div class="flex justify-end gap-2 mt-6">

                                    <button
                                        class="flex justify-center items-center gap-3 px-4 py-2 rounded-md border-0 outline outline-3 outline-[#007ACC] outline-offset-[-3px] bg-[#007ACC] hover:bg-transparent transition duration-300 group">


                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            width="24" height="24"
                                            class="transition duration-300 group-hover:[&>path]:fill-[#81d688]">
                                            <path fill="white"
                                                d="M20 2H4C2.897 2 2 2.897 2 4v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4c0-1.103-.897-2-2-2ZM10 17l-5-5 1.414-1.414L10 14.172l7.586-7.586L19 8l-9 9Z" />
                                        </svg>


                                        <p
                                            class="text-white font-bold text-base group-hover:text-[#007ACC] transition duration-300">
                                            Simpan</p>
                                    </button>


                                </div>
                        </form>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Menu Sudah Dipesan</h2>

                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                            @foreach ($listPesan as $menu)
                                @php
                                    $transaksi = $pesanan->firstWhere('menu_id', $menu->id_makanan);
                                @endphp
                                <div class="bg-gray-100 rounded-xl p-5 border border-gray-300 shadow-inner opacity-75">
                                    <img src="{{ $menu->link ?? 'https://via.placeholder.com/150' }}"
                                        alt="{{ $menu->nama_makanan }}"
                                        class="w-full h-40 object-cover rounded mb-3">
                                    <h2 class="text-lg font-semibold text-gray-700">{{ $menu->nama_makanan }}</h2>
                                    <p class="text-sm text-gray-500 mb-2">Sudah dipesan</p>
                                    <div class="text-sm text-gray-600 mb-1">Jumlah: {{ $transaksi->jumlah }}</div>
                                    <div class="text-sm text-gray-600">Catatan: {{ $transaksi->note_makanan ?: '—' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>



                </div>



            </div>
            <div>

                <a href="{{ route('view', $code) }}"
                    class="fixed bottom-6 right-6 z-50 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-base md:text-lg tracking-wide rounded-full shadow-lg ring-2 ring-white hover:ring-4 transition-all duration-300 transform hover:scale-105">
                    💳 Bayar Sekarang
                </a>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <script>
                // Mobile menu toggle
                const menuBtn = document.getElementById('menu-btn');
                const mobileMenu = document.getElementById('mobile-menu');
                menuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

                function openModal(id) {
                    const modal = document.getElementById(id);
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        modal.classList.remove('bg-opacity-0');
                        modal.classList.add('bg-opacity-50');
                    }, 10);
                }

                function closeModal(id) {
                    const modal = document.getElementById(id);
                    modal.classList.remove('bg-opacity-50');
                    modal.classList.add('bg-opacity-0');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 100);
                }

                // Buka modal berdasarkan data-bs-target
                document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
                    button.addEventListener('click', function() {
                        const target = this.getAttribute('data-bs-target').replace('#', '');
                        openModal(target);
                    });
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
    </main>
</body>


</html>
