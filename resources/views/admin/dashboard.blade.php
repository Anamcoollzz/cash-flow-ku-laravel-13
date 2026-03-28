@extends('admin.layout', [
    'title' => 'Dashboard Admin | Cash Flow KU',
    'pageTitle' => 'Kerangka Fitur Aplikasi',
])

@section('content')
    <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-stone-700">Total User</p>
            <p class="mt-2 text-3xl font-extrabold text-stone-900">0</p>
            <p class="mt-2 text-sm text-stone-700">Placeholder statistik user</p>
        </article>
        <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 70ms;">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-stone-700">Total Pemasukan</p>
            <p class="mt-2 text-3xl font-extrabold text-stone-900">{{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}</p>
            <p class="mt-2 text-sm text-stone-700">Akumulasi pemasukan</p>
        </article>
        <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 140ms;">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-stone-700">Total Pengeluaran</p>
            <p class="mt-2 text-3xl font-extrabold text-stone-900">{{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</p>
            <p class="mt-2 text-sm text-stone-700">Akumulasi pengeluaran</p>
        </article>
        <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 210ms;">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-stone-700">Saldo</p>
            <p class="mt-2 text-3xl font-extrabold text-stone-900">{{ number_format(($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0), 0, ',', '.') }}</p>
            <p class="mt-2 text-sm text-stone-700">Selisih pemasukan dan pengeluaran</p>
        </article>
    </section>

    <section class="fade-up rounded-3xl border border-amber-200 bg-white p-6 shadow-sm" style="animation-delay: 280ms;">
        <h3 class="text-xl font-bold text-stone-900">Modul CRUD Keuangan</h3>
        <p class="mt-2 max-w-3xl text-sm leading-relaxed text-stone-700">
            Gunakan modul di bawah untuk mengelola data kas harian. Semua halaman sudah siap untuk proses tambah, ubah, hapus, dan melihat daftar data.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <a href="{{ route('admin.pemasukan.index') }}" class="rounded-2xl border border-dashed border-amber-300 bg-amber-50 p-4 text-sm font-semibold text-stone-800 transition hover:bg-amber-100">Kelola Pemasukan</a>
            <a href="{{ route('admin.pengeluaran.index') }}" class="rounded-2xl border border-dashed border-amber-300 bg-amber-50 p-4 text-sm font-semibold text-stone-800 transition hover:bg-amber-100">Kelola Pengeluaran</a>
        </div>
    </section>
@endsection
