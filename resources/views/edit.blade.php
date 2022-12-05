<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h2 class="fw-bold mb-2">Edit Data</h2>
        <form action="/create" method="POST">
            @method('put')
            @csrf
            @foreach ($users as $user)
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput2" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput3" value="{{ $user->password }}">
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

</body>

</html>