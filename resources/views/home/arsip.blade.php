<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Web Kasir - Point of Sale
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-gray-100 min-h-screen flex flex-col">
  <header class="bg-blue-600 text-white shadow-md">
   <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-3">
     {{-- <img alt="Point of Sale logo, blue square with white POS text" class="w-10 h-10 rounded" height="40" src="https://storage.googleapis.com/a1aa/image/0d303e75-897f-4f0e-05ae-cd2427336c44.jpg" width="40"/> --}}
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
    <button aria-label="Toggle menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-white" id="menu-btn">
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
  <main class="flex-grow container mx-auto px-4 py-6 flex flex-col md:flex-row md:space-x-6">
   <!-- Produk List -->
   <section class="md:w-1/3 bg-white rounded-lg shadow p-4 mb-6 md:mb-0 flex flex-col">
    <h2 class="text-xl font-semibold mb-4 border-b pb-2">
     Daftar Produk
    </h2>
    <div class="overflow-y-auto flex-grow">
     <ul class="space-y-3 max-h-[480px]" id="product-list">

      <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="1" data-name="Kopi Arabika" data-price="15000">
       <div class="flex items-center space-x-3">
        <img alt="Gelas kopi Arabika panas dengan uap mengepul di atas meja kayu" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/0d4f16b1-ada2-4182-47b9-30e98ce3d5c6.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Kopi Arabika
         </h3>
         <p class="text-sm text-gray-600">
          Rp 15.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Kopi Arabika ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li>

      <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="2" data-name="Teh Tarik" data-price="12000">
       <div class="flex items-center space-x-3">
        <img alt="Gelas teh tarik dengan busa tebal di atas meja kayu" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/eadc03f9-3281-472a-1e3c-c3aa8148649f.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Teh Tarik
         </h3>
         <p class="text-sm text-gray-600">
          Rp 12.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Teh Tarik ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li>

      <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="3" data-name="Roti Bakar Coklat" data-price="10000">
       <div class="flex items-center space-x-3">
        <img alt="Sepotong roti bakar dengan coklat leleh di atas piring putih" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/18638c48-9b2f-4091-2639-816d93fa5e69.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Roti Bakar Coklat
         </h3>
         <p class="text-sm text-gray-600">
          Rp 10.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Roti Bakar Coklat ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li>

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="4" data-name="Jus Jeruk" data-price="13000">
       <div class="flex items-center space-x-3">
        <img alt="Segelas jus jeruk segar dengan irisan jeruk di tepi gelas" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/f575fbd2-4a46-42f0-fb84-c9399d14c6de.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Jus Jeruk
         </h3>
         <p class="text-sm text-gray-600">
          Rp 13.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Jus Jeruk ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="5" data-name="Nasi Goreng" data-price="25000">
       <div class="flex items-center space-x-3">
        <img alt="Piring nasi goreng dengan telur mata sapi dan irisan mentimun" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/412cfef5-c3bf-4546-99ab-2ba031684215.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Nasi Goreng
         </h3>
         <p class="text-sm text-gray-600">
          Rp 25.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Nasi Goreng ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="6" data-name="Mie Ayam" data-price="20000">
       <div class="flex items-center space-x-3">
        <img alt="Mangkok mie ayam dengan potongan ayam dan sayuran" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/9254480c-33b6-4112-8f33-a074429a8a1c.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Mie Ayam
         </h3>
         <p class="text-sm text-gray-600">
          Rp 20.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Mie Ayam ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="7" data-name="Es Teh Manis" data-price="8000">
       <div class="flex items-center space-x-3">
        <img alt="Gelas es teh manis dengan es batu dan sedotan" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/dddf3cdb-631f-4a15-4f8b-eb7764af2e14.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Es Teh Manis
         </h3>
         <p class="text-sm text-gray-600">
          Rp 8.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Es Teh Manis ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="8" data-name="Kue Lapis" data-price="7000">
       <div class="flex items-center space-x-3">
        <img alt="Potongan kue lapis warna-warni di atas piring putih" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/2dd3162f-38ee-4f9a-a758-0b88d1b1dd28.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Kue Lapis
         </h3>
         <p class="text-sm text-gray-600">
          Rp 7.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Kue Lapis ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      {{-- <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="9" data-name="Sate Ayam" data-price="30000">
       <div class="flex items-center space-x-3">
        <img alt="Tusuk sate ayam dengan bumbu kacang di atas piring" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/1507db20-d199-4d5c-cd2c-4caf3ccd545a.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Sate Ayam
         </h3>
         <p class="text-sm text-gray-600">
          Rp 30.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Sate Ayam ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li> --}}

      <li class="flex items-center justify-between p-3 border rounded hover:shadow cursor-pointer" data-id="10" data-name="Es Campur" data-price="15000">
       <div class="flex items-center space-x-3">
        <img alt="Mangkok es campur dengan berbagai buah dan sirup warna-warni" class="w-16 h-16 rounded object-cover" height="60" src="https://storage.googleapis.com/a1aa/image/d5e0cba1-b622-47d8-4031-ff861a1b6d09.jpg" width="60"/>
        <div>
         <h3 class="font-semibold text-gray-800">
          Es Campur
         </h3>
         <p class="text-sm text-gray-600">
          Rp 15.000
         </p>
        </div>
       </div>
       <button aria-label="Tambah Es Campur ke keranjang" class="add-to-cart-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-plus">
        </i>
       </button>
      </li>
     </ul>
    </div>
   </section>
   <!-- Keranjang & Transaksi -->
   <section class="md:w-2/3 bg-white rounded-lg shadow p-4 flex flex-col">
    <h2 class="text-xl font-semibold mb-4 border-b pb-2">
     Keranjang Belanja
    </h2>
    <div class="flex-grow overflow-y-auto max-h-[480px]">
     <table class="w-full text-left table-auto border-collapse">
      <thead>
       <tr class="bg-gray-100">
        <th class="p-2 border-b border-gray-300">
         Produk
        </th>
        <th class="p-2 border-b border-gray-300 w-24 text-center">
         Harga
        </th>
        <th class="p-2 border-b border-gray-300 w-24 text-center">
         Jumlah
        </th>
        <th class="p-2 border-b border-gray-300 w-28 text-center">
         Subtotal
        </th>
        <th class="p-2 border-b border-gray-300 w-20 text-center">
         Aksi
        </th>
       </tr>
      </thead>


      <tbody class="divide-y divide-gray-200" id="cart-items">
       <tr class="text-center text-gray-500">
        <td class="py-6" colspan="5">
         Keranjang kosong
        </td>
       </tr>
      </tbody>


     </table>

    <div class="mt-4 border-t pt-4 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
     <div class="text-lg font-semibold text-gray-800">
      Total:
      <span id="total-price">
       Rp 0
      </span>
     </div>
     <div class="flex space-x-3">
      <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 flex items-center space-x-2" id="clear-cart">
       <i class="fas fa-trash-alt">
       </i>
       <span>
        Hapus Semua
       </span>
      </button>
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 flex items-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed" disabled="" id="checkout-btn">
       <i class="fas fa-cash-register">
       </i>
       <span>
        Bayar
       </span>
      </button>
     </div>
    </div>
    <!-- Modal Pembayaran -->
    <div aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50" id="payment-modal">
     <div aria-labelledby="payment-modal-title" aria-modal="true" class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative" role="dialog">
      <h3 class="text-xl font-semibold mb-4" id="payment-modal-title">
       Pembayaran
      </h3>
      <div class="mb-4">
       <p class="text-gray-700 mb-2">
        Total yang harus dibayar:
        <span class="font-semibold" id="modal-total-price">
        </span>
       </p>
       <label class="block mb-1 font-medium text-gray-700" for="payment-amount">
        Masukkan jumlah pembayaran (Rp)
       </label>
       <input aria-describedby="payment-error" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="payment-amount" min="0" placeholder="0" type="number"/>
       <p class="text-red-600 mt-1 text-sm hidden" id="payment-error">
       </p>
      </div>
      <div class="flex justify-end space-x-3">
       <button class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400" id="cancel-payment">
        Batal
       </button>
       <button class="px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 disabled:opacity-50 disabled:cursor-not-allowed" disabled="" id="confirm-payment">
        Konfirmasi
       </button>
      </div>
     </div>
    </div>
    <!-- Modal Struk -->
    <div aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50" id="receipt-modal">
     <div aria-labelledby="receipt-modal-title" aria-modal="true" class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative overflow-y-auto max-h-[80vh]" role="dialog">
      <h3 class="text-xl font-semibold mb-4 text-center" id="receipt-modal-title">
       Struk Pembayaran
      </h3>
      <div class="text-gray-800 text-sm space-y-2 font-mono" id="receipt-content">
      </div>
      <div class="mt-6 flex justify-center space-x-4">
       <button class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center space-x-2" id="print-receipt">
        <i class="fas fa-print">
        </i>
        <span>
         Cetak
        </span>
       </button>
       <button class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400" id="close-receipt">
        Tutup
       </button>
      </div>
     </div>
    </div>
   </section>
  </main>
  <footer class="bg-blue-600 text-white text-center py-4 mt-auto">
   © 2024 Web Kasir. All rights reserved.
  </footer>
  <script>
   // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Cart data structure
    let cart = {};

    // Format number to Indonesian Rupiah currency
    function formatRupiah(number) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
      }).format(number);
    }

    // Update cart UI
    function updateCartUI() {
      const cartItemsContainer = document.getElementById('cart-items');
      cartItemsContainer.innerHTML = '';

      const cartEntries = Object.values(cart);
      if (cartEntries.length === 0) {
        const emptyRow = document.createElement('tr');
        emptyRow.classList.add('text-center', 'text-gray-500');
        emptyRow.innerHTML = `<td colspan="5" class="py-6">Keranjang kosong</td>`;
        cartItemsContainer.appendChild(emptyRow);
        document.getElementById('total-price').textContent = formatRupiah(0);
        document.getElementById('checkout-btn').disabled = true;
        return;
      }

      let total = 0;
      cartEntries.forEach((item) => {
        const subtotal = item.price * item.quantity;
        total += subtotal;

        const tr = document.createElement('tr');
        tr.classList.add('border-b', 'border-gray-200', 'hover:bg-gray-50');
        tr.innerHTML = `
          <td class="p-2 align-middle">${item.name}</td>
          <td class="p-2 text-center align-middle">${formatRupiah(item.price)}</td>
          <td class="p-2 text-center align-middle">
            <div class="inline-flex items-center border rounded overflow-hidden">
              <button aria-label="Kurangi jumlah ${item.name}" class="decrease-qty px-2 py-1 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" data-id="${item.id}"><i class="fas fa-minus"></i></button>
              <input type="text" readonly class="w-10 text-center border-l border-r border-gray-300" value="${item.quantity}" aria-label="Jumlah ${item.name}" />
              <button aria-label="Tambah jumlah ${item.name}" class="increase-qty px-2 py-1 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" data-id="${item.id}"><i class="fas fa-plus"></i></button>
            </div>
          </td>
          <td class="p-2 text-center align-middle">${formatRupiah(subtotal)}</td>
          <td class="p-2 text-center align-middle">
            <button aria-label="Hapus ${item.name} dari keranjang" class="remove-item text-red-600 hover:text-red-800 focus:outline-none" data-id="${item.id}">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        `;
        cartItemsContainer.appendChild(tr);
      });

      document.getElementById('total-price').textContent = formatRupiah(total);
      document.getElementById('checkout-btn').disabled = false;

      // Attach event listeners for quantity buttons and remove buttons
      document.querySelectorAll('.decrease-qty').forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-id');
          if (cart[id].quantity > 1) {
            cart[id].quantity--;
          } else {
            delete cart[id];
          }
          updateCartUI();
        });
      });

      document.querySelectorAll('.increase-qty').forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-id');
          cart[id].quantity++;
          updateCartUI();
        });
      });

      document.querySelectorAll('.remove-item').forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-id');
          delete cart[id];
          updateCartUI();
        });
      });
    }

    // Add product to cart
    document.querySelectorAll('.add-to-cart-btn').forEach((btn) => {
      btn.addEventListener('click', (e) => {
        const li = e.target.closest('li');
        const id = li.getAttribute('data-id');
        const name = li.getAttribute('data-name');
        const price = parseInt(li.getAttribute('data-price'), 10);

        if (cart[id]) {
          cart[id].quantity++;
        } else {
          cart[id] = { id, name, price, quantity: 1 };
        }
        updateCartUI();
      });
    });

    // Clear cart button
    document.getElementById('clear-cart').addEventListener('click', () => {
      if (confirm('Apakah Anda yakin ingin menghapus semua item dari keranjang?')) {
        cart = {};
        updateCartUI();
      }
    });

    // Checkout button
    const paymentModal = document.getElementById('payment-modal');
    const receiptModal = document.getElementById('receipt-modal');
    const paymentAmountInput = document.getElementById('payment-amount');
    const paymentError = document.getElementById('payment-error');
    const confirmPaymentBtn = document.getElementById('confirm-payment');
    const modalTotalPrice = document.getElementById('modal-total-price');
    const receiptContent = document.getElementById('receipt-content');

    document.getElementById('checkout-btn').addEventListener('click', () => {
      const total = Object.values(cart).reduce(
        (acc, item) => acc + item.price * item.quantity,
        0
      );
      modalTotalPrice.textContent = formatRupiah(total);
      paymentAmountInput.value = '';
      paymentError.textContent = '';
      paymentError.classList.add('hidden');
      confirmPaymentBtn.disabled = true;
      paymentModal.classList.remove('hidden');
      paymentAmountInput.focus();
    });

    // Payment amount input validation
    paymentAmountInput.addEventListener('input', () => {
      const total = Object.values(cart).reduce(
        (acc, item) => acc + item.price * item.quantity,
        0
      );
      const paymentValue = parseInt(paymentAmountInput.value, 10);
      if (isNaN(paymentValue) || paymentValue < total) {
        paymentError.textContent = 'Jumlah pembayaran kurang dari total.';
        paymentError.classList.remove('hidden');
        confirmPaymentBtn.disabled = true;
      } else {
        paymentError.textContent = '';
        paymentError.classList.add('hidden');
        confirmPaymentBtn.disabled = false;
      }
    });

    // Cancel payment
    document.getElementById('cancel-payment').addEventListener('click', () => {
      paymentModal.classList.add('hidden');
    });

    // Confirm payment
    confirmPaymentBtn.addEventListener('click', () => {
      const total = Object.values(cart).reduce(
        (acc, item) => acc + item.price * item.quantity,
        0
      );
      const paymentValue = parseInt(paymentAmountInput.value, 10);
      if (paymentValue >= total) {
        const change = paymentValue - total;
        // Generate receipt text
        let receiptText = '';
        receiptText += '===== STRUK PEMBAYARAN =====\n';
        receiptText += `Tanggal: ${new Date().toLocaleString('id-ID')}\n\n`;
        receiptText += 'Item:\n';
        Object.values(cart).forEach((item) => {
          const subtotal = item.price * item.quantity;
          receiptText += `${item.name} x${item.quantity} @${formatRupiah(
            item.price
          )} = ${formatRupiah(subtotal)}\n`;
        });
        receiptText += '\n';
        receiptText += `Total: ${formatRupiah(total)}\n`;
        receiptText += `Bayar: ${formatRupiah(paymentValue)}\n`;
        receiptText += `Kembali: ${formatRupiah(change)}\n`;
        receiptText += '============================\n';
        receiptText += 'Terima kasih atas kunjungan Anda!';

        receiptContent.textContent = receiptText;
        paymentModal.classList.add('hidden');
        receiptModal.classList.remove('hidden');
        cart = {};
        updateCartUI();
      }
    });

    // Close receipt modal
    document.getElementById('close-receipt').addEventListener('click', () => {
      receiptModal.classList.add('hidden');
    });

    // Print receipt
    document.getElementById('print-receipt').addEventListener('click', () => {
      const printWindow = window.open('', '', 'width=400,height=600');
      printWindow.document.write('<pre style="font-family: monospace; font-size: 14px;">');
      printWindow.document.write(receiptContent.textContent);
      printWindow.document.write('</pre>');
      printWindow.document.close();
      printWindow.focus();
      printWindow.print();
      printWindow.close();
    });

    // Initialize cart UI on page load
    updateCartUI();
  </script>
 </body>
