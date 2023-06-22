<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-wa fa-users"></i> Daftar Calon Mustahik</h6>
            <a href="" class="btn btn-primary mb-0 mt-3" data-toggle="modal" data-target="#newMustahikModal">Tambah Data</a>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #016b5d;" class="text-white">
                        <tr align="center">
                            <th>No</th>
                            <th width="15%">NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Jenis Kelamin</th>
                            <th>TTL</th>
                            <th>Alamat Rumah</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th>Status Pernikahan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Muallaf</th>
                            <th>Kader/Non Kader</th>
                            <th>No. HP</th>
                            <th>Kelurahan/Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten/Kota</th>
                            <th>Provinsi</th>
                            <th>Tgl Registrasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mustahik as $m) : ?>
                            <tr class="text-center">
                                <td><?= $i++; ?></td>
                                <td><?= $m['nik']; ?></td>
                                <td><?= $m['nama_lengkap']; ?></td>
                                <td><?= $m['nama_panggilan']; ?></td>
                                <td><?= ($m['jenis_kelamin'] == '1') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                <td><?= $m['ttl']; ?></td>
                                <td><?= $m['alamat_rumah']; ?></td>
                                <td><?= $m['latitude']; ?></td>
                                <td><?= $m['longitude']; ?></td>
                                <td><?= $m['agama']; ?></td>
                                <td><?= $m['pekerjaan']; ?></td>
                                <td><?= ($m['status_pernikahan'] == '1') ? 'Menikah' : 'Belum Menikah'; ?></td>
                                <td><?= $m['jml_tanggungan']; ?></td>
                                <td><?= $m['pendidikan_terakhir']; ?></td>
                                <td><?= ($m['muallaf'] == '1') ? 'Ya' : 'Tidak'; ?></td>
                                <td><?= $m['kader_non_kader']; ?></td>
                                <td><?= $m['no_hp']; ?></td>
                                <td><?= $m['kelurahan_desa']; ?></td>
                                <td><?= $m['kecamatan']; ?></td>
                                <td><?= $m['kota_kabupaten']; ?></td>
                                <td><?= $m['provinsi']; ?></td>
                                <td><?= $m['tgl_registrasi']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success" onclick="ubah_mustahik('<?= $m['id_mustahik']; ?>','<?= $m['nik']; ?>','<?= $m['nama_lengkap']; ?>','<?= $m['nama_panggilan']; ?>','<?= $m['jenis_kelamin']; ?>','<?= $m['ttl']; ?>','<?= $m['alamat_rumah']; ?>','<?= $m['latitude']; ?>','<?= $m['longitude']; ?>','<?= $m['agama']; ?>','<?= $m['pekerjaan']; ?>','<?= $m['status_pernikahan']; ?>','<?= $m['jml_tanggungan']; ?>','<?= $m['pendidikan_terakhir']; ?>','<?= $m['muallaf']; ?>','<?= $m['kader_non_kader']; ?>','<?= $m['no_hp']; ?>','<?= $m['kelurahan_desa']; ?>','<?= $m['kecamatan']; ?>','<?= $m['kota_kabupaten']; ?>','<?= $m['provinsi']; ?>','<?= $m['tgl_registrasi']; ?>')">edit</a>
                                    <a href="#" onclick="hapus_mustahik('<?= $m['id_mustahik']; ?>')" class="badge badge-danger">delete</a>
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

<!-- Modal Tambah Mustahik-->
<div class="modal fade" id="newMustahikModal" tabindex="-1" aria-labelledby="newMustahikModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMustahikModalLabel">Tambah Data Mustahik Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/mustahik'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap">
                    </div>
                    <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Nama panggilan">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="1">Laki - Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir</label>
                        <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat, Tanggal lahir">
                    </div>
                    <div class="form-group">
                        <label>Alamat Rumah</label>
                        <textarea class="form-control" id="alamat_rumah" name="alamat_rumah" placeholder="Alamat rumah"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Titik latitude">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Titik longitude">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Status Pernikahan</label>
                        <select id="status_pernikahan" name="status_pernikahan" class="form-control">
                            <option value="">Pilih status pernikahan</option>
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                            <option value="3">Cerai Mati</option>
                            <option value="4">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tanggungan Keluarga</label>
                        <input type="text" class="form-control" id="jml_tanggungan" name="jml_tanggungan" placeholder="Jumlah tanggungan">
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" placeholder="Pendidikan terakhir">
                    </div>
                    <div class="form-group">
                        <label>Muallaf</label>
                        <select id="muallaf" name="muallaf" class="form-control">
                            <option value="">Pilih status muallaf</option>
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kader/Non Kader</label>
                        <input type="text" class="form-control" id="kader_non_kader" name="kader_non_kader" placeholder="Kader atau non kader">
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor handphone">
                    </div>
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa" placeholder="Kelurahan/desa">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                    </div>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <input type="text" class="form-control" id="kota_kabupaten" name="kota_kabupaten" placeholder="Kota/kabupaten">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Propinsi">
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

