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
                        <form method="POST" action="{{url("book/stock/" . $book->id)}}">
                            <tr style="text-align: right;">
                                <td>{{$book->id}}</td>
                                <td>{{$book->title}}</td>
                                <td>{{ Verta::instance($book->year)->format('Y')}}</td>
                                <td>{{$book->price}}</td>
                                <td>

                                    @csrf
                                    <input id="stock" type="number" name="stock"
                                           class="form-control @error('stock') is-invalid @enderror" name="stock"
                                           required
                                           autocomplete="stock" style="width: auto">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-info">ثبت</button>
                                    <a class="btn btn-danger" href="/book/delete/{{$book->id}}">عدم تایید</a>
                                </td>
                            </tr>
                        </form>
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
