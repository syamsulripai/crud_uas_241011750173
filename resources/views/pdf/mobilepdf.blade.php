<!DOCTYPE html>
<html>

<head>

    <title>Laporan Data Aplikasi Mobile</title>

    <style>

        body{

            font-family: Arial;

            font-size:12px;

        }

        table{

            width:100%;

            border-collapse:collapse;

        }

        table,th,td{

            border:1px solid black;

        }

        th,td{

            padding:8px;

        }

        h2{

            text-align:center;

        }

    </style>

</head>

<body>

<h2>Laporan Data Aplikasi Mobile</h2>

<table>

<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Developer</th>

<th>Versi</th>

<th>Deskripsi</th>

</tr>

</thead>

<tbody>

@foreach($mobileApps as $mobile)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $mobile->nama_aplikasi }}</td>

<td>{{ $mobile->developer }}</td>

<td>{{ $mobile->versi }}</td>

<td>{{ $mobile->deskripsi }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>