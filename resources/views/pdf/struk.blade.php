<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=58mm, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Belanja</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            width: 43mm; /* Lebar kertas Thermal 58 mm */
            margin: 0;
            padding: 0;
            margin-left: -50px; Posisikan konten ke kiri
        }
        h1, h2 {
            text-align: center;
            font-size: 14px; /* Ukuran teks untuk judul lebih besar */
            margin: 5px 0; /* Jarak antara judul */
        }
        p, th, td {
            font-size: 10px; /* Ukuran teks umum untuk data */
            margin: 2px 0; /* Jarak antar elemen */
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px; /* Jarak atas tabel */
        }
        th, td {
            padding: 3px; /* Padding lebih kecil */
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
        hr {
            border: none; /* Menghilangkan garis pemisah */
            border-top: 1px dashed #ccc; /* Garis putus-putus sebagai pemisah */
            margin: 5px 0; /* Jarak antara garis pemisah dengan konten */
        }
        .footer {
            font-size: 8px; /* Ukuran teks untuk footer lebih kecil */
            text-align: center;
            margin-top: 5px; /* Jarak atas footer */
        }
    </style>
</head>
<body>
    <h1>Toko Arlen Grosir</h1>
    <p class="center">Kelurahan Balam Sempurna Kota, 
        Kecamatan Balai Jaya, Kabupaten Rokan Hilir, Provinsi Riau.</p>

    <p class="center">No Transaksi: {{ $data['no_sale'] }}</p>
    <p class="center">Tanggal: {{ $data['date'] }}</p>
    <p class="center">Nama Kasir: {{ $data['name_cashier'] }}</p>

    <h2 class="center">Detail Belanja</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th class="center">Jml</th>
                <th class="right">Harga</th>
                <th class="right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
            <tr>
                <td>{{ $detail->name_product }}</td>
                <td class="center">{{ $detail->qty }}</td>
                <td class="right">{{ number_format($detail->unit_price, 2, ',', '.') }}</td>
                <td class="right">{{ number_format($detail->total, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="right">Diskon: {{ number_format($data['discount'], 2, ',', '.') }}</p>
    <p class="right">Subtotal: {{ number_format($data['subtotal'], 2, ',', '.') }}</p>
    <p class="right total">Total Bayar: {{ number_format($data['total_payment'], 2, ',', '.') }}</p>
    <p class="right">Tunai: {{ number_format($data['cash'], 2, ',', '.') }}</p>
    <p class="right">Kembalian: {{ number_format($data['return'], 2, ',', '.') }}</p>

    <hr>
    <p class="center footer">Terima Kasih atas Kunjungan Anda</p>
</body>
</html>
