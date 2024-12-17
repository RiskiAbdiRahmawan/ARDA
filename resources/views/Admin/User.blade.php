@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">User Management</h1>
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Role</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->user_id }}</td>
                        <td class="border px-4 py-2">{{ $user->nama }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->role }}</td>
                        <td class="border px-4 py-2">
                            <button onclick="editUser({{ $user }})" class="text-blue-500">Edit</button>
                            <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 id="modal-title" class="text-lg font-bold mb-4">Create User</h2>
        <form id="user-form" action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="hidden" id="_method" name="_method" value="POST">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" id="password" name="password" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role:</label>
                <input type="text" id="role" name="role" value="{{ old('role') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('user-form').reset();
        document.getElementById('_method').value = 'POST';
        document.getElementById('modal-title').textContent = 'Create User';
    }

    function editUser(user) {
        openModal();
        document.getElementById('modal-title').textContent = 'Edit User';
        document.getElementById('user-form').action = `/users/${user.user_id}`;
        document.getElementById('_method').value = 'PUT';
        document.getElementById('nama').value = user.nama;
        document.getElementById('email').value = user.email;
        document.getElementById('role').value = user.role;
        document.getElementById('password').value = user.password;
    }
</script>
@endsection
