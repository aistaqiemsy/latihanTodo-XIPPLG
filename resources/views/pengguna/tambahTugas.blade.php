<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
</head>
<body>
    {{-- {{ $dataPegawais}} --}}
    <form action="/tugas/simpanTugasBaru" method="post">
        @csrf
        <table>
        <tr>
            <td>Nama Tugas</td>
            <td><input type="text" name="namaTugas"></td>
        </tr>
        <tr>
            <td>Waktu Mulai</td>
            <td><input type="date" name="mulaiTugas"></td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td><input type="date" name="selesaiTugas"></td>
        </tr>
        <tr>
            <td>Tugas Dari</td>
            <td>
                {{-- <input type="text" name="tugasDari"> --}}
                <select name="tugasDari">
                    @foreach ($pemberiTugas as $pemberi)
                        <option value="{{ $pemberi->id}}">{{ $pemberi->nama}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Tugas Untuk</td>
            <td>
                {{-- <input type="text" name="tugasUntuk"> --}}
                <select name="tugasUntuk">
                    @foreach ($pelaksanaTugas as $pelaksana)
                        <option value="{{ $pelaksana->id}}">{{ $pelaksana->nama}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keteranganTugas"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    </form>
</body>
</html>