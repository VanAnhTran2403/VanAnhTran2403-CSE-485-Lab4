@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới borrow</h1>
        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reader_id">Độc giả</label>
                <select  name="reader_id" id="reader_id">
                    <option value="" disabled>select reader</option>
                    @foreach ($readers as $reader)
                        <option value={{$reader->id}}>
                            <p>Name: {{$reader->name}} -- Phone: {{$reader->phone}}</p>
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Sách</label>
                <select  name="book_id" id="book_id">
                    <option value="" disabled>select reader</option>
                    @foreach ($books as $book)
                        @if ($book->remaining_quantity == 0)
                            <option disabled value={{$book->id}}>
                                <p>Name: {{$book->name}} -- Remaining_quantity: {{$book->remaining_quantity}}</p>
                            </option>
                        @else
                        <option value={{$book->id}}>
                                <p>Name: {{$book->name}} -- Remaining_quantity: {{$book->remaining_quantity}}</p>
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="long_description">Ngày mượn</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date"></input>
            </div>
            <div class="form-group">
                <label for="long_description">Ngày trả</label>
                <input type="date" class="form-control" id="return_date" name="return_date"></input>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
