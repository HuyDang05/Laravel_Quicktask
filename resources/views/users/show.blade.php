@extends('layouts.admin')

@section('title', 'Chi tiết User')

@section('content')
    @php
        $user = [
            'id' => 1,
            'full_name' => 'Nguyen Van A',
            'email' => 'a@example.com',
            'role' => 'admin',
        ];

        $tasks = [
            ['id' => 1, 'title' => 'Hoc Laravel Model', 'is_done' => true],
            ['id' => 2, 'title' => 'Tao relationship', 'is_done' => true],
            ['id' => 3, 'title' => 'Lam giao dien Blade', 'is_done' => false],
        ];
    @endphp

    <h1>Chi tiết User</h1>

    <p><strong>ID:</strong> {{ $user['id'] }}</p>
    <p><strong>Họ tên:</strong> {{ $user['full_name'] }}</p>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
    <p><strong>Vai trò:</strong> {{ $user['role'] }}</p>

    <div style="margin: 16px 0;">
        <a href="{{ route('users.index') }}">
            <button>Quay lại</button>
        </a>

        <a href="{{ route('users.edit', $user['id']) }}">
            <button>Sửa User</button>
        </a>

        <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Xóa User</button>
        </form>
    </div>

    <hr>

    <h2>Danh sách Task của User</h2>

    <div style="margin-bottom: 16px;">
        <a href="{{ route('tasks.create') }}">
            <button>Thêm Task</button>
        </a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task['id'] }}</td>
                    <td>{{ $task['title'] }}</td>
                    <td>
                        {{ $task['is_done'] ? 'Hoàn thành' : 'Chưa hoàn thành' }}
                    </td>
                    <td>
                        <a href="{{ route('tasks.show', $task['id']) }}">
                            <button>Xem</button>
                        </a>

                        <a href="{{ route('tasks.edit', $task['id']) }}">
                            <button>Sửa</button>
                        </a>

                        <form action="{{ route('tasks.destroy', $task['id']) }}" method="POST" style="display: inline;">
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