</html>



        <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded shadow-lg w-11/12 max-w-lg relative">
                <button id="closeBtn" class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl font-bold">
                    &times;
                </button>
                <div class="bg-blue-200 p-2  ">
                    <div class="menu-card max-w-xs rounded-xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300"
                        tabindex="0" role="listitem" aria-label="Es Teh Manis, Rp 5.000">
                        <img class="w-full h-60 object-cover" src="" alt="Es Teh Manis">

                        <div class="p-4">
                            <h2 class="menu-title text-lg font-semibold text-gray-800">Es Teh Manis</h2>
                            <p class="menu-description text-sm text-gray-600 mt-1">Teh manis dingin yang menyegarkan.
                            </p>
                            <div class="menu-price text-md text-indigo-600 font-bold mt-2">Rp 5.000</div>

                            <form action="/pesan" method="POST" class="space-y-4">




                                <!-- Jumlah dengan Tombol + dan - -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="changeJumlah(-1)"
                                            class="bg-gray-200 px-3 py-1 rounded text-lg font-bold hover:bg-gray-300">-</button>
                                        <input id="jumlah" name="jumlah" type="number" value="1"
                                            min="1"
                                            class="w-16 text-center border border-gray-300 rounded-md px-2 py-1 focus:ring focus:ring-blue-200 focus:border-blue-400">
                                        <button type="button" onclick="changeJumlah(1)"
                                            class="bg-gray-200 px-3 py-1 rounded text-lg font-bold hover:bg-gray-300">+</button>
                                    </div>
                                </div>

                                <!-- Catatan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                    <textarea name="catatan" rows="2"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400">                         </textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="text-right">

                            <button
                                class="mt-4 w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
                                Order
                            </button>
                                </div>
                            </form>
                        </div>

                        <script>
                            function changeJumlah(amount) {
                                const input = document.getElementById('jumlah');
                                let current = parseInt(input.value) || 1;
                                current += amount;
                                if (current < 1) current = 1;
                                input.value = current;
                            }
                        </script>
                    </div>
                </div>

            </div>

        </div>
        </div>




    </main>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-3xl font-bold text-center mb-6">Aplikasi Kasir Sederhana</h1>

        <!-- Form Input -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <div class="grid grid-cols-1 gap-4">
                <input id="itemName" type="text" placeholder="Nama Barang" class="p-2 border rounded-md">
                <input id="itemPrice" type="number" placeholder="Harga Barang" class="p-2 border rounded-md">
                <input id="itemQuantity" type="number" placeholder="Jumlah" class="p-2 border rounded-md">
                <button onclick="addItem()" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Tambah Barang</button>
            </div>
        </div>

        <!-- Tabel Barang -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Nama Barang</th>
                        <th class="p-2">Harga</th>
                        <th class="p-2">Jumlah</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="itemList"></tbody>
            </table>
            <div class="mt-4 text-right">
                <p class="text-lg font-bold">Total Keseluruhan: <span id="grandTotal">0</span></p>
            </div>
            <button onclick="clearAll()" class="mt-4 bg-red-500 text-white p-2 rounded-md hover:bg-red-600">Hapus Semua</button>
        </div>
    </div>

    <script>
        let items = [];

        function addItem() {
            const name = document.getElementById('itemName').value;
            const price = parseFloat(document.getElementById('itemPrice').value);
            const quantity = parseInt(document.getElementById('itemQuantity').value);

            if (name && price > 0 && quantity > 0) {
                items.push({ name, price, quantity });
                updateTable();
                clearInputs();
            } else {
                alert('Isi semua kolom dengan benar!');
            }
        }

        function deleteItem(index) {
            items.splice(index, 1);
            updateTable();
        }

        function clearAll() {
            items = [];
            updateTable();
        }

        function updateTable() {
            const itemList = document.getElementById('itemList');
            const grandTotal = document.getElementById('grandTotal');
            itemList.innerHTML = '';

            let total = 0;
            items.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="p-2">${item.name}</td>
                    <td class="p-2">Rp ${item.price.toLocaleString('id-ID')}</td>
                    <td class="p-2">${item.quantity}</td>
                    <td class="p-2">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</td>
                    <td class="p-2">
                        <button onclick="deleteItem(${index})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                    </td>
                `;
                itemList.appendChild(row);
                total += item.price * item.quantity;
            });

            grandTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        function clearInputs() {
            document.getElementById('itemName').value = '';
            document.getElementById('itemPrice').value = '';
            document.getElementById('itemQuantity').value = '';
        }
    </script>
</body>
</html>

Route::get('/profile', [ProfileController::class, 'show'])->name('show');
    Route::post('/profile/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('pdate-password');





