<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Filter untuk penanganan session.
 * Semua route dengan filter 'auth' hanya bisa diakses
 * jika user sudah login (session 'logged_in' bernilai true).
 */
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Jika belum login, arahkan ke halaman login
        if (! $session->get('logged_in')) {
            $session->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengakses halaman tersebut.');

            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah response
    }
}
