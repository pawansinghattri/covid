<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


    <h1>Covid 19 Results</h1>
    <form action="" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="Search">
        <button class="btn btn-primary" type="submit">Submit</button>
</form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Country</th>
            <th scope="col">Country Code</th>
            <th scope="col">Total Confirmed Cases</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($search as $record )
            <tr>
                <th scope="row">{{$record['id']}}</th>
                <td>{{$record['Country']}}</td>
                <td>{{$record['CountryCode']}}</td>
                <td>{{$record['TotalConfirmed']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href={{url('/')}}>All Countries</a>

</body>
</html>
