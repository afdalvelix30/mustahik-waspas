<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-wa fa-file-alt"></i> Daftar Data Penilaian Mustahik</h6>
            <a href="" class="btn btn-primary mb-0 mt-3" data-toggle="modal" data-target="#newPenilaianModal">Tambah Penilaian</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">C11</th>
                            <th scope="col">C12</th>
                            <th scope="col">C13</th>
                            <th scope="col">C14</th>
                            <th scope="col">C15</th>
                            <th scope="col">C16</th>
                            <th scope="col">C17</th>
                            <th scope="col">C18</th>
                            <th scope="col">C21</th>
                            <th scope="col">C22</th>
                            <th scope="col">C23</th>
                            <th scope="col">C24</th>
                            <th scope="col">C25</th>
                            <th scope="col">C26</th>
                            <th scope="col">C27</th>
                            <th scope="col">C28</th>
                            <th scope="col">C31</th>
                            <th scope="col">C32</th>
                            <th scope="col">C33</th>
                            <th scope="col">C34</th>
                            <th scope="col">C41</th>
                            <th scope="col">C42</th>
                            <th scope="col">C43</th>
                            <th scope="col">C5</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penilaian as $p) : ?>
                            <tr class="text-center">
                                <td><?= $i++; ?></td>
                                <td><?= $p['id_mustahik']; ?></td>
                                <td><?= $p['c11']; ?></td>
                                <td><?= $p['c12']; ?></td>
                                <td><?= $p['c13']; ?></td>
                                <td><?= $p['c14']; ?></td>
                                <td><?= $p['c15']; ?></td>
                                <td><?= $p['c16']; ?></td>
                                <td><?= $p['c17']; ?></td>
                                <td><?= $p['c18']; ?></td>
                                <td><?= $p['c21']; ?></td>
                                <td><?= $p['c22']; ?></td>
                                <td><?= $p['c23']; ?></td>
                                <td><?= $p['c24']; ?></td>
                                <td><?= $p['c25']; ?></td>
                                <td><?= $p['c26']; ?></td>
                                <td><?= $p['c27']; ?></td>
                                <td><?= $p['c28']; ?></td>
                                <td><?= $p['c31']; ?></td>
                                <td><?= $p['c32']; ?></td>
                                <td><?= $p['c33']; ?></td>
                                <td><?= $p['c34']; ?></td>
                                <td><?= $p['c41']; ?></td>
                                <td><?= $p['c42']; ?></td>
                                <td><?= $p['c43']; ?></td>
                                <td><?= $p['c5']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success">Ubah</a>
                                    <a href="3" class="badge badge-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Kriteria-->
<div class="modal fade" id="newPenilaianModal" tabindex="-1" aria-labelledby="newPenilaianModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPenilaianModalLabel">Tambah Data Penilaian Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/penilaianmustahik'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Induk Kependudukan (NIK)</label>
                        <select name="id_mustahik" id="id_mustahik" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach ($mustahik as $m) : ?>
                                <option value="<?= $m['id_mustahik']; ?>"><?= $m['nama_lengkap']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="" readonly>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal UbahKriteria-->
<div class="modal fade" id="newUbahModal" tabindex="-1" aria-labelledby="newUbahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('menu/edit_kriteria/'); ?>" method="post">
                <input id="uid_kriteria" name="id_kriteria" type="hidden" value="<?= $k['id_kriteria']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbahModalLabel">Ubah Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ukode_kriteria" name="kode_kriteria" value="<?= $k['kode_kriteria']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" id="unama_kriteria" name="nama_kriteria" placeholder="Nama kriteria" value="<?= $k['nama_kriteria']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal HapusKriteria-->
<div class="modal fade" id="newHapusModal" tabindex="-1" aria-labelledby="newHapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHapusModalLabel">Perhatian !!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
            <div class="modal-footer">
                <form action="<?= base_url('menu/delete_kriteria/'); ?>" method="post">
                    <input type="hidden" name="id_kriteria" id="hid_kriteria" value="">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function ubah_kriteria(id_kriteria, kode_kriteria, nama_kriteria) {
        $('#uid_kriteria').val(id_kriteria);
        $('#ukode_kriteria').val(kode_kriteria);
        $('#unama_kriteria').val(nama_kriteria);
        $('#newUbahModal').modal('show');
        // alert(id_kriteria);
    }

    function hapus_kriteria(id_kriteria) {
        $('#hid_kriteria').val(id_kriteria);
        $('#newHapusModal').modal('show');
        // alert(id_kriteria);
    }
</script>