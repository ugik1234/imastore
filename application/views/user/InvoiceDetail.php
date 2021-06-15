<section class="checkout">
    <div class="container">

        <header class="hidden">
            <h3 class="h3 title">Checkout - Step 3</h3>
        </header>

        <!-- ========================  Cart navigation ======================== -->
        <?php if ($dataContent['parent']['status'] == 'unpaid') { ?>
            <div class="clearfix">
                <div class="row">
                    <div class="float-right" style="float: right;">
                        <a href="<?= base_url('invoice/upload/s?number=') . $dataContent['parent']['invoice_number'] ?>" class="btn btn-main"><span class="icon icon-cart"></span> Upload Bukti Bayar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- ========================  Payment ======================== -->

        <div class="cart-wrapper">

            <div class="note-block">

                <div class="row">
                    <!-- === left content === -->

                    <div class="col-md-6">

                        <div class="white-block">

                            <div class="h4">Order details</div>

                            <hr>

                            <div class="row">

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Order no.</strong> <br>
                                        <span>52522-63259226</span>
                                    </div>
                                </div> -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Invoice ID</strong> <br>
                                        <span><?= $dataContent['parent']['invoice_number'] ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Order date</strong> <br>
                                        <span><?= explode(' ', $dataContent['parent']['order_date'])[0] ?></span>
                                    </div>
                                </div>

                            </div>

                            <div class="h4">Shipping info</div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name</strong> <br>
                                        <span><?= $dataContent['parent']['order_name'] ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email</strong><br>
                                        <span><?= $dataContent['parent']['order_email'] ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone</strong><br>
                                        <span><?= $dataContent['parent']['order_no_telp'] ?></span>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Zip</strong><br>
                                        <span>94107</span>
                                    </div>
                                </div> -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Address</strong><br>
                                        <span><?= $dataContent['parent']['order_alamat'] ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Address</strong><br>
                                        <span><?= $dataContent['parent']['order_company_name'] ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Company name</strong><br>
                                        <span>Mobel Inc</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/col-md-6-->

                    </div>

                    <!-- === right content === -->

                    <div class="col-md-6">
                        <div class="white-block">

                            <div class="h4">Choose payment</div>

                            <hr>

                            <span class="checkbox">
                                <input type="radio" id="paymentID1" name="paymentOption" checked="checked">

                                <label for="paymentID1">
                                    <div class="image">
                                        <!-- <a href=""> -->
                                        <img style="width: 100px;" src="assets/images/mandiri.png" alt="">
                                        <!-- </a> -->
                                    </div>
                                    <strong>Bank Mandiri</strong> <br>
                                    <small>Nomor : 112-0098146017</small><br>
                                    <small>a/n : PT Indometal Asia</small><br>
                                    <small>Mandiri KCP Pangkalpinang</small>
                                </label>
                            </span>

                            <!-- <span class="checkbox">
                                <input type="radio" id="paymentID2" name="paymentOption">
                                <label for="paymentID2">
                                    <strong>PayPal</strong> <br>
                                    <small>Purchase with your fingertips. Look for us the next time you're paying from a mobile app, and checkout faster on thousands of mobile websites.</small>
                                </label>
                            </span> -->

                            <!-- <span class="checkbox">
                                <input type="radio" id="paymentID3" name="paymentOption">
                                <label for="paymentID3">
                                    <strong>Pay via bank transfer</strong> <br>
                                    <small>You can make payments directly into our bank account and email the bank wire transfer receipt to us. We recommend bank wire transfer for payments exceeding $500,00. </small>
                                </label>
                            </span> -->

                            <hr>

                            <p>Please allow three working days for the payment confirmation to reflect in your <a href="#">online account</a>. Once your payment is confirmed, we will generate your e-invoice, which you can view/print from your account or email.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================  Cart wrapper ======================== -->

        <div class="cart-wrapper">
            <!--cart header -->

            <div class="cart-block cart-block-header clearfix">
                <div>
                    <span>Product</span>
                </div>
                <div>
                    <span>&nbsp;</span>
                </div>
                <div>
                    <span>Quantity</span>
                </div>
                <div class="text-right">
                    <span>Price</span>
                </div>
            </div>

            <!--cart items-->

            <div class="clearfix">
                <?php foreach ($dataContent['item'] as $s) {
                    if ($s['image'] != 'default.jpg') {
                        $url_img = apps_url() . 'uploads/products/' . $s['image'];
                    } else {
                        $url_img = base_url('assets/images/default.png');
                    }
                ?>
                    <div class="cart-block cart-block-item clearfix">
                        <div class="image">
                            <a href="product.html"><img src="<?= $url_img ?>" alt=""></a>
                        </div>
                        <div class="title">
                            <div class="h4"><a href="product.html"><?= $s['product_name'] ?></a></div>
                            <div><?= $s['category_name'] ?></div>
                        </div>
                        <div class="quantity">
                            <strong><?= $s['qyt'] ?></strong>
                        </div>
                        <div class="price">
                            <span class="final h3"><?= number_format($s['sub_total'], '2') ?></span>
                            <span class="discount"><?= number_format($s['unit_price'], '2') ?></span>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <!--cart prices -->

            <div class="clearfix">

                <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <strong>Delivery</strong>
                    </div>
                    <div>
                        <span>Rp. <?= number_format($dataContent['parent']['delivery_price'], '2') ?></span>
                    </div>
                </div>
            </div>

            <!--cart final price -->

            <div class="clearfix">
                <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <!-- <strong>Promo code included!</strong> -->
                    </div>
                    <div>
                        <div class="h2 title">Rp. <?= number_format($dataContent['parent']['total'], '2') ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================  Cart navigation ======================== -->

        <?php if ($dataContent['parent']['status'] == 'unpaid') { ?>
            <div class="clearfix">
                <div class="row">
                    <div class="float-right" style="float: right;">
                        <a href="<?= base_url('invoice/upload/s?number=') . $dataContent['parent']['invoice_number'] ?>" class="btn btn-main"><span class="icon icon-cart"></span> Upload Bukti Bayar</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <!--/container-->

</section>
<!-- <script>
    function delete_checkout(id) {
        $.ajax({
            url: `<?= site_url('PublicController/deleteCart') ?>`,
            type: "GET",
            data: {
                id: id,
            },
            success: function(data) {
                var json = JSON.parse(data);
                if (json["error"]) {
                    swal("Sorry Barang Tidak Tersedia", json["message"], "error");
                    return;
                }
                location.reload();
            }
        })
    }
    total = 0;
    outer_prov = $('#outer_prov');
    inner_prov = $('#inner_prov');
    pickup = $('#pickup');
    alamat_pengiriman = $('#alamat_pengiriman');
    alamat_pengiriman_input = $('#alamat_pengiriman_input');

    info_delivery_price = $('#info_delivery_price');
    info_delivery = $('#info_delivery');
    delivery_form = $('#delivery_form');

    payment_process = $('#payment_process');

    info_delivery.hide();
    alamat_pengiriman.hide();

    outer_prov.on('change', function() {
        detectDevelivery()
    })
    inner_prov.on('change', function() {
        detectDevelivery()
    })
    pickup.on('change', function() {
        detectDevelivery()
    })

    function detectDevelivery() {
        var genderSRadio = document.querySelector("input[name=deliveryOption]:checked");
        var genderSValue = genderSRadio ? genderSRadio.value : "";
        console.log(genderSValue);
        if (genderSValue == 'outer_prov') {
            alamat_pengiriman.show();
            info_delivery.show();
            info_delivery_price.html(formatRupiah(10000000, 'Rp. '))

            total_checkout.html(formatRupiah(total + 10000000, 'Rp. '))
        } else if (genderSValue == 'inner_prov') {

            alamat_pengiriman.show();
            info_delivery.show();
            info_delivery_price.html(formatRupiah(2000000, 'Rp. '))
            total_checkout.html(formatRupiah(total + 2000000, 'Rp. '))
        } else if (genderSValue == 'pickup') {
            info_delivery.show();
            info_delivery_price.html(formatRupiah(0, 'Rp. '))
            alamat_pengiriman.hide();
        } else {}
    };

    var dataCart = <?php $CI = &get_instance();
                    $cart = $CI->MyCart();
                    echo json_encode($cart)
                    ?>;
    var base_img = "<?= base_url() ?>"
    var apps_img = "<?= apps_url() ?>"

    checkout_items = $('#checkout_items');
    total_checkout = $('#total_checkout');
    console.log(dataCart);

    dataCart.forEach((d) => {
        var inputItem = '';
        if (d['type'] == 'Service') {
            var date1 = new Date(d['from_order']);
            var date2 = new Date(d['to_order']);
            var Difference_In_Time = date2.getTime() - date1.getTime();

            // To calculate the no. of days between two dates
            var Difference_In_Days = Math.ceil(Difference_In_Time / (1000 * 3600 * 24));

            inputItem = ` <div class="quantity"> ${d['from_order'].substr(0,16)} <br> ${d['to_order'].substr(0,16)}  <hr>${Difference_In_Days} days </div>
                        `
            subtot = Difference_In_Days * d['purchase']
        } else {
            inputItem = `<div class="quantity"> ${d['qyt']} </div>`
            subtot = d['qyt'] * d['purchase']
        }
        total = total + subtot;
        checkout_items.append(`<div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="product.html"><img src="${d['image'] == 'default.jpg' ? base_img+'assets/images/default.png' : apps_img+'uploads/products/'+d['image']}" alt=""></a>
                    </div>
                    
                    <div class="title">
                        <div class="h4"><a href="product.html">${d['product_name']}</a></div>
                        <div>${d['category_name']}</div>
                    </div>
                ${inputItem}
                    <div class="price">
                        <span class="final h3">Rp. ${formatRupiah(subtot)}</span>
                        <span class="discount">Rp. ${formatRupiah(d['purchase'])}</span>
                    </div>
                    <span class="icon icon-cross icon-delete" onclick="delete_checkout(${d['id']})"></span>
                </div>
      `)
        total_checkout.html(formatRupiah(total, 'Rp. '))
        console.log(d)
    });

    function formatRupiah(angka, prefix) {
        console.log(angka)
        var number_string = angka.toString(),
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

    payment_process.on('click', (ev) => {
        ev.preventDefault();
        var genderSRadio = document.querySelector("input[name=deliveryOption]:checked");
        var genderSValue = genderSRadio ? genderSRadio.value : "";
        console.log(genderSValue);
        if (genderSValue == 'outer_prov') {

            if (alamat_pengiriman_input.val() == '' || alamat_pengiriman_input.val() == null) {
                swal("Process Delivery Gagal !!", "alamat kosong", "error");
                return;
            };

        } else if (genderSValue == 'inner_prov') {
            if (alamat_pengiriman_input.val() == '' || alamat_pengiriman_input.val() == null) {
                swal("Process Delivery Gagal !!", "alamat kosong", "error");
                return;
            };
        } else if (genderSValue == 'pickup') {

        } else {
            swal("Process Delivery Gagal !!", "pilih metode Pengiriman", "error");
            return;
        }

        $.ajax({
            url: `<?= site_url('PublicController/payment_proccess') ?>`,
            type: "post",
            data: delivery_form.serialize(),
            success: function(data) {
                var json = JSON.parse(data);
                if (json["error"]) {
                    swal("Process Delivery Gagal !!", json["message"], "error");
                    return;
                }
                location.replace("<?= base_url('payment?s=') ?>" + json['data'])
                // location.reload();
            }
        })
    })
    // (dataCart) {}
</script> -->