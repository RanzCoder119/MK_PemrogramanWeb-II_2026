<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1>Daftar Buku</h1>
        <p class="subtitle">Kelola koleksi buku perpustakaan digital</p>
    </div>
    <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary">+ Tambah Buku</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<!-- Form Searching -->
<div class="card search-card">
    <form action="<?= base_url('buku') ?>" method="get" class="search-form">
        <div class="search-input">
            <input type="text" name="keyword" class="form-control"
                   placeholder="Cari judul, pengarang, penerbit, atau ISBN..."
                   value="<?= esc($keyword) ?>">
        </div>
        <select name="kategori" class="form-control search-select">
            <option value="">Semua Kategori</option>
            <?php foreach ($daftarKategori as $kat): ?>
                <option value="<?= esc($kat) ?>" <?= $kategori === $kat ? 'selected' : '' ?>>
                    <?= esc($kat) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
        <?php if ($keyword !== '' || $kategori !== ''): ?>
            <a href="<?= base_url('buku') ?>" class="btn btn-outline">Reset</a>
        <?php endif; ?>
    </form>
</div>

<!-- Tabel Data Buku -->
<div class="card">
    <?php if (empty($buku)): ?>
        <div class="empty-state">
            <p><strong>Tidak ada data buku.</strong></p>
            <p>
                <?php if ($keyword !== '' || $kategori !== ''): ?>
                    Coba ubah kata kunci atau filter pencarian Anda.
                <?php else: ?>
                    Silakan tambah buku baru melalui tombol "Tambah Buku".
                <?php endif; ?>
            </p>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th style="width:90px">Tahun</th>
                        <th style="width:150px">Kategori</th>
                        <th style="width:70px">Stok</th>
                        <th style="width:150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = ($currentPage - 1) * $perPage; ?>
                    <?php foreach ($buku as $row): ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td>
                                <div class="book-cell">
                                    <span class="book-cover" aria-hidden="true">
                                        <?= esc(strtoupper(substr($row['judul'], 0, 1))) ?>
                                    </span>
                                    <div>
                                        <div class="book-title"><?= esc($row['judul']) ?></div>
                                        <?php if (! empty($row['isbn'])): ?>
                                            <div class="book-isbn">ISBN: <?= esc($row['isbn']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td><?= esc($row['pengarang']) ?></td>
                            <td><?= esc($row['penerbit'] ?? '-') ?></td>
                            <td><?= esc($row['tahun_terbit'] ?? '-') ?></td>
                            <td>
                                <?php if (! empty($row['kategori'])): ?>
                                    <span class="badge"><?= esc($row['kategori']) ?></span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><span class="stok <?= $row['stok'] <= 3 ? 'stok-low' : '' ?>"><?= esc($row['stok']) ?></span></td>
                            <td>
                                <div class="aksi">
                                    <a href="<?= base_url('buku/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?= base_url('buku/hapus/' . $row['id']) ?>" method="post"
                                          onsubmit="return confirm('Yakin ingin menghapus buku &quot;<?= esc($row['judul']) ?>&quot;?')">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Info jumlah data & Pagination -->
        <div class="table-footer">
            <div class="data-info">
                Menampilkan <strong><?= count($buku) ?></strong> dari
                <strong><?= $totalData ?></strong> buku
                (halaman <?= $currentPage ?> dari <?= $pager->getPageCount('buku') ?>)
            </div>
            <div class="pagination-wrapper">
                <?= $pager->only(['keyword', 'kategori'])->links('buku', 'default_full') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
