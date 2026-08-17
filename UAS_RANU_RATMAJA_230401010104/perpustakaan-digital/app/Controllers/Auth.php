<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Menampilkan halaman form login.
     */
    public function login()
    {
        // Jika sudah login, langsung ke daftar buku
        if (session()->get('logged_in')) {
            return redirect()->to('/buku');
        }

        return view('auth/login');
    }

    /**
     * Memproses login dan menyimpan data user ke session.
     */
    public function prosesLogin()
    {
        $session  = session();
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        // Validasi input form
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        // Cari user berdasarkan username
        $userModel = new UserModel();
        $user      = $userModel->where('username', $username)->first();

        // Verifikasi password hash
        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()
                ->with('error', 'Username atau password salah.');
        }

        // Simpan data user ke session (penanganan session)
        $session->set([
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'nama_lengkap' => $user['nama_lengkap'],
            'role'         => $user['role'],
            'logged_in'    => true,
        ]);

        $session->setFlashdata('success', 'Selamat datang, ' . $user['nama_lengkap'] . '!');

        return redirect()->to('/buku');
    }

    /**
     * Logout: menghapus seluruh data session.
     */
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('success', 'Anda berhasil logout.');
    }
}
