<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>Metode Pembayaran</title>
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
    <main class="px-[5%] py-10">
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
        <div class="px-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($metode as $item)
                <div x-data="{ openEdit: false, openDelete: false }"
                    class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">

<img class="w-full h-48 object-contain" src="{{ $item->Linklogo }}" alt="Gambar Pembayaran">

                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
                    </div>

                    <div class="flex justify-between items-center px-5 pb-5">
                        <button @click="openEdit = true"
                            class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-md transition">
                            ✏️ Edit
                        </button>
                        <button @click="openDelete = true"
                            class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-md transition">
                            🗑️ Delete
                        </button>
                    </div>

                    <!-- Modal Edit -->
                    <div x-show="openEdit" x-cloak
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                            <h2 class="text-lg font-semibold mb-4">Edit Pembayaran</h2>
                            <form action="{{ route('edit-metode', $item->nama) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="logo_{{ $item->id }}"
                                        class="block text-sm font-medium text-gray-700 mb-1">Logo Pembayaran</label>
                                    <input type="text" id="logo_{{ $item->id }}" name="linklogo"
                                        value="{{ $item->Linklogo }}" placeholder="Masukkan URL logo pembayaran"
                                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                        required>
                                </div>

                                <div>
                                    <label for="nama_{{ $item->id }}"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nama Pembayaran</label>
                                    <input type="text" id="nama_{{ $item->id }}" name="nama"
                                        value="{{ $item->nama }}" placeholder="Contoh: Dana, OVO, ShopeePay"
                                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                        required>
                                </div>


                                <div>
                                    <label for="link_{{ $item->id }}"
                                        class="block text-sm font-medium text-gray-700 mb-1">Link Pembayaran</label>
                                    <input type="text" id="link_{{ $item->id }}" name="linktujuan"
                                        value="{{ $item->LinkTujuan }}" placeholder="Masukkan link tujuan pembayaran"
                                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                        required>
                                </div>

                                <div class="flex justify-end gap-3 pt-2">
                                    <button type="button" @click="openEdit = false"
                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md transition">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition font-semibold">💾
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div x-show="openDelete" x-cloak
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                        <div class="bg-white rounded-lg shadow-lg w-80 p-6 text-center">
                            <h2 class="text-lg font-semibold mb-4">Yakin hapus <br>“{{ $item->nama }}”?</h2>
                            <form action="{{ route('destroy', $item->nama) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-center gap-4">
                                    <button type="button" @click="openDelete = false"
                                        class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="javascript:void(0)"
            class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-5 rounded-full shadow-lg flex items-center gap-2 transition tambahMetodeBtn">
            ➕ Tambah Metode
        </a>
        <!-- Modal -->
        <div id="tambahMetodeModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="text-lg font-semibold">Tambah Metode</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <form action="{{ route('TambahMetode') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Metode</label>
                            <input type="text" name="nama_metode"
                                class="w-full border p-2 rounded focus:ring focus:ring-green-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Link Tujuan</label>
                            <input type="text" name="Link_Tujuan"
                                class="w-full border p-2 rounded focus:ring focus:ring-green-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Logo Metode</label>
                            <input type="text" name="Logo_metode"
                                class="w-full border p-2 rounded focus:ring focus:ring-green-300">
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">

                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.querySelector('.tambahMetodeBtn').addEventListener('click', function() {
                document.getElementById('tambahMetodeModal').classList.remove('hidden');
            });

            function closeModal() {
                document.getElementById('tambahMetodeModal').classList.add('hidden');
            }
        </script>
    </main>
</body>

</html>
