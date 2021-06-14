           <script>
               function delete_cart(id) {
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
                           document.getElementById("cart_" + id).remove();
                           count_cart = document.getElementById("cart_count1").innerHTML;
                           document.getElementById("cart_count1").innerHTML = parseInt(count_cart) - 1;
                           document.getElementById("cart_count2").innerHTML = parseInt(count_cart) - 1;
                           document.getElementById("final_price").innerHTML = 'Rp. ' + json['data'];

                       }
                   })
               }
           </script>
           <div class="cart-wrapper">
               <div class="checkout">
                   <div class="clearfix">
                       <!--cart item-->
                       <div class="row" id="my_cart">
                           <?php
                            $total = 0;
                            $cart_count = 0;
                            foreach ($cart as $s) {
                                if ($s['image'] != 'default.jpg') {
                                    $url_img = apps_url() . 'uploads/products/' . $s['image'];
                                } else {
                                    $url_img = base_url('assets/images/default.png');
                                }

                                $cart_count++; ?>
                               <div class="cart-block cart-block-item clearfix" id="cart_<?= $s['id'] ?>">
                                   <div class="image">
                                       <a href="product.html"><img src="<?= $url_img ?>" alt="" /></a>
                                   </div>
                                   <div class="title">
                                       <div><a href=""><?= $s['product_name'] ?></a></div>
                                       <small><?= $s['category_name'] ?></small>
                                   </div>
                                   <div class="quantity">
                                       <?php
                                        $origin = new DateTime('2021-06-14 16:11:00');
                                        $target = new DateTime('2021-06-19 14:11:00');
                                        $interval = $origin->diff($target);
                                        // echo $interval->format('%R%a days');
                                        if ($s['type'] == 'Service') {
                                            $startTimeStamp = new DateTime($s['from_order']);
                                            // echo $startTimeStamp;
                                            $endTimeStamp = new DateTime($s['to_order']);
                                            // $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                            $numberDays =
                                                $startTimeStamp->diff($endTimeStamp);
                                            // $numberDays = intval($numberDays);
                                            // var_dump($numberDays);
                                            $d =  $numberDays->format('%a');
                                            $h =  $numberDays->format('%h');
                                            if ($h > 0) $d = (int)$d + 1;
                                            $total = $total + ($d * $s['purchase']);
                                            $cur_total =  ($d * $s['purchase']);
                                            echo $d . 'days';
                                        } else {
                                            $total = $total + ($s['qyt'] * $s['purchase']);
                                            $cur_total   = ($s['qyt'] * $s['purchase']);
                                            echo $s['qyt'];
                                        };
                                        ?>
                                       <!-- <input type="number" value="2" class="form-control form-quantity" /> -->
                                   </div>
                                   <div class="price">
                                       <span class="final">Rp. <?= number_format($cur_total, '2')  ?> </span>
                                       <!-- <span class="discount">$ 2.666</span> -->
                                   </div>
                                   <span class="icon icon-cross icon-delete" onclick="delete_cart(<?= $s['id'] ?>)"></span>
                               </div>
                           <?php } ?>
                       </div>

                       <hr />

                       <!--cart prices -->

                       <!-- <div class="clearfix">
                           <div class="cart-block cart-block-footer clearfix">
                               <div>
                                   aas
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
                           </div>

                           <div class="cart-block cart-block-footer clearfix">
                               <div>
                                   <strong>VAT</strong>
                               </div>
                               <div>
                                   <span>$ 59,00</span>
                               </div>
                           </div>
                       </div>

                       <hr /> -->

                       <!--cart final price -->

                       <div class="clearfix">
                           <div class="cart-block cart-block-footer clearfix">
                               <div>
                                   <strong>Total</strong>
                               </div>
                               <div>
                                   <div class="h4 title" id="final_price">Rp. <?= number_format($total, '2')  ?> </div>
                               </div>
                           </div>
                       </div>

                       <!--cart navigation -->

                       <div class="cart-block-buttons clearfix">
                           <div class="row">
                               <div class="col-xs-6">
                                   <a href="products-grid.html" class="btn btn-clean-dark">Continue shopping</a>
                               </div>
                               <div class="col-xs-6 text-right">
                                   <a href="<?= base_url('checkout') ?>" class="btn btn-main"><span class="icon icon-cart"></span> Checkout</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>