    <section class="header-content">
        <div class="clearifx">
            <div class="alert alert-warning" role="alert">

                <?= empty($dataContent['return']['file_pengaju']) ? 'Anda belum terdaftar sebagai mitra tambang' : 'Data anda sedang dalam tahap verifikasi' ?>

            </div>
            <div class="panel panel-default" id="forms">
                <div class="panel-heading">Form Pendaftaran Mitra Timah</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form_request" onsubmit="return false;" type="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Nomor NIB</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nomor_nib" name="nomor_nib" placeholder="Nomor NIB">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmai2" class="col-lg-2 control-label">Jenis Mitra</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="jenis_mitra" id="jenis_mitra">
                                    <?php $jenis_mitra = JenisMitra();
                                    foreach ($jenis_mitra as $jm) {
                                        echo
                                        "<option value='" . $jm['id_jenis_mitra'] . "'>" . $jm['nama_jenis_mitra'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-lg-2 control-label">Foto Yang Mengajukan</label>
                            <div class="col-lg-10">
                                <?php if (!empty($dataContent['return']['file_pengaju'])) { ?>
                                    <img style="max-width : 300px" src="<?= base_url('uploads/file_pengaju/' . $dataContent['return']['file_pengaju']) ?>" alt="">
                                    <br><span>*jika tidak diganti kosongkan</span>
                                <?php } ?>
                                <input type="file" name="upload_pengaju" class="form-control" accept="image/png, image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-lg-2 control-label">NIB</label>
                            <div class="col-lg-10">
                                <?php if (!empty($dataContent['return']['file_nib'])) { ?>
                                    <label for="inputEmail3" class="col-lg-2 control-label">
                                        <a target="_blank" href="<?= base_url('uploads/file_nib/' . $dataContent['return']['file_nib']) ?>" alt=""><?= $dataContent['return']['file_nib'] ?></a>
                                    </label>
                                <?php } ?>
                                <input type="file" name="upload_nib" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="col-lg-2 control-label">Persyaratan</label>
                            <div class="col-lg-10">
                                <?php if (!empty($dataContent['return']['file_persyaratan'])) { ?>
                                    <label for="inputEmail3" class="col-lg-2 control-label">
                                        <a target="_blank" href="<?= base_url('uploads/file_persyaratan/' . $dataContent['return']['file_persyaratan']) ?>" alt=""><?= $dataContent['return']['file_persyaratan'] ?></a>
                                    </label>
                                <?php } ?>
                                <input type="file" name="upload_persyaratan" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <div class="col-xs-6 text-right">
                                <button type="submit" class="btn btn-main"><span class="icon icon-enter-down"></span>
                                    <?= empty($dataContent['return']['file_pengaju']) ? 'Kirim Permintaan' : 'Simpan Perubahan' ?>
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            form_request = {
                'form': $('#form_request'),
                'jenis_mitra': $('#form_request').find('#jenis_mitra'),
                'nomor_nib': $('#form_request').find('#nomor_nib'),
            };
            form_request.form.submit(function(event) {
                event.preventDefault();

                swal(saveConfirmation("Kirim balasan", "Pastikan Format File PDF", "Ya, Kirim!")).then((result) => {
                    if (!result.value) {
                        return;
                    }
                    // buttonLoading(bp3l_rek_modal.save_btn);
                    $.ajax({
                        url: "<?= site_url('MitraController/request') ?>",
                        'type': 'POST',
                        data: new FormData(form_request.form[0]),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // buttonIdle(bp3l_rek_modal.save_btn);
                            var json = JSON.parse(data);
                            if (json['error']) {
                                swal("Simpan Gagal", json['message'], "error");
                                return;
                            }
                            dataInfo = json['data']
                            // renderDokumen(dataInfo);
                            // bp3l_rek_modal.self.modal('hide');
                            swal("Simpan Berhasil", "", "success");
                        },
                        error: function(e) {}
                    });
                });
            });

            <?php if (!empty($dataContent['return'])) { ?>
                console.log('as')
                form_request.jenis_mitra.val('<?= $dataContent['return']['jenis_mitra'] ?>')
                form_request.nomor_nib.val('<?= $dataContent['return']['nomor_nib'] ?>')
            <?php } ?>
        })
    </script>