@extends('layouts.admin')

@section('title', 'Danh sách User')

@section('content')
    <h1>Danh sách User</h1>

    <div style="margin-bottom: 16px;">
        <a href="{{ route('users.create') }}">
            <button>Thêm User</button>
        </a>
    </div>

    @php
        $users = [
            ['id' => 1, 'full_name' => 'Nguyen Van A', 'email' => 'a@example.com', 'role' => 'admin'],
            ['id' => 2, 'full_name' => 'Tran Thi B', 'email' => 'b@example.com', 'role' => 'user'],
            ['id' => 3, 'full_name' => 'Le Van C', 'email' => 'c@example.com', 'role' => 'user'],
        ];
    @endphp

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>
                        <a href="{{ route('users.show', $user['id']) }}">
                            {{ $user['full_name'] }}
                        </a>
                    </td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['role'] }}</td>
                    <td>
                        <a href="{{ route('users.show', $user['id']) }}">
                            <button>Xem</button>
                        </a>

                        <a href="{{ route('users.edit', $user['id']) }}">
                            <button>Sửa</button>
                        </a>

                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection