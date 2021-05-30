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
                    <th scope="col">عملیات</th>
                    <th scope="col">نام کتاب</th>
                    <th scope="col">زمان</th>
                    <th scope="col">نام کاربر</th>
                </tr>
                </thead>

                <tbody>
                @foreach($books as $book)

                    @if($book->deleted_at != null)
                        <tr style="text-align: right;">
                            <td> {{'حذف'}} </td>
                            <td>{{$book->title}}</td>
                            <td>
                                {{ Verta::instance($book->deleted_at)->format('h:m y/m/d')}}
                            </td>
                            <td>{{ $book->user->name }}</td>
                        </tr>
                    @endif

                    <tr style="text-align: right;">
                        <td>
                            @if($book->updated_at > $book->created_at)
                                {{'ویرایش'}}
                            @else
                                {{'ثبت'}}
                            @endif
                        </td>
                        <td>{{$book->title}}</td>
                        <td>
                            @if($book->updated_at > $book->created_at)
                                {{ Verta::instance($book->updated_at)->format('h:m y/m/d')}}
                            @else
                                {{Verta::instance($book->created_at)->format('h:m y/m/d')}}
                            @endif
                        </td>

                        <td>{{ $book->user->name }}</td>

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
@endsection
