@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <a class="btn btn-info" href="/home">بازگشت</a>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">نام کتاب</th>
                    <th scope="col">سال نشر</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">موجودی</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($books as $book)

                    @can('validation', $book)
                        <tr style="text-align: right;">
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{ Verta::instance($book->year)->format('Y')}}</td>
                            <td>{{$book->price}}</td>
                            <td>
                                <form action="">
                                    <input type="number" name="stock" >
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="/book/edit/{{$book->id}}">ثبت</a>

                            </td>
                        </tr>
                    @endcan
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div>
        {{ $books->links() }}
    </div>
@endsection
