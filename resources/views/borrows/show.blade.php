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
        <p><strong>Borrow date:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Return date:</strong> {{ $borrow->return_date }}</p>
        <p><strong>Status:</strong> {{ $borrow->status==1?"Đang mượn":"Đã trả" }}</p>


        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
