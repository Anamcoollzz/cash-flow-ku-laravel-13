@extends('admin.layout', [
    'title' => 'Edit Pemasukan | Cash Flow KU',
    'pageTitle' => 'Edit Pemasukan',
])

@section('content')
    <section class="fade-up max-w-3xl rounded-3xl border border-amber-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-bold text-stone-900">Form Edit Pemasukan</h3>

        @if ($errors->any())
            <div class="mt-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.pemasukan.update', $item) }}" class="mt-5 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="tanggal" class="mb-1 block text-sm font-semibold text-stone-800">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $item->tanggal->format('Y-m-d')) }}" class="w-full rounded-xl border border-amber-300 px-3 py-2.5 text-sm focus:border-amber-500 focus:outline-none" required>
            </div>
            <div>
                <label for="kategori" class="mb-1 block text-sm font-semibold text-stone-800">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $item->kategori) }}" class="w-full rounded-xl border border-amber-300 px-3 py-2.5 text-sm focus:border-amber-500 focus:outline-none" required>
            </div>
            <div>
                <label for="deskripsi" class="mb-1 block text-sm font-semibold text-stone-800">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full rounded-xl border border-amber-300 px-3 py-2.5 text-sm focus:border-amber-500 focus:outline-none">{{ old('deskripsi', $item->deskripsi) }}</textarea>
            </div>
            <div>
                <label for="jumlah" class="mb-1 block text-sm font-semibold text-stone-800">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $item->jumlah) }}" min="0" step="0.01" class="w-full rounded-xl border border-amber-300 px-3 py-2.5 text-sm focus:border-amber-500 focus:outline-none" required>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="rounded-xl bg-stone-700 px-4 py-2.5 text-sm font-semibold text-amber-50 transition hover:bg-stone-800">Update</button>
                <a href="{{ route('admin.pemasukan.index') }}" class="rounded-xl border border-amber-300 px-4 py-2.5 text-sm font-semibold text-stone-800 transition hover:bg-amber-100">Batal</a>
            </div>
        </form>
    </section>
@endsection
