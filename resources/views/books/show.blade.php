@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết book</h1>
        <p><strong>Tên sách:</strong> {{ $book->name }}</p>
        <p><strong>Tác giả:</strong> {{ $book->author }}</p>
        <p><strong>Thể loại:</strong> {{ $book->category }}</p>
        <p><strong>Năm xuất bản:</strong> {{ $book->year }}</p>
        <p><strong>Tổng số lượng sách:</strong> {{ $book->quantity }}</p>
        <p><strong>Số lượng sách đã mượn:</strong> {{ $book->quantity - $book->remaining_quantity }}</p>
        <p><strong>Còn lại:</strong> {{ $book->remaining_quantity }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>

    <h3 class="my-4 text-danger">Danh sách sinh viên đang mượn sách</h3>


    <table class="table">
            <thead>
                <tr>
                    <td>STT</td>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($readers as $reader)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td class="text-danger">{{ $reader->pivot->status==1?'đang mượn':'Đã trả' }}</td>
                        <td>
                            <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
