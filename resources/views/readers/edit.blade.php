edit.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa reader</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tên độc giả</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Ngày sinh</label>
                <input type="date" id="birthday" name="birthday" required value={{ $reader->birthday }}>
            </div>
            <div class="form-group">
                <label for="long_description">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address">{{ $reader->address }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="long_description">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value={{ $reader->phone }}>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
