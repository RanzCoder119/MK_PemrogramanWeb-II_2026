<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $dateFormat       = 'datetime';

    protected $allowedFields = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'isbn',
        'stok',
        'deskripsi',
    ];

    // Aturan validasi form buku
    protected $validationRules = [
        'judul'        => 'required|min_length[2]|max_length[200]',
        'pengarang'    => 'required|min_length[2]|max_length[120]',
        'penerbit'     => 'permit_empty|max_length[120]',
        'tahun_terbit' => 'permit_empty|integer|greater_than_equal_to[1900]|less_than_equal_to[2100]',
        'kategori'     => 'permit_empty|max_length[60]',
        'isbn'         => 'permit_empty|max_length[20]',
        'stok'         => 'required|integer|greater_than_equal_to[0]',
        'deskripsi'    => 'permit_empty|max_length[2000]',
    ];

    protected $validationMessages = [
        'judul' => [
            'required'    => 'Judul buku wajib diisi.',
            'min_length'  => 'Judul buku minimal 2 karakter.',
            'max_length'  => 'Judul buku maksimal 200 karakter.',
        ],
        'pengarang' => [
            'required'   => 'Nama pengarang wajib diisi.',
            'min_length' => 'Nama pengarang minimal 2 karakter.',
        ],
        'tahun_terbit' => [
            'integer'                 => 'Tahun terbit harus berupa angka.',
            'greater_than_equal_to'   => 'Tahun terbit minimal 1900.',
            'less_than_equal_to'      => 'Tahun terbit maksimal 2100.',
        ],
        'isbn' => [
            'is_unique' => 'ISBN sudah terdaftar, gunakan ISBN lain.',
        ],
        'stok' => [
            'required'              => 'Stok wajib diisi.',
            'integer'               => 'Stok harus berupa angka.',
            'greater_than_equal_to' => 'Stok tidak boleh negatif.',
        ],
    ];

    /**
     * Mengambil daftar kategori unik untuk filter searching.
     */
    public function daftarKategori(): array
    {
        return $this->select('kategori')
            ->distinct()
            ->where('kategori IS NOT NULL')
            ->where('kategori !=', '')
            ->orderBy('kategori', 'ASC')
            ->findColumn('kategori') ?? [];
    }
}
