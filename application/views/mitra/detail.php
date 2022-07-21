    <section class="header-content">
        <div class="clearifx">
            <div class="alert alert-info" role="alert">
                Data anda sedang dalam prosess verifikasi, jika permohonan mitra anda disetujui akan muncul menu baru </div>
            <div class="panel panel-default" id="forms">
                <div class="panel-heading">Form Pendaftaran Mitra Timah</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form_request" onsubmit="return false;" type="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Nomor NIB</label>
                            <div class="col-lg-10">
                                <p class="form-control"> <?= $dataContent['return']['nomor_nib'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmai2" class="col-lg-2 control-label">Jenis Mitra</label>
                            <div class="col-lg-10">
                                <p class="form-control"> <?= $dataContent['return']['nama_jenis_mitra'] ?></p>
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-lg-2 control-label">Foto Yang Mengajukan</label>
                            <div class="col-lg-10">
                                <!-- <input type="file" name="upload_pengaju" class="form-control" accept="image/png, image/jpg, image/jpeg"> -->
                                <img style="max-width : 300px" src="<?= base_url('uploads/file_pengaju/' . $dataContent['return']['file_pengaju']) ?>" alt="">
                            </div>
                            <!-- <div class="image" style="background-image:url(assets/images/blog-4.jpg)"> -->
                            <!-- </div> -->
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-lg-2 control-label">NIB</label>
                            <div class="col-lg-10">
                                <label for="inputEmail3" class="col-lg-2 control-label">
                                    <a target="_blank" href="<?= base_url('uploads/file_nib/' . $dataContent['return']['file_nib']) ?>" alt=""><?= $dataContent['return']['file_nib'] ?></a>

                                </label>
                                <!-- <input type="file" name="upload_nib" class="form-control" accept="application/pdf"> -->
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label for="inputEmail4" class="col-lg-2 control-label">Persyaratan</label>
                            <div class="col-lg-10">
                                <label for="inputEmail3" class="col-lg-2 control-label">
                                    <a target="_blank" href="<?= base_url('uploads/file_persyaratan/' . $dataContent['return']['file_persyaratan']) ?>" alt=""><?= $dataContent['return']['file_persyaratan'] ?></a>
                                </label>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <div class="col-xs-6 text-right">
                                <a href="<?= base_url('mitra-tambang/edit') ?>" class="btn btn-main"><span class="icon icon-pencil"></span> Edit</a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {})
    </script>