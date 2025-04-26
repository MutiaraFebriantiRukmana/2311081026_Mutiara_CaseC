<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Penyewaan Alat Camping")</title>

    <!-- <link href="/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <style>
        /* Reset and base styles */
        body {
            font-family: 'Arial';
            background: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;  /* Pastikan body mengambil minimal tinggi layar */
        }
        main{
            margin-top: 40px;
        }
 
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex-grow: 1;  /* Memberi ruang agar konten bisa mengisi sisa layar */
        }

        /* Heading style */
        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            list-style: none;
            margin-bottom: 0;
            padding: 0;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-link {
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
            color: #007BFF;
            text-decoration: none;
            border-radius: 0.2rem;
            border: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .page-link:hover {
            background-color: #007BFF;
            color: #fff;
        }

        .page-item.active .page-link {
            background-color: #007BFF;
            color: #fff;
            border-color: #007BFF;
        }

        /* Disabled state styling */
        .page-item.disabled .page-link {
            color: #ccc;
            border-color: #ddd;
            pointer-events: none;
        }

        .page-item.disabled .page-link:hover {
            background-color: transparent;
            color: #ccc;
        }

        /* Footer */
        footer {
            width: 100%;
            background-color: #212529;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: auto; /* Menempatkan footer di bawah */
        }

        /* Flexbox centering for pagination */
        .pagination-container nav > div {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px; /* jarak antara info dan pagination */
        }

    </style>
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.header') <!-- biar bisa ditampilkan disini -->

    <main class="flex-shrink-0"> <!-- menyesuaikan isi contentnya -->
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Memanggil footer dari layout -->
    @include('layouts.footer')

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>