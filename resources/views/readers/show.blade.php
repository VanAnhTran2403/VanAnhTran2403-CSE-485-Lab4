@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết reader</h1>
        <p><strong>Tên độc giả:</strong> {{ $reader->name }}</p>
        <p><strong>Ngày sinh:</strong> {{ $reader->birthday }}</p>
        <p><strong>Địa chỉ:</strong> {{ $reader->address }}</p>
        <p><strong>Số điện thoại:</strong> {{ $reader->phone }}</p>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>

    <h3>Danh sách sách đang và đã mượn</h3>

    <table class="table my-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->pivot->borrow_date }}</td>
                        <td>{{ $book->pivot->return_date }}</td>
                        
                        @if ($book->pivot->status==1)
                            <td class="text-danger">Đang mượn</td>
                        @else
                            <td class="text-success" >Đã trả</td>
                        @endif
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
@endsection
