@extends('layouts.app')


@section('title', "Trang borrows")


@section('content')
    <div class="container">
        <h1>Danh sách borrow</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book name</th>
                    <th>Category</th>
                    <th>Reader name</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book_name }}</td>
                        <td>{{ $borrow->category }}</td>
                        <td>{{ $borrow->reader_name }}</td>
                        <td>{{ $borrow->phone }}</td>
                        @if ($borrow->status==1)
                            <td class="text-danger">Đang mượn</td>
                        @else
                            <td class="text-success">Đã trả</td>
                        @endif
                        <td>
                            <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
