<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dosen</title>
</head>
<body>
    <h1>Edit Dosen</h1>

    <form action="/dosen/{{ $dosen->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>NIDN</label><br>
            <input type="text" name="nidn" value="{{ $dosen->nidn }}">
        </div>
        <br>

        <div>
            <label>Nama Dosen</label><br>
            <input type="text" name="nama_dosen" value="{{ $dosen->nama_dosen }}">
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ $dosen->email }}">
        </div>
        <br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="/dosen">Kembali</a>
</body>
</html>
