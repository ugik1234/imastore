<div class="step-wrapper">
    <div class="container">
        <div class="stepper">
            <ul class="row">
                <li class="col-md-3 active">
                    <span data-text="Cart items"></span>
                </li>
                <li class="col-md-3 active">
                    <span data-text="Delivery"></span>
                </li>
                <li class="col-md-3">
                    <span data-text="Payment"></span>
                </li>
                <li class="col-md-3">
                    <span data-text="Receipt"></span>
                </li>
            </ul>
        </div>
    </div>
</div>


<section class="checkout">

    <div class="container">

        <header class="hidden">
            <h3 class="h3 title">Checkout - Step 1</h3>
        </header>
        <div class="note-block">
            <div class="row">


                <div class="col-md-12">

                    <div class="white-block">

                        <div class="h4">Choose delivery</div>

                        <hr>
                        <form id="delivery_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="checkbox">
                                        <input type="radio" id="outer_prov" name="deliveryOption" value="outer_prov" required>
                                        <label for="outer_prov">Pengiriman Antar Provinsi - <strong>Rp. 10.000.000,00</strong></label>
                                    </span>

                                    <span class="checkbox">
                                        <input type="radio" id="inner_prov" name="deliveryOption" value="inner_prov">
                                        <label for="inner_prov">Pengiriman Dalam Provinsi - <strong>Rp 2.000.000,00</strong></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="pickup" name="deliveryOption" value="pickup">
                                        <label for="pickup">Pick up in the store - <strong>Free</strong></label>
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" id="alamat_pengiriman">
                                        <label>Alamat Pengiriman : </label>
                                        <textarea class="form-control" name="alamat_pengiriman" id="alamat_pengiriman_input"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- <div class="clearfix">
                            <p>Opsi pemenuhan yang kuat dan sering diabaikan adalah menawarkan penjemputan lokal. Jika Anda memiliki lokasi fisik dan memungkinkan pelanggan Anda untuk tidak membayar biaya pengiriman sama sekali, Anda harus melakukannya!</p>
                            <p><strong>Manfaat:</strong></p>
                            <ul>
                                <li>Hindari biaya pengiriman dan pengemasan</li>
                                <li>Kembangkan hubungan tatap muka dengan pelanggan Anda</li>
                                <li>Potensi pembelian tambahan saat pelanggan berada di toko Anda</li>
                            </ul>
                            <p><strong>Tantangan:</strong></p>
                            <ul>
                                <li>Jam kerja yang terbatas terkadang menyulitkan koordinasi pengambilan</li>
                                <li>Pembeli yang melewati batas negara bagian atau kode pos mungkin tidak mengetahui tarif pajak penjualan di wilayah Anda</li>
                            </ul>
                        </div> -->
                    </div>

                </div>

            </div>
        </div>

        <div class="cart-wrapper">
            <!--cart header -->

            <div class="cart-block cart-block-header clearfix">
                <div style="width: 10%;">
                    <span>Product</span>
                </div>
                <div style="width: 50%;">
                    <span>&nbsp;</span>
                </div>
                <div style="width: 10%;">
                    <span>Quantity</span>
                </div>
                <div class="text-right" style="width: 20%;">
                    <span>Price</span>
                </div>
            </div>
            <div class="clearfix" id="checkout_items">
            </div>
            <div class="clearfix">
                <hr>
                <div class="cart-block cart-block-footer clearfix" id="info_delivery">
                    <div>
                        <strong>Delivery</strong>
                        <!-- <a id="info_delivery_label">sss</a> -->
                    </div>
                    <div>
                        <span id="info_delivery_price"></span>
                    </div>
                </div>
                <!-- 

                <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <strong>Shipping</strong>
                    </div>
                    <div>
                        <span>$ 30,00</span>
                    </div>
                </div> -->

                <!-- <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <strong>VAT</strong>
                    </div>
                    <div>
                        <span>$ 59,00</span>
                    </div>
                </div> -->
            </div>
            <div class="clearfix">
                <!-- <hr> -->
                <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                    <div>
                        <h2> <strong>Total</strong></h2>
                    </div>
                    <div>
                        <div class="h2 title" id="total_checkout"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <a href="#" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Shop more</a>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="" class="btn btn-main" id='payment_process'><span class="icon icon-cart"></span> Proceed to delivery</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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
</script>