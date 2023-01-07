<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelMahasiswa();
    }

    public function index()
    {
        $data = [
            'mahasiswa' => $this->model->getAllData()
        ];
        echo view('index', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nim' => [
                    'label' => 'NIM',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!!!',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!!!',
                    ]
                ],
                'kode_pos' => [
                    'label' => 'Kode Pos',
                    'rules' => 'numeric',
                    'errors' => [
                        'numeric' => 'Kode Pos harus berupa angka!!!'
                    ]
                ],
                'telp' => [
                    'label' => 'Telepon',
                    'rules' => 'max_length[12]|numeric',
                    'errors' => [
                        'max_length' => 'Maksimum angka untuk Nomor Telepon adalah 12 angka!!!',
                        'numeric' => 'Nomor Telepon harus berupa angka!!!'
                    ]
                ],
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'mahasiswa' => $this->model->getAllData()
                ];

                return redirect()->to('/mahasiswa');
            } else {
                $data = [
                    'nim' => $this->request->getPost('nim'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'kota_asal' => $this->request->getPost('kota_asal'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'nama_ortu' => $this->request->getPost('nama_ortu'),
                    'alamat_ortu' => $this->request->getPost('alamat_ortu'),
                    'kode_pos' => $this->request->getPost('kode_pos'),
                    'telp' => $this->request->getPost('telp'),
                    'setatus' => $this->request->getPost('setatus')
                ];

                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to('/mahasiswa');
                }
            }
        } else {
            return redirect()->to('/mahasiswa');
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'nim' => [
                    'label' => 'NIM',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!!!',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!!!',
                    ]
                ],
                'kode_pos' => [
                    'label' => 'Kode Pos',
                    'rules' => 'numeric',
                    'errors' => [
                        'numeric' => 'Kode Pos harus berupa angka!!!'
                    ]
                ],
                'telp' => [
                    'label' => 'Telepon',
                    'rules' => 'max_length[12]|numeric',
                    'errors' => [
                        'max_length' => 'Maksimum angka untuk Nomor Telepon adalah 12 angka!!!',
                        'numeric' => 'Nomor Telepon harus berupa angka!!!'
                    ]
                ],
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'mahasiswa' => $this->model->getAllData()
                ];

                return redirect()->to('/mahasiswa');
            } else {
                $nim = $this->request->getPost('nim');

                $data = [
                    'nim' => $this->request->getPost('nim'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'kota_asal' => $this->request->getPost('kota_asal'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'nama_ortu' => $this->request->getPost('nama_ortu'),
                    'alamat_ortu' => $this->request->getPost('alamat_ortu'),
                    'kode_pos' => $this->request->getPost('kode_pos'),
                    'telp' => $this->request->getPost('telp'),
                    'setatus' => $this->request->getPost('setatus')
                ];

                $success = $this->model->ubah($data, $nim);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to('/mahasiswa');
                }
            }
        } else {
            return redirect()->to('/mahasiswa');
        }
    }

    public function hapus($nim)
    {
        $success = $this->model->delete($nim);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to('/mahasiswa');
        }
    }
}
