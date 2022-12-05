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
        <h2 class="fw-bold">Import Data</h2>
        <form action="/import" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input name="file" class="form-control" type="file" id="formFile">
            </div>
            <button class="btn btn-primary" type="submit">Import Data</button>
        </form>
    </div>

</body>

</html>
