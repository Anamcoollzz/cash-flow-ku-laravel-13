@extends('admin.layout', [
    'title' => 'Pemasukan | Cash Flow KU',
    'pageTitle' => 'CRUD Pemasukan',
])

@section('content')
    <section class="fade-up rounded-3xl border border-amber-200 bg-white p-6 shadow-sm">
        <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-bold text-stone-900">Daftar Pemasukan</h3>
                <p class="text-sm text-stone-700">Total pemasukan: Rp{{ number_format($total, 0, ',', '.') }}</p>
            </div>
            <a href="{{ route('admin.pemasukan.create') }}" class="inline-flex items-center justify-center rounded-xl bg-stone-700 px-4 py-2 text-sm font-semibold text-amber-50 transition hover:bg-stone-800">+ Tambah Pemasukan</a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-2xl border border-amber-200">
            <table class="min-w-full bg-white text-sm">
                <thead class="bg-amber-50 text-left text-stone-800">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                        <th class="px-4 py-3 font-semibold">Kategori</th>
                        <th class="px-4 py-3 font-semibold">Deskripsi</th>
                        <th class="px-4 py-3 font-semibold">Jumlah</th>
                        <th class="px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="border-t border-amber-100">
                            <td class="px-4 py-3 text-stone-800">{{ $item->tanggal->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 text-stone-900">{{ $item->kategori }}</td>
                            <td class="px-4 py-3 text-stone-700">{{ $item->deskripsi ?: '-' }}</td>
                            <td class="px-4 py-3 font-semibold text-stone-900">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.pemasukan.edit', $item) }}" class="rounded-lg border border-amber-300 px-3 py-1.5 text-xs font-semibold text-stone-800 transition hover:bg-amber-100">Edit</a>
                                    <form method="POST" action="{{ route('admin.pemasukan.destroy', $item) }}" onsubmit="return confirm('Hapus data pemasukan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:bg-red-50">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-stone-700">Belum ada data pemasukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $items->links() }}</div>
    </section>
@endsection
