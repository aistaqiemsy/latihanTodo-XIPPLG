{{-- {{ $detailTodo }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penugasan</title>
</head>
<body>
    Informasi Penugasan 
    <table>
        <tr>
            <td>Tugas</td>
            <td>{{ $detailTodo->tugas }}</td>
        </tr>
        <tr>
            <td>Waktu Ditugaskan</td>
            <td>{{ $detailTodo->waktu_mulai }}</td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td>{{ $detailTodo->waktu_selesai }}</td>
        </tr>
        <tr>
            <td>Tugas Dari</td>
            <td>{{ $detailTodo->tugas_dari }}</td>
        </tr>
        <tr>
            <td>Tugas Untuk</td>
            <td>{{ $detailTodo->tugas_untuk }}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>{{ $detailTodo->keterangan }}</td>
        </tr>
    </table>
    <a href="/tugas/perbaruiTugas/{{ $detailTodo->id }}">Perbarui Penugasan</a>
</body>
</html>