<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUGAS 6 - CRUD CI4 (672020022-672020026-672020038)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .container {
            max-width: 1400px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- JUDUL -->
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 ms-3 fs-3 fw-semibold text-white">TUGAS 6 - CRUD DATA MAHASISWA CI4</span>
            <p class="text-white mt-2 me-3">672020022 - 672020026 - 672020038</p>
        </div>
    </nav>

    <!-- ISI -->
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary text-white fs-5">
                Data Mahasiswa
            </div>
            <!-- FLASH DATA -->
            <?php if (session()->get('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
                    Data berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- FLASH DATA JIKA ERROR VALIDASI -->
            <?php if (session()->get('err')) : ?>
                <div class="alert alert-danger mt-3 mx-3 p-0 pt-2" role="alert">
                    <?= session()->getFlashdata('err'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <!-- BUTTON TAMBAH -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInput">
                    + Tambah Data Mahasiswa
                </button>
                <!-- FORM TAMBAH DATA -->
                <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalInputLabel">Form Tambah Data Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-2 me-3">
                                <form action="<?= base_url('mahasiswa/tambah'); ?>" method="post">
                                    <div class="mb-3 row">
                                        <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nim" name="nim">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kota_asal" class="col-sm-3 col-form-label">Kota Asal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kota_asal" name="kota_asal">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_ortu" class="col-sm-3 col-form-label">Nama Orang Tua</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat Orang Tua</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="telp" name="telp">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="setatus" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select id="setatus" name="setatus" class="form-select">
                                                <option disabled="disabled" selected="selected">Pilih status...</option>
                                                <option value="Tama">Tama</option>
                                                <option value="Wreda">Wreda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="btn btn-danger" type="reset" value="Reset">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- TABEL DATA MAHASISWA -->
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Kota Asal</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Orang Tua</th>
                            <th>Alamat Orang Tua</th>
                            <th>Kode Pos</th>
                            <th>Nomor Telepon</th>
                            <th>Status</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa->getResultArray() as $v) : ?>
                            <tr>
                                <td><?= $v['nim']; ?></td>
                                <td><?= $v['nama_lengkap']; ?></td>
                                <td><?= $v['kota_asal']; ?></td>
                                <td><?= $v['tgl_lahir']; ?></td>
                                <td><?= $v['nama_ortu']; ?></td>
                                <td><?= $v['alamat_ortu']; ?></td>
                                <td><?= $v['kode_pos']; ?></td>
                                <td><?= $v['telp']; ?></td>
                                <td><?= $v['setatus']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit" id="btn-edit" data-nim="<?= $v['nim']; ?>" data-nama_lengkap="<?= $v['nama_lengkap']; ?>" data-kota_asal="<?= $v['kota_asal']; ?>" data-tgl_lahir="<?= $v['tgl_lahir']; ?>" data-nama_ortu="<?= $v['nama_ortu']; ?>" data-alamat_ortu="<?= $v['alamat_ortu']; ?>" data-kode_pos="<?= $v['kode_pos']; ?>" data-telp="<?= $v['telp']; ?>" data-setatus="<?= $v['setatus']; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $v['nim'] ?>)">Hapus</button>
                                    <!-- FORM UBAH DATA -->
                                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalEditLabel">Form Ubah Data Mahasiswa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body ms-2 me-3">
                                                    <form action="<?= base_url('mahasiswa/ubah'); ?>" method="post">
                                                        <div class=" mb-3 row">
                                                            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $v['nim'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $v['nama_lengkap'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="kota_asal" class="col-sm-3 col-form-label">Kota Asal</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="kota_asal" name="kota_asal" value="<?= $v['kota_asal'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $v['tgl_lahir'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="nama_ortu" class="col-sm-3 col-form-label">Nama Orang Tua</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?= $v['nama_ortu'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat Orang Tua</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="<?= $v['alamat_ortu'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $v['kode_pos'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $v['telp'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="setatus" class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-9">
                                                                <select id="setatus" name="setatus" class="form-select" value="<?= $v['setatus'] ?>">
                                                                    <option disabled="disabled" selected="selected">Pilih status...</option>
                                                                    <option value="Tama">Tama</option>
                                                                    <option value="Wreda">Wreda</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input class="btn btn-danger" type="reset" value="Reset">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function hapus($nim) {
            var result = confirm('Apakah anda yakin ingin menghapus data ini?');
            if (result) {
                window.location = "<?php echo site_url("mahasiswa/hapus") ?>/" + $nim;
            }
        }

        $(document).on('click', '#btn-edit', function() {
            $('.modal-body #nim').val($(this).data('nim'));
            $('.modal-body #nama_lengkap').val($(this).data('nama_lengkap'));
            $('.modal-body #kota_asal').val($(this).data('kota_asal'));
            $('.modal-body #tgl_lahir').val($(this).data('tgl_lahir'));
            $('.modal-body #nama_ortu').val($(this).data('nama_ortu'));
            $('.modal-body #alamat_ortu').val($(this).data('alamat_ortu'));
            $('.modal-body #kode_pos').val($(this).data('kode_pos'));
            $('.modal-body #telp').val($(this).data('telp'));
            $('.modal-body #setatus').val($(this).data('setatus'));
        })
    </script>
</body>

</html>