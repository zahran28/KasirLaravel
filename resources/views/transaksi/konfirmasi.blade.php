<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <title>Komfirmasi</title>
    <style>
        /* CSS yang sudah ada */
        .wave-menu {
            border: 4px solid #545FE5;
            border-radius: 50px;
            width: 200px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
            cursor: pointer;
            transition: ease 0.2s;
            position: relative;
            background: #fff;
        }

        .wave-menu li {
            list-style: none;
            height: 30px;
            width: 4px;
            border-radius: 10px;
            background: #545FE5;
            margin: 0 6px;
            padding: 0;
            animation-name: wave1;
            animation-duration: 0.3s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            transition: ease 0.2s;
        }

        .wave-menu:hover>li {
            background: #fff;
        }

        .wave-menu:hover {
            background: #545FE5;
        }

        .wave-menu li:nth-child(2) {
            animation-name: wave2;
            animation-delay: 0.2s;
        }

        .wave-menu li:nth-child(3) {
            animation-name: wave3;
            animation-delay: 0.23s;
            animation-duration: 0.4s;
        }

        .wave-menu li:nth-child(4) {
            animation-name: wave4;
            animation-delay: 0.1s;
            animation-duration: 0.3s;
        }

        .wave-menu li:nth-child(5) {
            animation-delay: 0.5s;
        }

        .wave-menu li:nth-child(6) {
            animation-name: wave2;
            animation-duration: 0.5s;
        }

        .wave-menu li:nth-child(8) {
            animation-name: wave4;
            animation-delay: 0.4s;
            animation-duration: 0.25s;
        }

        .wave-menu li:nth-child(9) {
            animation-name: wave3;
            animation-delay: 0.15s;
        }

        @keyframes wave1 {
            from {
                transform: scaleY(1);
            }

            to {
                transform: scaleY(0.5);
            }
        }

        @keyframes wave2 {
            from {
                transform: scaleY(0.3);
            }

            to {
                transform: scaleY(0.6);
            }
        }

        @keyframes wave3 {
            from {
                transform: scaleY(0.6);
            }

            to {
                transform: scaleY(0.8);
            }
        }

        @keyframes wave4 {
            from {
                transform: scaleY(0.2);
            }

            to {
                transform: scaleY(0.5);
            }
        }


        .Loading {

            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            padding-bottom: 5%
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
    <div class="Loading">

    <ul class="wave-menu">

        <li>
            <h1></h1>
        </li>
        <li>

        </li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </div>
</body>

</html>
