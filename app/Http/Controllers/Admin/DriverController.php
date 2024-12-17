<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class DriverController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null
        $drivers = Driver::with('user')->get();
        return view('Admin.Driver', compact('drivers', 'email', 'role'));
    }

    public function create()
    {
        $users = User::all();
        return view('drivers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_lisensi' => 'required|unique:drivers',
            'nomor_telepon' => 'required',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $driver = Driver::create($request->all());
        Log::create([
            'action' => 'create',
            'model' => 'Driver',
            'model_id' => $driver->driver_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan driver dengan nama: ' . $driver->nama,
        ]);
        return redirect()->route('drivers.index')->with('success', 'Driver berhasil ditambahkan');
    }

    public function edit(Driver $driver)
    {
        $users = User::all();
        return view('drivers.edit', compact('driver', 'users'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_lisensi' => 'required|unique:drivers,nomor_lisensi,' . $driver->driver_id . ',driver_id',
            'nomor_telepon' => 'required',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $driver->update($request->all());
        Log::create([
            'action' => 'update',
            'model' => 'Driver',
            'model_id' => $driver->driver_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Mengubah driver dengan nama: ' . $driver->nama,
        ]);
        return redirect()->route('drivers.index')->with('success', 'Driver berhasil diperbarui');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        Log::create([
            'action' => 'delete',
            'model' => 'Driver',
            'model_id' => $driver->driver_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menghapus driver dengan nama: ' . $driver->nama,
        ]);
        return redirect()->route('drivers.index')->with('success', 'Driver berhasil dihapus');
    }
}
