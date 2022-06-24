<section class="checkout">

    <div class="container">


        <div class="cart-wrapper">
            <!--cart header -->

            <div class="cart-block cart-block-header clearfix">
                <div style="width: 30%">
                    <span>Number</span>
                </div>
                <div style="width: 10%">
                    <span>Status</span>
                </div>
                <div style="width: 10%">
                    <span>Order Date</span>
                </div>
                <div class="text-right" style="width: 30%">
                    <span>Total</span>
                </div>
            </div>
            <div class=" clearfix" id="checkout_items">
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
</section>

<script>
    // function delete_checkout(id) {
    //     $.ajax({
    //         url: `<?= site_url('PublicController/deleteCart') ?>`,
    //         type: "GET",
    //         data: {
    //             id: id,
    //         },
    //         success: function(data) {
    //             var json = JSON.parse(data);
    //             if (json["error"]) {
    //                 swal("Sorry Barang Tidak Tersedia", json["message"], "error");
    //                 return;
    //             }
    //             location.reload();
    //         }
    //     })
    // }
    var checkout_items = $('#checkout_items');
    var dataCart = <?php $CI = &get_instance();
                    $CI->MyInvoice();
                    ?>;
    var link_inv = '<?= base_url('invoice/s?number=') ?>';
    dataCart.forEach((d) => {
        var status = '';
        if (d['status'] == 'unpaid') {
            status = `<span class="label label-danger">${d['status']}</span>`
            // subtot = Difference_In_Days * d['retail']
        } else {
            status = `<span class="label label-info">${d['status']}</span>`
        }
        checkout_items.append(`
                <div class="cart-block cart-block-item clearfix" style="padding: 20px">
                    <div class="title"  style="width: 30%">
                          <div class="h4"><a href="${link_inv+d['invoice_number']}">${d['invoice_number']}</a></div>
                    </div>
                    
                    <div class="title" style="width: 10px">
                        <h3>
                        ${status}
                        </h3>
                    </div>
                    <div class="">
                        <span class="h4">${d['order_date'].split(' ')[0]}</span>
                    </div>
                    <div class="price"  style="width: 30%">
                        <span class="final h4">Rp. ${formatRupiah(d['total'])}</span>
                    </div>
                </div>
      `)

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
</script>