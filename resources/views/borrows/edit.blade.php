edit.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa borrows</h1>
        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="reader_id">Độc giả</label>
                <select  name="reader_id" id="reader_id">
                    @foreach ($readers as $reader)
                        @if ($reader->id == $borrow->reader_id)
                            <option selected value={{$reader->id}}>
                                <p>Name: {{$reader->name}} -- Phone: {{$reader->phone}}</p>
                            </option>
                        @endif
                        <option value={{$reader->id}}>
                            <p>Name: {{$reader->name}} -- Phone: {{$reader->phone}}</p>
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Sách</label>
                <select  name="book_id" id="book_id">
                    @foreach ($books as $book)
                        @if ($book->remaining_quantity == 0)
                            <option disabled value={{$book->id}}>
                                <p>Name: {{$book->name}} -- Remaining_quantity: {{$book->remaining_quantity}}</p>
                            </option>
                        @else
                            @if ($book->id == $borrow->book_id)
                                <option selected value={{$book->id}}>
                                    <p>Name: {{$book->name}} -- Remaining_quantity: {{$book->remaining_quantity}}</p>
                                </option>
                            @endif
                            <option value={{$book->id}}>
                                <p>Name: {{$book->name}} -- Remaining_quantity: {{$book->remaining_quantity}}</p>
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="long_description">Ngày mượn</label>
                <input type="date" class="form-control" id="borrow_date" value={{$borrow->borrow_date}} name="borrow_date"></input>
            </div>
            <div class="form-group">
                <label for="long_description">Ngày trả</label>
                <input type="date" class="form-control" id="return_date" value={{$borrow->return_date}} name="return_date"></input>
            </div>
            <div class="form-group">
                <label for="long_description">Status</label>
                <select name="status" id="status">
                    @if ($borrow->status == 1){
                        <!-- <p>Lỗi</p> -->
                        <option selected value="1">Đang mượn</option>
                        <option value="2">Đã trả</option>
                    }
                    @else
                        <option  value="1">Đang mượn</option>
                        <option selected value="2">Đã trả</option>
                    @endif
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
