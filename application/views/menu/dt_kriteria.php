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
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-wa fa-file-alt"></i> Daftar Data Kriteria</h6>
            <a href="" class="btn btn-primary mb-0 mt-3" data-toggle="modal" data-target="#newKriteriaModal">Tambah Data Kriteria</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Kode Kriteria</th>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kriteria as $k) : ?>
                            <tr class="text-center">
                                <td><?= $i++; ?></td>
                                <td><?= $k['kode_kriteria']; ?></td>
                                <td class="text-left"><?= $k['nama_kriteria']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success" onclick="ubah_kriteria('<?= $k['id_kriteria']; ?>','<?= $k['kode_kriteria']; ?>','<?= $k['nama_kriteria']; ?>')">Ubah</a>
                                    <a href="#" class="badge badge-danger" onclick="hapus_kriteria('<?= $k['id_kriteria']; ?>')">Hapus</a>
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
<div class="modal fade" id="newKriteriaModal" tabindex="-1" aria-labelledby="newKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKriteriaModalLabel">Tambah Data Kriteria Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/kriteria'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Kode kriteria">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Nama kriteria">
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