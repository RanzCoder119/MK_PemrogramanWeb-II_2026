<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Perpustakaan Buku Digital') ?> | Perpustakaan Buku Digital</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="<?= base_url('buku') ?>" class="brand">
                <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span>Perpustakaan Buku Digital</span>
            </a>
            <?php if (session()->get('logged_in')): ?>
                <div class="navbar-user">
                    <span class="user-chip">
                        <span class="user-avatar"><?= esc(strtoupper(substr(session()->get('nama_lengkap') ?? 'U', 0, 1))) ?></span>
                        <?= esc(session()->get('nama_lengkap')) ?>
                    </span>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline btn-sm"
                       onclick="return confirm('Yakin ingin logout?')">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; <?= date('Y') ?> Perpustakaan Buku Digital &mdash; Dibangun dengan CodeIgniter 4 &amp; MySQL
        </div>
    </footer>
</body>
</html>