<!-- Modal UbahMustahik-->
<div class="modal fade" id="newUbahModal" tabindex="-1" aria-labelledby="newUbahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('menu/edit_mustahik/'); ?>" method="post">
                <input id="uid_mustahik" name="id_mustahik" type="hidden" value="<?= $m['id_mustahik']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbahModalLabel">Ubah Data Mustahik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" id="unik" name="nik" placeholder="NIK" value="<?= $m['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="unama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="<?= $m['nama_lengkap']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" class="form-control" id="unama_panggilan" name="nama_panggilan" placeholder="Nama panggilan" value="<?= $m['nama_panggilan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select id="ujenis_kelamin" name="jenis_kelamin" class="form-control" value="<?= $m['jenis_kelamin']; ?>">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="1">Laki - Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir</label>
                        <input type="text" class="form-control" id="uttl" name="ttl" placeholder="Tempat, Tanggal lahir" value="<?= $m['ttl']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Rumah</label>
                        <textarea class="form-control" id="ualamat_rumah" name="alamat_rumah" placeholder="Alamat rumah" value="<?= $m['alamat_rumah']; ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="ulatitude" name="latitude" placeholder="Titik latitude" value="<?= $m['latitude']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="ulongitude" name="longitude" placeholder="Titik longitude" value="<?= $m['longitude']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" id="uagama" name="agama" placeholder="Agama" value="<?= $m['agama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="upekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= $m['pekerjaan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Status Pernikahan</label>
                        <select id="ustatus_pernikahan" name="status_pernikahan" class="form-control" value="<?= $m['status_pernikahan']; ?>">
                            <option value="">Pilih status pernikahan</option>
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                            <option value="3">Cerai Mati</option>
                            <option value="4">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tanggungan Keluarga</label>
                        <input type="text" class="form-control" id="ujml_tanggungan" name="jml_tanggungan" placeholder="Jumlah tanggungan" value="<?= $m['jml_tanggungan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="upendidikan_terakhir" name="pendidikan_terakhir" placeholder="Pendidikan terakhir" value="<?= $m['pendidikan_terakhir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Muallaf</label>
                        <select id="umuallaf" name="muallaf" class="form-control" value="<?= $m['muallaf']; ?>">
                            <option value="">Pilih status muallaf</option>
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kader/Non Kader</label>
                        <input type="text" class="form-control" id="ukader_non_kader" name="kader_non_kader" placeholder="Kader atau non kader" value="<?= $m['kader_non_kader']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" id="uno_hp" name="no_hp" placeholder="Nomor handphone" value="<?= $m['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <input type="text" class="form-control" id="ukelurahan_desa" name="kelurahan_desa" placeholder="Kelurahan/desa" value="<?= $m['kelurahan_desa']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" id="ukecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $m['kecamatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <input type="text" class="form-control" id="ukota_kabupaten" name="kota_kabupaten" placeholder="Kota/kabupaten" value="<?= $m['kota_kabupaten']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" id="uprovinsi" name="provinsi" placeholder="Propinsi" value="<?= $m['provinsi']; ?>">
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

<!-- Modal HapusMustahik-->
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
                <form action="<?= base_url('menu/delete_mustahik/'); ?>" method="post">
                    <input type="hidden" name="id_mustahik" id="hid_mustahik" value="">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function ubah_mustahik(id_mustahik, nik, nama_lengkap, nama_panggilan, jenis_kelamin, ttl, alamat_rumah, latitude, longitude, agama, pekerjaan, status_pernikahan, jml_tanggungan, pendidikan_terakhir, muallaf, kader_non_kader, no_hp, kelurahan_desa, kecamatan, kota_kabupaten, provinsi) {
        $('#uid_mustahik').val(id_mustahik);
        $('#unik').val(nik);
        $('#unama_lengkap').val(nama_lengkap);
        $('#unama_panggilan').val(nama_panggilan);
        $('#ujenis_kelamin').val(jenis_kelamin);
        $('#uttl').val(ttl);
        $('#ualamat_rumah').val(alamat_rumah);
        $('#ulatitude').val(latitude);
        $('#ulongitude').val(longitude);
        $('#uagama').val(agama);
        $('#upekerjaan').val(pekerjaan);
        $('#ustatus_pernikahan').val(status_pernikahan);
        $('#ujml_tanggungan').val(jml_tanggungan);
        $('#upendidikan_terakhir').val(pendidikan_terakhir);
        $('#umuallaf').val(muallaf);
        $('#ukader_non_kader').val(kader_non_kader);
        $('#uno_hp').val(no_hp);
        $('#ukelurahan_desa').val(kelurahan_desa);
        $('#ukecamatan').val(kecamatan);
        $('#ukota_kabupaten').val(kota_kabupaten);
        $('#uprovinsi').val(provinsi);
        $('#newUbahModal').modal('show');
        // alert(id_kriteria);
    }

    function hapus_mustahik(id_mustahik) {
        $('#hid_mustahik').val(id_mustahik);
        $('#newHapusModal').modal('show');
        // alert(id_kriteria);
    }
</script>