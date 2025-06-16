<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>tambah stok</title>
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

        <div class="px-[5%] py-10px-6 md:px-12 lg:px-24 py-6">

            <form action="{{ route('updateStok') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach ($Menu as $menu)
                        <div
                            class="bg-white rounded-xl shadow-lg p-5 border hover:shadow-xl transition-all duration-200 w-full flex flex-col">

                            <div class="relative flex-grow">

                                @if ($menu->stok == 0)
                                    <div
                                        class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow-lg z-10">
                                        Stok Habis
                                    </div>
                                @endif


                                <img src="{{ $menu->link ?? 'https://via.placeholder.com/200' }}"
                                    alt="{{ $menu->nama_makanan }}" class="w-full h-48 object-cover rounded-lg mb-3" />
                            </div>


                            <h2 class="text-lg font-semibold text-gray-800 mb-1 leading-tight">{{ $menu->nama_makanan }}
                            </h2>

                            <div class="flex justify-between items-center text-sm mb-3">

                                <span class="text-green-600 font-medium">Stok Saat Ini: {{ $menu->stok }}</span>

                                <span class="text-blue-600 font-bold text-base">Rp
                                    {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            </div>


                            <input type="hidden" name="id_makanan[]" value="{{ $menu->id_makanan }}">

                            <label for="tambah_stok_{{ $menu->id_makanan }}"
                                class="block text-sm font-medium text-gray-700 mb-1 mt-auto">
                                Jumlah Tambahan:
                            </label>
                            <div class="flex items-center justify-center gap-2">
                                <button type="button"
                                    class="btn-decrement bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold px-3 py-1 rounded-full text-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                    onclick="decrement(this)">-</button>
                                <input type="number" id="tambah_stok_{{ $menu->id_makanan }}" name="jumlah_tambah[]"
                                    min="0" value="0"
                                    class="w-16 text-center border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md px-2 py-1 text-base font-semibold"
                                    readonly>
                                <button type="button"
                                    class="btn-increment bg-blue-500 hover:bg-blue-600 text-white font-bold px-3 py-1 rounded-full text-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                    onclick="increment(this)">+</button>
                            </div>


                            <div class="mt-4 text-center space-x-2">
                                <button type="button" data-modal-target="editModal-{{ $menu->id_makanan }}"
                                    data-modal-toggle="editModal-{{ $menu->id_makanan }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm shadow">
                                    ✏️ Edit Menu
                                </button>

                                {{-- UBAH data-modal-target AGAR UNIK UNTUK SETIAP ITEM --}}
                                <button type="button" data-modal-target="deleteModal-{{ $menu->id_makanan }}"
                                    data-modal-toggle="deleteModal-{{ $menu->id_makanan }}"
                                    class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg text-sm shadow-md transition duration-200">
                                    🗑️ Hapus
                                </button>
                            </div>

                            {{-- ID ini sudah benar, biarkan saja --}}
                            <div id="editModal-{{ $menu->id_makanan }}"
                                class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <div class="bg-white rounded-lg max-w-md w-full p-6">
                                    <h2 class="text-xl font-bold mb-4">Edit "{{ $menu->nama_makanan }}"</h2>
                                    <form action="{{ route('Editproduk', $menu->id_makanan) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="link-{{ $menu->id_makanan }}" class="font-semibold">Link
                                                Gambar</label>
                                            <input id="link-{{ $menu->id_makanan }}" name="link" type="text"
                                                value="{{ old('link', $menu->link) }}"
                                                class="w-full p-2 border rounded" required>
                                            @error('link')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="nama_makanan-{{ $menu->id_makanan }}"
                                                class="font-semibold">Nama Makanan</label>
                                            <input id="nama_makanan-{{ $menu->id_makanan }}" name="nama_makanan"
                                                type="text" value="{{ old('nama_makanan', $menu->nama_makanan) }}"
                                                class="w-full p-2 border rounded" required>
                                            @error('nama_makanan')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="harga-{{ $menu->id_makanan }}" class="font-semibold">Harga
                                                (Rp)
                                            </label>
                                            <input id="harga-{{ $menu->id_makanan }}" name="harga" type="number"
                                                value="{{ old('harga', $menu->harga) }}"
                                                class="w-full p-2 border rounded" required>
                                            @error('harga')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex justify-end space-x-2">
                                            {{-- Gunakan data-modal-target untuk menutup modal ini --}}
                                            <button type="button"
                                                data-modal-toggle="editModal-{{ $menu->id_makanan }}"
                                                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div id="deleteModal-{{ $menu->id_makanan }}" tabindex="-1"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
                                    <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
                                    <p class="mb-6">Apakah Anda yakin ingin menghapus produk
                                        "{{ $menu->nama_makanan }}"?</p>
                                    <div class="flex justify-end space-x-4">

                                        <button type="button"
                                            data-modal-toggle="deleteModal-{{ $menu->id_makanan }}"
                                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                                        {{-- Form DELETE harus ada di sini dan menargetkan ID yang unik --}}
                                        <form action="{{ route('Deleteproduk', $menu->id_makanan) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="fixed bottom-6 right-6 flex items-center space-x-4 z-50">


                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg shadow-xl text-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">
                                Update Stok Produk
                            </button>
                        </div>
                    @endforeach
                    <script>
                        function toggleModal(id) {
                            const modal = document.getElementById(id);
                            if (modal) { // Pastikan modal ditemukan
                                if (modal.classList.contains('hidden')) {
                                    modal.classList.remove('hidden');
                                } else {
                                    modal.classList.add('hidden');
                                }
                            } else {
                                console.warn(`Modal dengan ID "${id}" tidak ditemukan saat toggleModal dipanggil.`);
                            }
                        }


                        document.addEventListener('DOMContentLoaded', () => {

                            const toggleButtons = document.querySelectorAll('[data-modal-toggle]');

                            toggleButtons.forEach(btn => {
                                btn.addEventListener('click', () => {
                                    const targetId = btn.getAttribute('data-modal-target') || btn.getAttribute(
                                        'data-modal-toggle');
                                    if (targetId) {
                                        toggleModal(targetId);
                                    } else {
                                        console.warn(
                                            'Tombol tidak memiliki atribut data-modal-target atau data-modal-toggle.'
                                        );
                                    }
                                });
                            });

                            document.querySelectorAll('.fixed.inset-0[id^="editModal-"], .fixed.inset-0[id^="deleteModal-"]')
                                .forEach(modal => {
                                    modal.addEventListener('click', (event) => {
                                        if (event.target ===
                                            modal) {
                                            toggleModal(modal.id);
                                        }
                                    });
                                });
                        });
                    </script>
            </form>


        </div>
        <button onclick="document.getElementById('modal-produk').classList.remove('hidden')"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Produk
        </button>


        <div id="modal-produk"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 relative">
                <h2 class="text-xl font-bold mb-4">Tambah Produk</h2>

                <form action="{{ route('Tambahproduk') }}" method="GET">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Produk</label>
                        <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Kode Produk</label>
                        <input type="text" name="kode" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Link Gambar</label>
                        <input type="text" name="gambar" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Harga</label>
                        <input type="number" name="harga" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button"
                            onclick="document.getElementById('modal-produk').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-300 rounded">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>


        </div>
        </div>







        <script>
            function increment(button) {
                const input = button.parentNode.querySelector('input[type="number"]');
                let value = parseInt(input.value);
                input.value = value + 1;
            }

            function decrement(button) {
                const input = button.parentNode.querySelector('input[type="number"]');
                let value = parseInt(input.value);
                const min = parseInt(input.min);

                if (value > min) {
                    input.value = value - 1;
                }
            }
        </script>
    </main>
</body>

</html>
