<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $items = Pengeluaran::latest()->paginate(10);

        return view('admin.pengeluaran.index', [
            'items' => $items,
            'total' => Pengeluaran::sum('jumlah'),
        ]);
    }

    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:0'],
        ]);

        Pengeluaran::create($validated);

        return redirect()
            ->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('admin.pengeluaran.edit', [
            'item' => $pengeluaran,
        ]);
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:0'],
        ]);

        $pengeluaran->update($validated);

        return redirect()
            ->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()
            ->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
