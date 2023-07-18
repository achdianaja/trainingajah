<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h2 class="fw-bold mb-2">Tambah Data tim</h2>
        <form action="/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Negara</label>
                <input name="negara" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Negara">
            </div>
            @error('name')
                <span><p class="text-danger">{{ $message }}</p></span>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Poin Club</label>
                <input name="poin" type="text" class="form-control" id="exampleFormControlInput2" placeholder="Poin">
            </div>
            @error('poin')
            <span><p class="text-danger">{{ $message }}</p></span>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Posisi</label>
                <input name="posisi" type="text" class="form-control" id="exampleFormControlInput3" placeholder="Posisi club">
            </div>
            @error('posisi')
            <span><p class="text-danger">{{ $message }}</p></span>
            @enderror
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

</body>

</html>
