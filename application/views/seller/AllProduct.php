<section class="products">
    <header class="hidden">
        <h3 class="h3 title">Product category grid</h3>
    </header>
    <div class="row row-clean">

        <!-- === product-filters === -->


        <div class="col-md-12 col-xs-12">

            <div class="sort-bar clearfix">
                <div class="sort-searching pull-left">
                    <input type="text" class="fa fa-search form-control" placeholder="Search Item">
                </div>
                <!--Sort options-->
                <div class="sort-options pull-right">
                    <span class="hidden-xs">Sort by</span>
                    <select>
                        <option value="1">Name</option>
                        <option value="2">Popular items</option>
                        <option value="3">Price: lowest</option>
                        <option value="4">Price: highest</option>
                    </select>
                    <!--Grid-list view-->
                    <span class="grid-list">
                        <a href="products-grid.html"><i class="fa fa-th-large"></i></a>
                        <a href="products-list.html"><i class="fa fa-align-justify"></i></a>
                        <a href="javascript:void(0);" class="toggle-filters-mobile"><i class="fa fa-search"></i></a>
                    </span>
                </div>
            </div>

            <div class="row row-clean" id="product-list">

                <!-- === product-item === -->

                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="#productid1" class="mfp-open">
                                    <img src="<?= base_url() ?>assets/images/product-7.png" alt="" width="360">

                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Coffee machine</a>
                                </h2>
                                <sub>$ 159,-</sub>
                                <sup>$ 139,-</sup>
                                <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                            </div>
                        </div>
                    </article>
                </div>



            </div>
            <!--/row-->
            <!--Pagination-->
            <div class="pagination-wrapper">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <!--/product items-->

    </div>
    <!--/row-->

    <!-- ========================  Product info popup - quick view ======================== -->

    <div class="popup-main mfp-hide" id="productid1">

        <!-- === product popup === -->

        <div class="product">

            <!-- === popup-title === -->

            <div class="popup-title">
                <div class="h1 title">

                    <a id="title"> Headphones Wireless </a>
                    <small id="category">product category</small>
                </div>
            </div>

            <!-- === product gallery === -->
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="product-image">

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- === product-popup-info === -->

            <div class="popup-content">
                <div class="product-info-wrapper">
                    <div class="row">

                        <!-- === left-column === -->

                        <div class="col-sm-6">
                            <div class="info-box">
                                <strong>Product By</strong>
                                <span id="nama-seller">Brand name</span>
                            </div>
                            <div class="info-box">
                                <strong>Stock</strong>
                                <span id="stock">Brand name</span>
                            </div>
                            <div class="info-box">
                                <strong>Deskription</strong>
                                <span id="deskripsi">Wood, Leather, Acrylic</span>
                            </div>
                        </div>

                        <!-- === right-column === -->

                        <div class="col-sm-6">
                            <div class="info-box">
                                <strong>Available Colors</strong>
                                <div class="product-colors clearfix">
                                    <span class="color-btn color-btn-red"></span>
                                    <span class="color-btn color-btn-blue checked"></span>
                                    <span class="color-btn color-btn-green"></span>
                                    <span class="color-btn color-btn-gray"></span>
                                    <span class="color-btn color-btn-biege"></span>
                                </div>
                            </div>
                            <div class="info-box">
                                <strong>Choose size</strong>
                                <div class="product-colors clearfix">
                                    <span class="color-btn color-btn-biege">S</span>
                                    <span class="color-btn color-btn-biege checked">M</span>
                                    <span class="color-btn color-btn-biege">XL</span>
                                    <span class="color-btn color-btn-biege">XXL</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/row-->
                </div>
                <!--/product-info-wrapper-->
            </div>
            <!--/popup-content-->
            <!-- === product-popup-footer === -->

            <div class="popup-table">
                <div class="popup-cell">
                    <div class="price">
                        <span class="h3" id="product-price">$ 1999,00</span>
                        <!-- <span class="h3">$ 1999,00 <small>$ 2999,00</small></span> -->
                    </div>
                </div>
                <div class="popup-cell">
                    <div class="popup-buttons">
                        <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                        <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                    </div>
                </div>
            </div>

        </div>
        <!--/product-->
    </div>
    <!--popup-main-->
    <!--/container-->

