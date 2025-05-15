
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penugasan</title>
</head>
<body>
    Data Penugasan
    <br>

    <a href="/tugas/tambahTugas">Tambah Tugas</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Tugas</th>
            <th>Pemberi Tugas</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach ( $dataTodos as $todo )
        <tr>
            <td>{{ $todo->id}}</td>
            <td>{{ $todo->tugas}}</td>
            <td>{{ $todo->pemberi_tugas}}</td>
            <td>{{ $todo->keterangan }}</td>
            <td>
                <a href="/tugas/detailTugas/{{ $todo->id }}">Detail Tugas</a> | 
                <a href="/tugas/hapusTugas/{{ $todo->id }}">Hapus</a></td>
        </tr>        
        @endforeach
    </table>
</body>
</html>