<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>Data Peserta Lolos</h1>

<table id="customers">
    <tr>
        <th>Nama</th>
        <th>Posisi</th>
        <th>Status</th>
    </tr>
    <tr>
        @foreach ($lamarans as $row)
            <td>{{ $row->profile->user->name }}</td>
            <td>{{ $row->lowongan->posisi}}</td>
            <td>{{ $row->profile->user->status_user }}</td>
        @endforeach
    </tr>
</table>

</body>
</html>



