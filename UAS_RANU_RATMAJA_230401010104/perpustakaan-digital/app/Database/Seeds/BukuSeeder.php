<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $buku = [
            ['Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 'Novel', '9789793062792', 5, 'Kisah perjuangan anak-anak Belitung dalam menempuh pendidikan.'],
            ['Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', 2014, 'Fantasi', '9786020301129', 8, 'Petualangan Raib, Seli, dan Ali di dunia paralel.'],
            ['Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia Pustaka Utama', 2009, 'Novel', '9789792248616', 4, 'Kisah santri di pondok dengan semangat man jadda wajada.'],
            ['Pulang', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', 2012, 'Novel', '9789799105229', 3, 'Novel tentang eksil politik Indonesia di Paris.'],
            ['Sang Pemimpi', 'Andrea Hirata', 'Bentang Pustaka', 2006, 'Novel', '9789793062921', 6, 'Kelanjutan kisah Ikal dan Arai mengejar mimpi.'],
            ['Perahu Kertas', 'Dewi Lestari', 'Bentang Pustaka', 2009, 'Novel', '9789791227729', 7, 'Kisah Kugy dan Keenan, mimpi dan cinta.'],
            ['Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', 2016, 'Fiksi Ilmiah', '9786020324784', 9, 'Kisah Lail dan Esok di masa depan pasca bencana.'],
            ['Filosofi Teras', 'Henry Manampiring', 'Kompas', 2018, 'Pengembangan Diri', '9786024125189', 10, 'Pengantar filsafat Stoa untuk kehidupan sehari-hari.'],
            ['Sejarah Dunia yang Disembunyikan', 'Jonathan Black', 'Alvabet', 2015, 'Sejarah', '9786029193351', 2, 'Menguak sejarah esoterik peradaban dunia.'],
            ['Atomic Habits', 'James Clear', 'Gramedia Pustaka Utama', 2019, 'Pengembangan Diri', '9786020633176', 12, 'Cara membangun kebiasaan kecil untuk hasil luar biasa.'],
            ['Sapiens', 'Yuval Noah Harari', 'Kepustakaan Populer Gramedia', 2017, 'Sejarah', '9786024244163', 5, 'Riwayat singkat umat manusia dari purba hingga modern.'],
            ['Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, 'Teknologi', '9780132350884', 4, 'Panduan menulis kode yang bersih dan mudah dirawat.'],
            ['Algoritma dan Pemrograman', 'Rinaldi Munir', 'Informatika Bandung', 2016, 'Teknologi', '9786021513915', 6, 'Buku teks dasar algoritma untuk mahasiswa informatika.'],
            ['Basis Data', 'Fathansyah', 'Informatika Bandung', 2015, 'Teknologi', '9786028758042', 7, 'Konsep dan implementasi sistem basis data.'],
            ['Harry Potter dan Batu Bertuah', 'J.K. Rowling', 'Gramedia Pustaka Utama', 2000, 'Fantasi', '9786020326900', 8, 'Awal petualangan Harry Potter di Hogwarts.'],
            ['The Hobbit', 'J.R.R. Tolkien', 'Gramedia Pustaka Utama', 2001, 'Fantasi', '9789792223347', 3, 'Petualangan Bilbo Baggins bersama para kurcaci.'],
            ['Cantik Itu Luka', 'Eka Kurniawan', 'Gramedia Pustaka Utama', 2002, 'Novel', '9786020325941', 4, 'Novel sejarah keluarga di Halimunda.'],
            ['Gadis Kretek', 'Ratih Kumala', 'Gramedia Pustaka Utama', 2012, 'Novel', '9786020379883', 5, 'Kisah keluarga pengusaha kretek terbesar di Indonesia.'],
            ['Pulang Tertatih', 'M. Aan Mansyur', 'Bentang Pustaka', 2019, 'Puisi', '9786022915990', 6, 'Kumpulan puisi tentang perjalanan dan kerinduan.'],
            ['Habit of Winning', 'Prakash Iyer', 'Elex Media Komputindo', 2013, 'Pengembangan Diri', '9786020212345', 3, 'Cerita inspiratif tentang kepemimpinan dan motivasi.'],
            ['Mindset', 'Carol S. Dweck', 'Noura Books', 2018, 'Pengembangan Diri', '9786023853090', 7, 'Mengubah cara berpikir untuk meraih potensi maksimal.'],
            ['The Pragmatic Programmer', 'David Thomas', 'Addison-Wesley', 2019, 'Teknologi', '9780135957059', 2, 'Panduan menjadi programmer yang pragmatis dan efektif.'],
            ['Design Patterns', 'Erich Gamma', 'Addison-Wesley', 1994, 'Teknologi', '9780201633610', 3, 'Pola desain perangkat lunak berorientasi objek.'],
            ['Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', 2017, 'Novel', '9786024246945', 5, 'Kisah aktivis yang hilang pada 1998 dituturkan sang laut.'],
            ['Klara and the Sun', 'Kazuo Ishiguro', 'Gramedia Pustaka Utama', 2021, 'Fiksi Ilmiah', '9786020656090', 4, 'Novel tentang robot AF bernama Klara yang penuh empati.'],
        ];

        $batch = [];
        foreach ($buku as $b) {
            $batch[] = [
                'judul'        => $b[0],
                'pengarang'    => $b[1],
                'penerbit'     => $b[2],
                'tahun_terbit' => $b[3],
                'kategori'     => $b[4],
                'isbn'         => $b[5],
                'stok'         => $b[6],
                'deskripsi'    => $b[7],
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        $this->db->table('buku')->insertBatch($batch);
    }
}
