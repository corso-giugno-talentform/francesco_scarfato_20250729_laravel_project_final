<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Libri</h1>
    <ul>
    @foreach ($books as $book)
        <li>{{ $book->name}} </li>
    @endforeach
    </ul>
</body>
</html>