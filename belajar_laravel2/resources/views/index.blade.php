<!DOCTYPE html>
<html>
<head>
    <title>Tutorial Membuat Pencarian Pada Laravel - www.malasngoding.com</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            padding: 8px 12px;
            border: 1px solid #000;
        }

        /* Pagination styling */
        .pagination {
            margin-top: 20px;
            display: flex;
            list-style: none;
        }

        .pagination li {
            margin: 0 4px;
        }

        .pagination li a,
        .pagination li span {
            padding: 4px 8px;
            border: 1px solid #ccc;
            color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .pagination li.active span {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #888;
            border-color: #ddd;
        }

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            background: #2d89ef;
            color: white;
        }

        .btn-danger {
            background: #d9534f;
        }

        .btn-add {
            background: #5cb85c;
            margin-bottom: 15px;
            display: inline-block;
        }

    </style>
</head>
<body>

    <h2>
        <a href="https://www.malasngoding.com">www.malasngoding.com</a>
    </h2>

    <h3>Data Pegawai</h3>

    {{-- Tombol Tambah --}}
    <a href="/pegawai/tambah" class="btn-add">+ Tambah Pegawai Baru</a>

    <p>Cari Data Pegawai :</p>

    <form action="/pegawai/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Pegawai.." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <br>

    <table>
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>

        @foreach ($pegawai as $p)
        <tr>
            <td>{{ $p->pegawai_nama }}</td>
            <td>{{ $p->pegawai_jabatan }}</td>
            <td>{{ $p->pegawai_umur }}</td>
            <td>{{ $p->pegawai_alamat }}</td>

            <td>
                <a href="/pegawai/edit/{{ $p->pegawai_id }}" class="btn">Edit</a>
                <a href="/pegawai/hapus/{{ $p->pegawai_id }}" class="btn btn-danger"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>

    <br>

    <div>
        Halaman : {{ $pegawai->currentPage() }} <br>
        Jumlah Data : {{ $pegawai->total() }} <br>
        Data Per Halaman : {{ $pegawai->perPage() }} <br>
    </div>

    <br>

    {{-- PAGINATION --}}
    {{ $pegawai->links() }}

</body>
</html>
