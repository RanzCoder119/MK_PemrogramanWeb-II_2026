<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected BukuModel $bukuModel;

    // Jumlah data per halaman untuk pagination
    protected int $perPage = 6;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    /**
     * READ: Daftar buku + Searching + Pagination.
     */
    public function index()
    {
        $keyword  = trim((string) $this->request->getGet('keyword'));
        $kategori = trim((string) $this->request->getGet('kategori'));

        $model = $this->bukuModel;

        // Searching: cari di kolom judul, pengarang, atau penerbit
        if ($keyword !== '') {
            $model->groupStart()
                ->like('judul', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->orLike('isbn', $keyword)
                ->groupEnd();
        }

        // Filter berdasarkan kategori
        if ($kategori !== '') {
            $model->where('kategori', $kategori);
        }

        $data = [
            'title'         => 'Daftar Buku',
            'buku'          => $model->orderBy('updated_at', 'DESC')
                                     ->paginate($this->perPage, 'buku'),
            'pager'         => $model->pager,
            'keyword'       => $keyword,
            'kategori'      => $kategori,
            'daftarKategori' => $this->bukuModel->daftarKategori(),
            'currentPage'   => $model->pager->getCurrentPage('buku'),
            'totalData'     => $model->pager->getTotal('buku'),
            'perPage'       => $this->perPage,
        ];

        return view('buku/index', $data);
    }

    /**
     * CREATE: Form tambah buku.
     */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Buku',
            'mode'       => 'create',
            'buku'       => null,
            'validation' => \Config\Services::validation(),
        ];

        return view('buku/form', $data);
    }

    /**
     * CREATE: Simpan buku baru ke database.
     */
    public function store()
    {
        // Validasi form (ISBN wajib unik saat tambah data)
        $rules = $this->bukuModel->getValidationRules();
        $rules['isbn'] = 'permit_empty|max_length[20]|is_unique[buku.isbn]';

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->insert($this->ambilDataForm());

        return redirect()->to('/buku')
            ->with('success', 'Buku "' . $this->request->getPost('judul') . '" berhasil ditambahkan.');
    }

    /**
     * UPDATE: Form edit buku.
     */
    public function edit(int $id)
    {
        $buku = $this->bukuModel->find($id);

        if (! $buku) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Buku',
            'mode'       => 'edit',
            'buku'       => $buku,
            'validation' => \Config\Services::validation(),
        ];

        return view('buku/form', $data);
    }

    /**
     * UPDATE: Simpan perubahan buku ke database.
     */
    public function update(int $id)
    {
        $buku = $this->bukuModel->find($id);

        if (! $buku) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        // ISBN boleh sama dengan miliknya sendiri (placeholder {id} di Model)
        $rules = $this->bukuModel->getValidationRules();
        $rules['isbn'] = "permit_empty|max_length[20]|is_unique[buku.isbn,id,{$id}]";

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, $this->ambilDataForm());

        return redirect()->to('/buku')
            ->with('success', 'Data buku "' . $this->request->getPost('judul') . '" berhasil diperbarui.');
    }

    /**
     * DELETE: Hapus buku dari database.
     */
    public function delete(int $id)
    {
        $buku = $this->bukuModel->find($id);

        if (! $buku) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        $this->bukuModel->delete($id);

        return redirect()->to('/buku')
            ->with('success', 'Buku "' . $buku['judul'] . '" berhasil dihapus.');
    }

    /**
     * Mengambil dan merapikan data dari form.
     */
    private function ambilDataForm(): array
    {
        return [
            'judul'        => trim((string) $this->request->getPost('judul')),
            'pengarang'    => trim((string) $this->request->getPost('pengarang')),
            'penerbit'     => trim((string) $this->request->getPost('penerbit')),
            'tahun_terbit' => $this->request->getPost('tahun_terbit') ?: null,
            'kategori'     => trim((string) $this->request->getPost('kategori')),
            'isbn'         => trim((string) $this->request->getPost('isbn')) ?: null,
            'stok'         => (int) $this->request->getPost('stok'),
            'deskripsi'    => trim((string) $this->request->getPost('deskripsi')),
        ];
    }
}
