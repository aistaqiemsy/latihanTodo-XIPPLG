
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Tugas</title>
</head>
<body>
    <form action="/tugas/simpanPembaruanTugas/{{ $a->id }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Tugas</td>
                <td><input type="text" name="perbaruiTugas" value="{{ $a->tugas }}"></td>
            </tr>
            <tr>
                <td>Waktu Mulai</td>
                <td><input type="text" name="perbaruiMulai" value="{{ $a->waktu_mulai }}"></td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td><input type="text" name="perbaruiSelesai" value="{{ $a->waktu_selesai }}"></td>
            </tr>
            <tr>
                <td>Tugas Dari</td>
                <td><input type="text" name="perbaruiDari" value="{{ $a->tugas_dari }}"></td>
            </tr>
            <tr>
                <td>Tugas Untuk</td>
                <td><input type="text" name="perbaruiUntuk" value="{{ $a->tugas_untuk }}"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="perbaruiKeterangan" value="{{ $a->keterangan }}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Perbarui"></td>
            </tr>
        </table>
    </form>
</body>
</html>