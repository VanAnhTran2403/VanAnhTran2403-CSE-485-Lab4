edit.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tên sách</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">tác giả</label>
                <textarea class="form-control" id="author" name="author" required>{{ $book->author }}</textarea>
            </div>
            <div class="form-group">
                <label for="long_description">thể loại</label>
                <textarea class="form-control" id="category" name="category">{{ $book->category }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="long_description">năm xuất bản</label>
                <input type="number" min="1800" class="form-control" id="year" name="year" value={{ $book->year }}>
            </div>
            
            <div class="form-group">
                <label for="quantity">số lượng trong thư viện:</label>
                <input type="number" min="1"  id="quantity" name="quantity" value={{ $book->quantity }}>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
