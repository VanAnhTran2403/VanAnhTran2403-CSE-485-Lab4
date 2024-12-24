@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tên sách</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Tác giả</label>
                <textarea class="form-control" id="author" name="author" required></textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Thể Loại</label>
                <textarea class="form-control" id="category" name="category"></textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Năm xuất bản</label>
                <input type="number" min="1800" max="2024" id="year" name="year"></>
            </div>
            <div class="form-group">
                <label for="long_description">Số lượng sách trong thư viện</label>
                <input type="number" min="1" id="quantity" name="quantity"></input>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
