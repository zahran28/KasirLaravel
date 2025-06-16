</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Struk Pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>

<body class=" font-mono text-sm bg-white text-black">
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
    <div class="max-w-xs mx-auto border border-gray-300 p-4 rounded">
        <h1 class="text-center font-bold text-lg mb-2">Bercik Fried Chicken</h1>
        <p class="text-center mb-1">Jl. Terusan Kopo No. 123, Kab. Bandung Selatan</p>
        <hr class="my-2 border-dashed" />

        <div id="detail-pesanan"></div>

        <hr class="my-2 border-dashed" />
        <p class="text-center">Terima kasih telah berbelanja!</p>
    </div>

    <div class="text-center mt-4">
        <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Cetak</button>
    </div>
    <a href="/dasboard"
        class="fixed bottom-6 right-6 bg-red-600 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg shadow-xl z-50 text-lg">
        Kembali ke Home
    </a>
    <script>
        const dataPesanan = {
            tanggal: new Date().toLocaleString(),
            totalSetelahPPN: {{ $totalSetelahPpn }},
            totalSebelumPPN: {{ $totalSebelumPpn }},
            metodePembayaran: "{{ $metode }}",
            bayar: {{ $total }}, // ini total sebelum diskon & pajak, bisa diganti sesuai kebutuhan
            kembali: {{ $hitung }},
            items: [
                @foreach ($transaksi1 as $item)
                    {
                        nama: "{{ $item->menu->nama_makanan }}",
                        qty: {{ $item->jumlah }},
                        harga: {{ $item->menu->harga }}
                    },
                @endforeach
            ]
        };


        const container = document.getElementById("detail-pesanan");

        let html = `<p>Tanggal: ${dataPesanan.tanggal}</p><div class="my-2">`;

        let totalQty = 0;

        dataPesanan.items.forEach(item => {
            const total = item.qty * item.harga;
            totalQty += item.qty;

            html += `<div class="flex justify-between">
                <span>${item.qty}x ${item.nama}</span>
                <span>Rp ${total.toLocaleString()}</span>
              </div>`;
        });

        html += `
      </div>
      <div class="flex justify-between">
        <span>Total Qty:</span>
        <span>${totalQty}</span>
      </div>
      <div class="flex justify-between">
        <span>Total Sebelum PPN:</span>
        <span>Rp ${dataPesanan.totalSebelumPPN.toLocaleString()}</span>
      </div>
      <div class="flex justify-between font-bold">
        <span>Total (Termasuk PPN 11%):</span>
        <span>Rp ${dataPesanan.totalSetelahPPN.toLocaleString()}</span>
      </div>
      <div class="flex justify-between">
        <span>Metode Pembayaran:</span>
        <span>${dataPesanan.metodePembayaran}</span>
      </div>

      <div class="flex justify-between">
        <span>Kembali:</span>
        <span>Rp ${dataPesanan.kembali.toLocaleString()}</span>
      </div>
    `;

        container.innerHTML = html;
    </script>
</body>

</html>