</section>
<script>
    $(document).ready(function() {
        var id_perusahaan = `<?= $contentData['id_seller'] ?>`;

        var popup = {
            'popup': $('#productid1'),
            'title': $('#productid1').find('#title'),
            'category': $('#productid1').find('#category'),
            'stock': $('#productid1').find('#stock'),
            'deskripsi': $('#productid1').find('#deskripsi'),
            'img': $('#productid1').find('#product-image'),
            'nama_seller': $('#productid1').find('#nama-seller'),
            'price': $('#productid1').find('#product-price'),

        }
        // console.log(dataInfo['edit_perusahaan_pr']);
        // <?php
            //  if ($this->session->userdata()['id_perusahaan'] ==  $contentData['id_perusahaan']) {
            // 
            ?>
        //     toolbar.newBtn.toggle(true);
        //     console.log("true");
        // <?php
            // }
            // 
            ?>
        // info.edit_info_btn.toggle(FALSE); 
        var product_list = $('#product-list');

        var dataProduct = {}

        $.when(getAllProduct()).then((e) => {
            // toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllProduct() {
            swal({
                title: 'Loading product...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('ProductController/getAllMyProduct/') ?>`,
                'type': 'GET',
                data: {
                    // id_perusahaan: id_perusahaan
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataProduct = json['data'];
                    renderProduct(dataProduct);
                },
                error: function(e) {}
            });
        }

        function renderProduct(data) {
            if (data == null || typeof data != "object") {
                console.log("Product::UNKNOWN DATA");
                return;
            }

            // product_list.empty();
            Object.values(data).forEach((product) => {
                product_list.prepend(`
               
                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-id='${product['id_product']}' data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                         <a href="<?= site_url('ProductController/detail/?id_product='); ?>${product['id_product']}">   <i class="icon icon-pencil"></i> </a>
                        </div>
                        <div class="figure-grid">
                            <div class="image moreshow">
                                <a href="#productid1" class="mfp-open" data-id='${product['id_product']}'>
                                    <img class="imagefix" src="<?= base_url('uploads/cover_product/') ?>${product['cover_product']}" alt="" width="360" style=" max-height: 230px !important;">
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">${product['nama_product']}</a>
                                </h2>
                                <sup>Rp. ${formatRupiah(product['price'])}</sup>
                                <span class="description clearfix">${product['deskripsi_product']}</span>
                                <a href="<?= site_url('ProductController/detail/?id_product='); ?>${product['id_product']}">Anchor link</a>
                                
                                </div>
                                </div>
                                </article>
                                </div>
                                
                                
                                `);
                // <sup>$ 139,-</sup>
            });

            $('.mfp-open').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in',
                callbacks: {
                    open: function() {
                        // wait on popup initalization
                        // then load owl-carousel
                        $('.popup-main .owl-carousel').hide();
                        setTimeout(function() {
                            $('.popup-main .owl-carousel').slideDown();
                        }, 500);
                    }
                }
            });

            $('.mfp-open').on('click', function() {
                // resetUserModal();
                var currentData = dataProduct[$(this).data('id')];
                popup.title.html(currentData['nama_product'])
                popup.category.html(currentData['nama_product'])
                popup.nama_seller.html(currentData['nama_seller'])
                popup.stock.html(currentData['nama_seller'])
                popup.deskripsi.html(currentData['deskripsi_product'])
                popup.deskripsi.html(currentData['deskripsi_product'])
                popup.price.html('Rp ' + formatRupiah(currentData['price']))
                popup.img.empty()
                popup.img.append(`
                <div class="carousel-item active" data-bs-interval="8000">
                <img src="<?= base_url() ?>uploads/cover_product/${currentData['cover_product']}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h5>${currentData['nama_seller']}</h5>
                </div>
                </div>
                `);
                getImageProduct(currentData['id_product']);
            })


        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function getImageProduct(id) {
            return $.ajax({
                url: `<?php echo site_url('ProductController/getImageProduct/') ?>`,
                'type': 'GET',
                data: {
                    id_product: id
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataIMG = json['data'];
                    Object.values(dataIMG).forEach((product_img) => {
                        // product_img['']
                        popup.img.append(`
               
                    <div class="carousel-item" data-bs-interval="1000">
                    <img src="<?= base_url() ?>uploads/product_img_file/${product_img['product_img_file']}" class="d-block w-100" alt="...">
                         <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>${product_img['product_img_ket']}</p>
                        </div>
                    </div>
                `);
                    });
                },
                error: function(e) {}
            });

        }
        //  '.edit',


        //     toolbar.newBtn.on('click', function(e) {
        //         buttonLoading(toolbar.newBtn);
        //         $.ajax({
        //             url: "<?= site_url('ProductController/add') ?>",
        //             'type': 'POST',
        //             data: {
        //                 id_perusahaan: id_perusahaan
        //             },
        //             success: function(data) {
        //                 buttonIdle(toolbar.newBtn);
        //                 var json = JSON.parse(data);
        //                 if (json['error']) {
        //                     swal('Tambah Product gagal', json['message'], "error");
        //                     return;
        //                 }
        //                 var product = json['data'];
        //                 $(location).attr('href', `<?= site_url() ?>ProductController/detail?id_product=${product['id_product']}`);
        //             },
        //             error: function(e) {}
        //         });
        //     });
    });
</script>