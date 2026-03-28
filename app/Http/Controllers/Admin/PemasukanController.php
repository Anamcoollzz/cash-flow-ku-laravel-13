<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $items = Pemasukan::latest()->paginate(10);

        return view('admin.pemasukan.index', [
            'items' => $items,
            'total' => Pemasukan::sum('jumlah'),
        ]);
    }

    public function create()
    {
        return view('admin.pemasukan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:0'],
        ]);

        Pemasukan::create($validated);

        return redirect()
            ->route('admin.pemasukan.index')
            ->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('admin.pemasukan.edit', [
            'item' => $pemasukan,
        ]);
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:0'],
        ]);

        $pemasukan->update($validated);

        return redirect()
            ->route('admin.pemasukan.index')
            ->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()
            ->route('admin.pemasukan.index')
            ->with('success', 'Data pemasukan berhasil dihapus.');
    }
}
