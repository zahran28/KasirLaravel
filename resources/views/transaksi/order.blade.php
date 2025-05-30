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
        <h2 class="text-xl font-bold mb-4">Detail Transaksi: {{ $code }}</h2>
        <h2>Nama Pemesan: {{ $namaTransaksi->nama_pesanan ?? 'Tidak ditemukan' }}</h2>


        <table class="w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Nama Makanan</th>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Subtotal</th>
                    <th class="border p-2">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $trx)
                    <tr>
                        <td class="border p-2">{{ $trx->menu->nama_makanan ?? '-' }}</td>
                        <td class="border p-2">{{ $trx->jumlah }}</td>
                        <td class="border p-2">Rp {{ number_format($trx->menu->harga ?? 0) }}</td>
                        <td class="border p-2">Rp {{ number_format(($trx->menu->harga ?? 0) * $trx->jumlah) }}</td>
                        <td class="border p-2">

                            <button data-bs-toggle="modal" data-bs-target="#modalEdit{{ $trx->id }}">Edit</button>
                            <div id="modalEdit{{ $trx->id }}" tabindex="-1"
                                class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-0 transition-opacity duration-300 flex items-center justify-center"
                                aria-hidden="true">

                                <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
                                    <h2 class="text-xl font-semibold mb-4">Edit Pesanan</h2>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $trx->id }}">

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Nama Makanan</label>
                                            <input type="text"
                                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                                                value="{{ $trx->menu->nama_makanan ?? '-' }}" disabled>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input type="number" name="jumlah"
                                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                                                value="{{ $trx->jumlah }}" required>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                            <textarea name="note_makanan" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" rows="3">{{ $trx->note_makanan }}</textarea>
                                        </div>

                                        <div class="flex justify-end gap-2">
                                            <button type="button" onclick="closeModal('modalEdit{{ $trx->id }}')"
                                                class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 hover:bg-gray-400">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </main>
    <script>
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
            }, 100); // Sesuai durasi Tailwind (300ms)
        }

        // Handle tombol dengan data-bs-toggle
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target').replace('#', '');
                openModal(target);
            });
        });
    </script>
</body>

</html>
