@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
        <table class="table" >
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
                        @if($book->user_id == $user_id)
                            <button class="btn btn-info">ویرایش</button>
                        @endif
                        <button class="btn btn-danger">حذف</button>
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
@endsection
