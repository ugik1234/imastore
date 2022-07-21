    <section class="header-content">
        <div class="clearifx">
            <div class="alert alert-info" role="alert">
                Selamat !!.. Anda telah baergabung sebagai Mitra Tambang PT Indometal Asia
                <!-- Data anda sedang dalam prosess verifikasi, jika permohonan mitra anda disetujui akan muncul menu baru -->
            </div>
            <div class="panel panel-default" id="forms">
                <!-- <div class="panel-heading"></div> -->
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
                        <div class="form-group has-success">
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </section>
    <section class="blog blog-block">

        <div class="container">

            <!-- === blog header === -->

            <!-- <header class="hidden">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title">C</h2>
                        <div class="text">
                            <p>Riwayat Transaksi</p>
                        </div>
                    </div>
                </div>
            </header> -->

            <div class="row row-clean">

                <!-- === blog item === -->

                <div class="col-xs-6 col-sm-3">
                    <article>
                        <a href="<?= base_url() ?>mitra-tambang/history">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/project-1.jpg" alt="">
                            </div>
                            <div class="entry entry-block">
                                <!-- <div class="date">2018 Collection</div> -->
                                <div class="title">
                                    <h2 class="h3">Riwayat Transaksi</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        Top picks four your desire
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Shop now</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-xs-6 col-sm-3">
                    <article>
                        <a href="<?= base_url() ?>mitra-tambang/jual">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/project-2.jpg" alt="">
                            </div>
                            <div class="entry entry-block">
                                <div class="date">New arrivals</div>
                                <div class="title">
                                    <h2 class="h3">Jual Timah</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        Explore popular devices
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Shop now</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-xs-6 col-sm-3">
                    <article>
                        <a href="<?= base_url() ?>mitra-tambang/beli">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/project-3.jpg" alt="">
                            </div>
                            <div class="entry entry-block">
                                <div class="date">Up to 50% off</div>
                                <div class="title">
                                    <h2 class="h3">Beli Timah</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        Available f
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Shop now</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-xs-6 col-sm-3">
                    <article>
                        <a href="<?= base_url() ?>mitra-tambang/invoice">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/project-4.jpg" alt="">
                            </div>
                            <div class="entry entry-block">
                                <div class="date">Save big on</div>
                                <div class="title">
                                    <h2 class="h3">Invoice</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        Fun to explore
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Shop now</span>
                            </div>
                        </a>
                    </article>
                </div>

            </div>
            <!--/row-->

            <!-- === button more === -->

            <div class="wrapper-more">
                <!-- <a href="ideas.html" class="btn btn-lg">View all categories</a> -->
            </div>

        </div>
        <!--/container-->
    </section>

    <script>
        $(document).ready(function() {})
    </script>