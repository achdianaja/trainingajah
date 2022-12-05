<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Excel</title>
</head>

<body>

    <div class="container">
        <h2 class="fw-bold">Data User</h2>
        <a class="btn btn-warning m-1 text-white" href="/import">Import Data</a>
        <a class="btn btn-primary m-1" href="/create">Tambah Data</a>
        <a class="btn btn-success m-1" href="/export">Export Excel</a>
        <a class="btn btn-danger m-1" href="/pdf">Export PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Negara</th>
                    <th scope="col">Poin</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $u->negara }}</td>
                    <td>{{ $u->poin }}</td>
                    <td>{{ $u->posisi }}</td>
                    <td>
                        <a class="btn btn-primary" href="/edit/{{ $u->id }}">Edit</a>
                        <a class="btn btn-danger" href="/hapus/{{ $u->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
