@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <a class="btn btn-info" href="/book/create">ثبت کتاب</a>
            <a class="btn btn-warning" href="#">تاریخچه تغییرات</a>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">نام کتاب</th>
                    <th scope="col">سال نشر</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">امتیاز</th>
                    <th scope="col">ثبت امتیاز</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($books as $book)
                    <tr style="text-align: right;">
                        <td>{{$book->title}}</td>
                        <td>{{ Verta::instance($book->year)->format('Y')}}</td>
                        <td>{{$book->price}}</td>
                        <td>{{ round($book->ratings->avg('rate'), 1) }}</td>
                        <td>
                            <input type="range" class="form-range" min="1" max="5" step="1"
                                   value="{{round($book->ratings->avg('rate'), 1)}}">

                        </td>
                        <td>
                            <a class="btn btn-info" href="/book/edit/{{$book->id}}">ویرایش</a>
                            @if($book->user_id == $user_id)
                                <a class="btn btn-danger" href="/book/delete/{{$book->id}}">حذف</a>
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
@endsection
