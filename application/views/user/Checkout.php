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
                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="product.html"><img src="assets/images/product-7.png" alt=""></a>
                    </div>
                    <div class="title">
                        <div class="h4"><a href="product.html">Coffee machine</a></div>
                        <div>Electronics</div>
                    </div>
                    <div class="quantity">
                        <input type="number" value="2" class="form-control form-quantity">
                    </div>
                    <div class="price">
                        <span class="final h3">$ 150,00</span>
                        <span class="discount">$ 190,00</span>
                    </div>
                    <!--delete-this-item-->
                    <span class="icon icon-cross icon-delete"></span>
                </div>

                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="product.html"><img src="assets/images/product-8.png" alt=""></a>
                    </div>
                    <div class="title">
                        <div class="h4"><a href="product.html">Iron set</a></div>
                        <div>Home accessories</div>
                    </div>
                    <div class="quantity">
                        <input type="number" value="2" class="form-control form-quantity">
                    </div>
                    <div class="price">
                        <span class="final h3">$ 390,00</span>
                        <span class="discount">$ 490,00</span>
                    </div>
                    <!--delete-this-item-->
                    <span class="icon icon-cross icon-delete"></span>
                </div>

                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="product.html"><img src="assets/images/product-10.png" alt=""></a>
                    </div>
                    <div class="title">
                        <div class="h4"><a href="product.html">Wireless Headphones</a></div>
                        <div>Green corner</div>
                    </div>
                    <div class="quantity">
                        <input type="number" value="2" class="form-control form-quantity">
                    </div>
                    <div class="price">
                        <span class="final h3">$ 180,00</span>
                        <span class="discount">$ 200,00</span>
                    </div>
                    <!--delete-this-item-->
                    <span class="icon icon-cross icon-delete"></span>
                </div>

                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="product.html"><img src="assets/images/product-12.png" alt=""></a>
                    </div>
                    <div class="title">
                        <div class="h4"><a href="product.html">E-shaver 500</a></div>
                        <div>Electronics</div>
                    </div>
                    <div class="quantity">
                        <input type="number" value="2" class="form-control form-quantity">
                    </div>
                    <div class="price">
                        <span class="final h3">$ 199,00</span>
                        <span class="discount">$ 149,00</span>
                    </div>
                    <!--delete-this-item-->
                    <span class="icon icon-cross icon-delete"></span>
                </div>
            </div>

            <!--cart prices -->

            <div class="clearfix">
                <div class="cart-block cart-block-footer clearfix">
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

            <!--cart final price -->

            <div class="clearfix">
                <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                    <div>
                        <span class="checkbox">
                            <input type="checkbox" id="couponCodeID">
                            <label for="couponCodeID">Promo code</label>
                            <input type="text" class="form-control form-coupon" value="" placeholder="Enter your coupon code" style="display: none;">
                        </span>
                    </div>
                    <div>
                        <div class="h2 title">$ 1259,00</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================  Cart navigation ======================== -->

        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <a href="#" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Shop more</a>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="checkout-2.html" class="btn btn-main"><span class="icon icon-cart"></span> Proceed to delivery</a>
                </div>
            </div>
        </div>

    </div>
    <!--/container-->

</section>