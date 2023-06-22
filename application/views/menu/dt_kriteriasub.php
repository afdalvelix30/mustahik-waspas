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
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-wa fa-file-alt"></i> Daftar Data Sub Kriteria</h6>
            <a href="" class="btn btn-primary mb-0 mt-3" data-toggle="modal" data-target="#newSubKriteriaModal">Tambah Data Sub Kriteria</a>
        </div>
        <div class="row">
            <?php foreach ($kriteria as $k) { ?>
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Kriteria <?= $k['nama_kriteria'] . ' (' . $k['kode_kriteria'] . ')'; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Indikator</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($this->menu->getSubKriteria($k['id_kriteria']) as $ks) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ks['nama_sub_kriteria']; ?></td>
                                                <td class="text-center"><?= $ks['nilai']; ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="badge badge-success" onclick="ubah_subkriteria('<?= $k['id_kriteria']; ?>','<?= $ks['id_sub_kriteria']; ?>','<?= $ks['nama_sub_kriteria']; ?>','<?= $ks['nilai']; ?>')">ubah</a>
                                                    <a href="#" class="badge badge-danger" onclick="hapus_kriteria_sub('<?= $ks['id_sub_kriteria']; ?>')">hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal SubKriteria-->
<div class="modal fade" id="newSubKriteriaModal" tabindex="-1" aria-labelledby="newSubKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubKriteriaModalLabel">Tambah Data Sub Kriteria Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/subkriteria'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_kriteria" id="id_kriteria" class="form-control">
                            <option value="">Select Kriteria</option>
                            <?php foreach ($kriteria as $k) : ?>
                                <option value="<?= $k['id_kriteria']; ?>"><?= $k['kode_kriteria']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_sub_kriteria" name="nama_sub_kriteria" placeholder="Nama Sub kriteria">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="nilai">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal UbahSubKriteria-->
<div class="modal fade" id="newUbahModal" tabindex="-1" aria-labelledby="newUbahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('menu/edit_subkriteria/'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbahModalLabel">Ubah Data Sub Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input name="id_sub_kriteria" id="uid_sub_kriteria" hidden>

                        <select name="id_kriteria" id="uid_kriteria" class="form-control">
                            <option value="">Select Kriteria</option>
                            <?php foreach ($kriteria as $k) : ?>
                                <option value="<?= $k['id_kriteria']; ?>"><?= $k['kode_kriteria']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unama_sub_kriteria" name="nama_sub_kriteria" placeholder="Nama Sub kriteria">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unilai" name="nilai" placeholder="nilai">
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
                <form action="<?= base_url('menu/delete_kriteria_sub/'); ?>" method="post">
                    <input type="hidden" name="id_sub_kriteria" id="hid_sub_kriteria" value="">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function ubah_subkriteria(id_kriteria, id_sub_kriteria, nama_sub_kriteria, nilai) {
        $('#uid_kriteria').val(id_kriteria);
        $('#uid_sub_kriteria').val(id_sub_kriteria);
        $('#unama_sub_kriteria').val(nama_sub_kriteria);
        $('#unilai').val(nilai);
        $('#newUbahModal').modal('show');
        // alert(id_kriteria);
    }

    function hapus_kriteria_sub(id_sub_kriteria) {
        $('#hid_sub_kriteria').val(id_sub_kriteria);
        $('#newHapusModal').modal('show');
        // alert(id_kriteria);
    }
</script>