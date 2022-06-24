<div class="step-wrapper">
    <div class="container">

        <div class="stepper">
            <ul class="row">
                <li class="col-md-3 active">
                    <span data-text="Cart items"></span>
                </li>
                <li class="col-md-3">
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
                <!-- <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <strong>Discount 15%</strong>
                    </div>
                    <div>
                        <span>$ 159,00</span>
                    </div>
                </div>

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
                <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                    <div>
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
                    <a href="<?= base_url('delivery') ?>" class="btn btn-main"><span class="icon icon-cart"></span> Proceed to delivery</a>
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
                // document.getElementById("cart_" + id).remove();
                // count_cart = document.getElementById("cart_count1").innerHTML;
                // document.getElementById("cart_count1").innerHTML = parseInt(count_cart) - 1;
                // document.getElementById("cart_count2").innerHTML = parseInt(count_cart) - 1;
                // document.getElementById("final_price").innerHTML = 'Rp. ' + json['data'];

            }
        })
    }
    var dataCart = <?php $CI = &get_instance();
                    $cart = $CI->MyCart();
                    echo json_encode($cart)
                    ?>;
    var base_img = "<?= base_url() ?>"
    var apps_img = "<?= apps_url() ?>"

    checkout_items = $('#checkout_items');
    total_checkout = $('#total_checkout');
    console.log(dataCart);
    total = 0;
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
            subtot = Difference_In_Days * d['retail']
        } else {
            inputItem = `<div class="quantity"> ${d['qyt']} </div>`
            subtot = d['qyt'] * d['retail']
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
                        <span class="discount">Rp. ${formatRupiah(d['retail'])}</span>
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
    // (dataCart) {}
</script>