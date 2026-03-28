<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Cash Flow KU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brown-950: #1c120d;
            --brown-900: #2e1d14;
            --brown-800: #4a2f22;
            --brown-700: #6c462f;
            --brown-200: #efe4dc;
            --cream: #f8f1eb;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 12% 10%, rgba(108, 70, 47, 0.22), transparent 35%),
                radial-gradient(circle at 92% 0%, rgba(74, 47, 34, 0.16), transparent 40%),
                linear-gradient(180deg, #f8f1eb 0%, #f3e8dd 45%, #fdf8f4 100%);
        }

        @keyframes fade-up {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fade-up 420ms ease-out both;
        }
    </style>
</head>
<body class="min-h-screen text-stone-900">
    <div class="flex min-h-screen">
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full border-r border-amber-200/40 bg-gradient-to-b from-[var(--brown-900)] via-[var(--brown-800)] to-[var(--brown-950)] p-6 text-amber-50 shadow-2xl transition-transform duration-300 md:static md:translate-x-0">
            <div class="mb-8 flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 text-base font-extrabold tracking-tight">CF</div>
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-amber-100/80">Admin Panel</p>
                    <h1 class="text-lg font-bold">Cash Flow KU</h1>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="#" class="block rounded-xl bg-white/12 px-4 py-3 text-sm font-semibold text-white">Dashboard</a>
                <a href="#" class="block rounded-xl px-4 py-3 text-sm text-amber-50/90 transition hover:bg-white/12">Manajemen User</a>
                <a href="#" class="block rounded-xl px-4 py-3 text-sm text-amber-50/90 transition hover:bg-white/12">Transaksi</a>
                <a href="#" class="block rounded-xl px-4 py-3 text-sm text-amber-50/90 transition hover:bg-white/12">Laporan</a>
                <a href="#" class="block rounded-xl px-4 py-3 text-sm text-amber-50/90 transition hover:bg-white/12">Pengaturan</a>
            </nav>

            <div class="mt-8 rounded-2xl border border-white/10 bg-black/15 p-4">
                <p class="text-xs uppercase tracking-[0.18em] text-amber-100/70">Status Sistem</p>
                <p class="mt-2 text-sm font-semibold">Siap untuk pengembangan fitur lanjutan</p>
            </div>
        </aside>

        <div id="backdrop" class="fixed inset-0 z-30 hidden bg-black/40 md:hidden"></div>

        <div class="flex w-full flex-col">
            <header class="sticky top-0 z-20 border-b border-amber-200/80 bg-[rgba(248,241,235,0.92)] px-4 py-4 backdrop-blur md:px-8">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <button id="openSidebar" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-amber-300 bg-amber-50 text-[var(--brown-800)] transition hover:bg-amber-100 md:hidden" aria-label="Buka sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--brown-700)]">Dashboard Admin</p>
                            <h2 class="text-lg font-bold text-[var(--brown-900)] md:text-xl">Kerangka Fitur Aplikasi</h2>
                        </div>
                    </div>

                    <div class="relative" id="profileMenuWrap">
                        <button id="profileButton" class="inline-flex items-center gap-3 rounded-xl border border-amber-300 bg-white px-3 py-2 text-sm font-semibold text-[var(--brown-900)] shadow-sm transition hover:border-amber-400 hover:bg-amber-50" aria-expanded="false" aria-haspopup="true">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[var(--brown-700)] font-bold text-amber-50">AD</span>
                            <span class="hidden sm:block">Admin</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="profileDropdown" class="fade-up absolute right-0 mt-2 hidden w-56 overflow-hidden rounded-xl border border-amber-200 bg-white shadow-lg">
                            <a href="#" class="block px-4 py-3 text-sm text-[var(--brown-900)] transition hover:bg-amber-50">Profil Saya</a>
                            <a href="#" class="block px-4 py-3 text-sm text-[var(--brown-900)] transition hover:bg-amber-50">Pengaturan Akun</a>
                            <div class="border-t border-amber-100"></div>
                            @if (Route::has('logout'))
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-3 text-left text-sm font-semibold text-red-700 transition hover:bg-red-50">Sign Out</button>
                                </form>
                            @else
                                <button type="button" class="block w-full px-4 py-3 text-left text-sm font-semibold text-red-700 transition hover:bg-red-50">Sign Out</button>
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 md:px-8 md:py-8">
                <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brown-700)]">Total User</p>
                        <p class="mt-2 text-3xl font-extrabold text-[var(--brown-900)]">0</p>
                        <p class="mt-2 text-sm text-[var(--brown-700)]">Placeholder statistik user</p>
                    </article>
                    <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 70ms;">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brown-700)]">Transaksi Hari Ini</p>
                        <p class="mt-2 text-3xl font-extrabold text-[var(--brown-900)]">0</p>
                        <p class="mt-2 text-sm text-[var(--brown-700)]">Placeholder aktivitas transaksi</p>
                    </article>
                    <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 140ms;">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brown-700)]">Pendapatan</p>
                        <p class="mt-2 text-3xl font-extrabold text-[var(--brown-900)]">Rp0</p>
                        <p class="mt-2 text-sm text-[var(--brown-700)]">Placeholder nilai pemasukan</p>
                    </article>
                    <article class="fade-up rounded-2xl border border-amber-200 bg-white p-5 shadow-sm" style="animation-delay: 210ms;">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brown-700)]">Notifikasi</p>
                        <p class="mt-2 text-3xl font-extrabold text-[var(--brown-900)]">0</p>
                        <p class="mt-2 text-sm text-[var(--brown-700)]">Placeholder notifikasi sistem</p>
                    </article>
                </section>

                <section class="fade-up rounded-3xl border border-amber-200 bg-white p-6 shadow-sm" style="animation-delay: 280ms;">
                    <h3 class="text-xl font-bold text-[var(--brown-900)]">Area Pengembangan Fitur Admin</h3>
                    <p class="mt-2 max-w-3xl text-sm leading-relaxed text-[var(--brown-700)]">
                        Bagian ini sudah disiapkan sebagai kerangka untuk fitur lanjutan seperti tabel data, chart keuangan, histori transaksi, manajemen role, dan modul operasional lainnya.
                    </p>

                    <div class="mt-6 grid gap-4 md:grid-cols-3">
                        <div class="rounded-2xl border border-dashed border-amber-300 bg-[var(--cream)] p-4 text-sm text-[var(--brown-800)]">Widget laporan bulanan</div>
                        <div class="rounded-2xl border border-dashed border-amber-300 bg-[var(--cream)] p-4 text-sm text-[var(--brown-800)]">Daftar aktivitas terbaru</div>
                        <div class="rounded-2xl border border-dashed border-amber-300 bg-[var(--cream)] p-4 text-sm text-[var(--brown-800)]">Ringkasan performa tim</div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        const openSidebarButton = document.getElementById('openSidebar');
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');

        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');
        const profileMenuWrap = document.getElementById('profileMenuWrap');

        const openSidebar = () => {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
        };

        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        };

        openSidebarButton?.addEventListener('click', openSidebar);
        backdrop?.addEventListener('click', closeSidebar);

        profileButton?.addEventListener('click', () => {
            const isHidden = profileDropdown.classList.contains('hidden');
            profileDropdown.classList.toggle('hidden');
            profileButton.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
        });

        document.addEventListener('click', (event) => {
            if (!profileMenuWrap.contains(event.target)) {
                profileDropdown.classList.add('hidden');
                profileButton.setAttribute('aria-expanded', 'false');
            }
        });
    </script>
</body>
</html>
