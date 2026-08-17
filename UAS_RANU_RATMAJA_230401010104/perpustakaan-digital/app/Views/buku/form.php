<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
    $isEdit = ($mode === 'edit');
    $action = $isEdit ? base_url('buku/update/' . $buku['id']) : base_url('buku/simpan');
    $errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <div>
        <h1><?= $isEdit ? 'Edit Buku' : 'Tambah Buku Baru' ?></h1>
        <p class="subtitle"><?= $isEdit ? 'Perbarui informasi buku' : 'Lengkapi form untuk menambahkan buku ke koleksi' ?></p>
    </div>
    <a href="<?= base_url('buku') ?>" class="btn btn-outline">&larr; Kembali</a>
</div>

<?php if (! empty($errors)): ?>
    <div class="alert alert-error">
        <strong>Periksa kembali isian form:</strong>
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card form-card">
    <form action="<?= $action ?>" method="post">
        <div class="form-grid">
            <div class="form-group span-2">
                <label for="judul">Judul Buku <span class="required">*</span></label>
                <input type="text" name="judul" id="judul" class="form-control <?= isset($errors['judul']) ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('judul', $buku['judul'] ?? '')) ?>" placeholder="Contoh: Laskar Pelangi" required>
                <?php if (isset($errors['judul'])): ?>
                    <small class="error-text"><?= esc($errors['judul']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang <span class="required">*</span></label>
                <input type="text" name="pengarang" id="pengarang" class="form-control <?= isset($errors['pengarang']) ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('pengarang', $buku['pengarang'] ?? '')) ?>" placeholder="Contoh: Andrea Hirata" required>
                <?php if (isset($errors['pengarang'])): ?>
                    <small class="error-text"><?= esc($errors['pengarang']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control"
                       value="<?= esc(old('penerbit', $buku['penerbit'] ?? '')) ?>" placeholder="Contoh: Bentang Pustaka">
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control <?= isset($errors['tahun_terbit']) ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('tahun_terbit', $buku['tahun_terbit'] ?? '')) ?>" placeholder="Contoh: 2005" min="1900" max="2100">
                <?php if (isset($errors['tahun_terbit'])): ?>
                    <small class="error-text"><?= esc($errors['tahun_terbit']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" list="daftar-kategori"
                       value="<?= esc(old('kategori', $buku['kategori'] ?? '')) ?>" placeholder="Contoh: Novel">
                <datalist id="daftar-kategori">
                    <option value="Novel">
                    <option value="Fantasi">
                    <option value="Fiksi Ilmiah">
                    <option value="Teknologi">
                    <option value="Sejarah">
                    <option value="Pengembangan Diri">
                    <option value="Puisi">
                    <option value="Biografi">
                </datalist>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control <?= isset($errors['isbn']) ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('isbn', $buku['isbn'] ?? '')) ?>" placeholder="Contoh: 9789793062792">
                <?php if (isset($errors['isbn'])): ?>
                    <small class="error-text"><?= esc($errors['isbn']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="stok">Stok <span class="required">*</span></label>
                <input type="number" name="stok" id="stok" class="form-control <?= isset($errors['stok']) ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('stok', $buku['stok'] ?? '0')) ?>" min="0" required>
                <?php if (isset($errors['stok'])): ?>
                    <small class="error-text"><?= esc($errors['stok']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group span-2">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"
                          placeholder="Ringkasan singkat isi buku..."><?= esc(old('deskripsi', $buku['deskripsi'] ?? '')) ?></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Simpan Perubahan' : 'Simpan Buku' ?></button>
            <a href="<?= base_url('buku') ?>" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
