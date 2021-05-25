<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>books</title>
</head>
<body>
<div class="row">
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام کتاب</th>
                <th scope="col">سال نشر</th>
                <th scope="col">قیمت</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row"> {{$book->id}}</th>
                    <td>{{$book->title}}</td>
{{--                    <td>{{ Verta($book->year)}}</td>--}}
                    <td>{{ $book->year}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <button class="btn btn-danger">حذف</button>
                        @if($book->user_id == $user_id)
                            <button class="btn btn-info">ویرایش</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<hr>
<div>
    {{ $books->links() }}
</div>
</body>
</html>
