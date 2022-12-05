<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>PDF</title>
</head>
<body>

    <h2 class="fw-bold">Data User</h2>
    <table border="1">
        <tr>
        <th>No</th>
        <td>Nama</td>
        <td>Email</td>
        </tr>
        @foreach ($user as $u)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>