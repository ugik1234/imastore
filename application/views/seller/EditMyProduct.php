<section class="product">
    <div class="main">
        <div class="container">
            <div class="row product-flex">

                <div class="col-md-4 col-sm-12 product-flex-info">
                    <div class="clearfix">
                        <form class="form-horizontal" id="form_edit_info" opd="form" onsubmit="return false;" type="multipart" autocomplete="off">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-12">Nama Product</label>
                                <div class="col-lg-12">
                                    <input type="hidden" class="form-control" id="id_product" name="id_product">
                                    <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-12">Harga</label>
                                <div class="col-lg-12">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <!-- <div class="input-group mb-3"> -->
                                            <span class="input-group-text col-sm-2" id="inputGroup-sizing-default">Rp</span>
                                            <div class="col-sm-10">
                                                <input type="text" id="price" name="price" class="form-control col-lg-12" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-lg-12 control-label">Stock</label>
                                <div class="col-lg-12">
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4" class="col-lg-12 control-label">Deskripsi</label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" id="deskripsi_product" name="deskripsi_product" placeholder="Deskripsi"></textarea>
                                    <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Email"> -->
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail4" class="col-lg-12 control-label">Kategori</label>
                                <div class="col-lg-12">
                                    <select class="form-control mr-sm-2" name="category" id="category" required="required"></select>
                                    <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Email"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4" class="col-lg-12 control-label">Sub Kategori</label>
                                <div class="col-lg-12">
                                    <select class="form-control mr-sm-2" name="sub_category" id="sub_category"></select>
                                    <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Email"> -->
                                </div>
                            </div>

                            <div class="form-group col-lg-12 " id="cover_product_form">
                                <label for="cover_product">Cover Product </label>
                                <div class="col-lg-12">

                                    <p class="no-margins"><span id="cover_product">-</span></p>
                                </div>
                            </div>

                        </form><!-- </h1> -->

                        <div class="clearfix">

                            <a type="submit" id="add_img_btn_edit" class="btn btn-main"> <i class="glyphicon glyphicon-plus"></i> Tambah Gambar Produk</a>

                            <!-- === price wrapper === -->

                            <div class="price">
                                <span class="h3">

                                    <small></small>
                                </span>
                            </div>
                            <hr>

                            <!-- === info-box === -->

                            <div class="info-box">
                                <span><strong>Maifacturer</strong></span>
                                <span>Brand name</span>
                            </div>

                            <!-- === info-box === -->

                            <div class="info-box">
                                <span><strong>Materials</strong></span>
                                <span>Wood, Leather, Acrylic</span>
                            </div>

                            <!-- === info-box === -->

                            <div class="info-box">
                                <span><strong>Availability</strong></span>
                                <span><i class="fa fa-check-square-o"></i> In stock</span>
                                <span class="hidden"><i class="fa fa-truck"></i> Out of stock</span>
                            </div>

                            <hr>

                            <div class="info-box info-box-addto added">
                                <span>
                                    <i class="add"><i class="fa fa-heart-o"></i> Add to favorites</i>
                                    <i class="added"><i class="fa fa-heart"></i> Remove from favorites</i>
                                </span>
                            </div>

                            <div class="info-box info-box-addto">
                                <span>
                                    <i class="add"><i class="fa fa-eye-slash"></i> Add to Watch list</i>
                                    <i class="added"><i class="fa fa-eye"></i> Remove from Watch list</i>
                                </span>
                            </div>

                            <div class="info-box info-box-addto">
                                <span>
                                    <i class="add"><i class="fa fa-star-o"></i> Add to Collection</i>
                                    <i class="added"><i class="fa fa-star"></i> Remove from Collection</i>
                                </span>
                            </div>

                            <hr>

                            <!-- === info-box === -->

                            <div class="info-box">
                                <span><strong>Available Colors</strong></span>
                                <div class="product-colors clearfix">
                                    <span class="color-btn color-btn-red"></span>
                                    <span class="color-btn color-btn-blue checked"></span>
                                    <span class="color-btn color-btn-green"></span>
                                    <span class="color-btn color-btn-gray"></span>
                                    <span class="color-btn color-btn-biege"></span>
                                </div>
                            </div>

                            <!-- === info-box === -->

                            <div class="info-box">
                                <span><strong>Choose size</strong></span>
                                <div class="product-colors clearfix">
                                    <span class="color-btn color-btn-biege">
                                        <span class="product-size" data-text="">S</span>
                                    </span>
                                    <span class="color-btn color-btn-biege checked">M</span>
                                    <span class="color-btn color-btn-biege">XL</span>
                                    <span class="color-btn color-btn-biege">XXL</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- === product item gallery === -->

                <div class="col-md-8 col-sm-12">


                    <div class="col-sm-12" id="product-indicators"></div>
                    <div class="col-md-12 col-sm-12 product-flex-gallery">
                        <a type="submit" id="save_btn_edit" class="btn btn-save" data-text="Save"></a>
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
                        <!-- <div class="owl-product-gallery open-form-gallery owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer autoHeight" style="height: 540px;">
                            <div class="owl-wrapper" style="width: 2880px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                                <div class="owl-item" style="width: 720px;"><a href="assets/images/product-10.png"><img src="assets/images/product-10.png" alt="" height="500"></a></div>
                                <div class="owl-item" style="width: 720px;"><a href="assets/images/product-10a.png"><img src="assets/images/product-10a.png" alt="" height="500"></a></div>
                            </div>
                        </div>

                        <div class="owl-controls clickable">
                            <div class="owl-pagination">
                                <div class="owl-page active"><span class=""></span></div>
                                <div class="owl-page"><span class=""></span></div>
                            </div>
                            <div class="owl-buttons">
                                <div class="owl-prev"><span class="icon icon-chevron-left"></span></div>
                                <div class="owl-next"><span class="icon icon-chevron-right"></span></div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- === product-info === -->

    <div class="info">
        <div class="container">
            <div class="row">

                <!-- === product-designer === -->

                <div class="col-md-3">
                    <div class="brands">
                        <div class="box">
                            <div class="image">
                                <img src="assets/images/logo-2.png" alt="Alternate Text">
                            </div>
                            <div class="name">
                                <p>Brand name</p>
                                <p><a href="#">Brand Url</a></p>
                                <p><a href="#">More about brand</a></p>
                            </div>
                            <!--/name-->
                        </div>
                        <!--/box-->
                    </div>
                    <!--/designer-->
                </div>
                <!--/col-md-4-->
                <!-- === nav-tabs === -->

                <div class="col-md-9">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#about" aria-controls="about" role="tab" data-toggle="tab">
                                <i class="icon icon-history"></i>
                                <span>About</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#specs" aria-controls="specs" role="tab" data-toggle="tab">
                                <i class="icon icon-sort-alpha-asc"></i>
                                <span>Specification</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#rating" aria-controls="rating" role="tab" data-toggle="tab">
                                <i class="icon icon-thumbs-up"></i>
                                <span>Rating</span>
                            </a>
                        </li>
                    </ul>

                    <!-- === tab-panes === -->

                    <div class="tab-content">

                        <!-- ============ tab #1 ============ -->

                        <div role="tabpanel" class="tab-pane active" id="about">
                            <div class="content">
                                <h3>About this Item</h3>
                                <p>
                                    While we aim to provide accurate product information, it is provided by manufacturers, suppliers and others, and has not been verified by us. See our disclaimer.
                                    The beauty of the Q7C arc is a visual spectacle. Equipped with the features of the Q7 Flat, but with a bend for immersive viewing, it combines Q Color and an anti-glare screen for a dazzling display unlike any other.
                                    Brandname 65" Class 4K(2160P) Curved Smart QLED TV QN65Q7CN (2018 Model)
                                </p>

                                <hr>

                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Key Features</h3>
                                        <ul>
                                            <li>Diagonal Screen Size: 64.5"</li>
                                            <li>Backlight Type: QLED</li>
                                            <li>Resolution: 2160P</li>
                                            <li>Effective Refresh Rate: 240Hz</li>
                                            <li>Smart Functionality: yes</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>Connectivity</h3>
                                        <ul>
                                            <li>HDMI Inputs: yes, 4</li>
                                            <li>USB Ports: yes, 3</li>
                                            <li>Built-in Wi-Fi: yes</li>
                                            <li>Stereo speakers: yes</li>
                                            <li>Bluetooth: yes</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>Style Elite</h3>
                                        <ul>
                                            <li>One invisible connection</li>
                                            <li>One Connect Box</li>
                                            <li>No gap wall mount</li>
                                            <li>Ultra wide viewing angle</li>
                                            <li>Ambient mode</li>
                                            <li>Boundless 360 design</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/row-->

                            </div>
                            <!--/content-->
                        </div>
                        <!--/tab-pane-->
                        <!-- ============ tab #2 ============ -->

                        <div role="tabpanel" class="tab-pane" id="specs">
                            <div class="content">
                                <h3>Specification</h3>
                                <table class="table table-striped specification">
                                    <tbody>
                                        <tr>
                                            <th>Model</th>
                                            <td>
                                                <div>QN65Q7CNAFXZA</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Screen Size</th>
                                            <td>
                                                <div>65\"</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td>
                                                <div>Brandname</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Assembled Product Weight</th>
                                            <td>
                                                <div>87.1 oz</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Condition</th>
                                            <td>
                                                <div>New</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <td>
                                                <div>qn65q7cnafxza</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions (L x W x H)</th>
                                            <td>
                                                <div>8.30 x 63.70 x 37.80 Inches</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/content-->
                        </div>
                        <!--/tab-pane-->
                        <!-- ============ tab #3 ============ -->

                        <div role="tabpanel" class="tab-pane" id="rating">

                            <!-- ============ ratings ============ -->

                            <div class="content">

                                <h3>Rating</h3>

                                <div class="row">

                                    <!-- === comments === -->

                                    <div class="col-md-12">
                                        <div class="comments">

                                            <!-- === rating === -->

                                            <div class="rating clearfix">
                                                <div class="rate-box">
                                                    <strong>Quality</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                                <!-- rate -->
                                                <div class="rate-box">
                                                    <strong>Design</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                                <!-- rate -->
                                                <div class="rate-box">
                                                    <strong>General</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="comment-wrapper">

                                                <!-- === comment === -->

                                                <div class="comment-block">
                                                    <div class="comment-user">
                                                        <div>
                                                            <img src="assets/images/user-2.jpg" alt="Alternate Text" width="70">
                                                        </div>
                                                        <div>
                                                            <h5>
                                                                <span>John Doe</span>
                                                                <span class="pull-right">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                                <small>03.05.2017</small>
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <!-- comment description -->

                                                    <div class="comment-desc">
                                                        <p>
                                                            In vestibulum tellus ut nunc accumsan eleifend. Donec mattis cursus ligula, id
                                                            iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas
                                                            ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus
                                                            tempor justo et mollis facilisis. Donec placerat at nulla sed suscipit. Praesent
                                                            accumsan, sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec
                                                            gravida
                                                        </p>
                                                    </div>

                                                    <!-- comment reply -->

                                                    <div class="comment-block">
                                                        <div class="comment-user">
                                                            <div>
                                                                <img src="assets/images/user-2.jpg" alt="Alternate Text" width="70">
                                                            </div>
                                                            <div>
                                                                <h5>
                                                                    Administrator
                                                                    <small>08.05.2017</small>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="comment-desc">
                                                            <p>
                                                                Curabitur sit amet elit quis tellus tincidunt efficitur. Cras lobortis id
                                                                elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque
                                                                a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                                nisl egestas diam, nec blandit diam ipsum eget dolor. Maecenas ultricies
                                                                tempus nibh, sit amet facilisis mauris vulputate in.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!--/reply-->
                                                </div>

                                                <!-- === comment === -->

                                                <div class="comment-block">
                                                    <div class="comment-user">
                                                        <div>
                                                            <img src="assets/images/user-2.jpg" alt="Alternate Text" width="70">
                                                        </div>
                                                        <div>
                                                            <h5>
                                                                <span>John Doe</span>
                                                                <span class="pull-right">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                                <small>03.05.2017</small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="comment-desc">
                                                        <p>
                                                            Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus.
                                                            Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                            nisl egestas diam, nec blandit diam ipsum eget dolor. In vestibulum tellus
                                                            ut nunc accumsan eleifend. Donec mattis cursus ligula, id iaculis dui feugiat
                                                            nec. Etiam ut ante sed neque lacinia volutpat. Maecenas ultricies tempus
                                                            nibh, sit amet facilisis mauris vulputate in. Phasellus tempor justo et mollis
                                                            facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit
                                                            amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--/comment-wrapper-->

                                            <div class="comment-header">
                                                <a href="#" class="btn btn-clean-dark">12 comments</a>
                                            </div>
                                            <!--/comment-header-->
                                            <!-- === add comment === -->

                                            <div class="comment-add">

                                                <div class="comment-reply-message">
                                                    <div class="h3 title">Leave a Reply </div>
                                                    <p>Your email address will not be published.</p>
                                                </div>

                                                <form action="#" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" value="" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" value="" placeholder="Your Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="10" class="form-control" placeholder="Your comment"></textarea>
                                                    </div>
                                                    <div class="clearfix text-center">
                                                        <a href="#" class="btn btn-main">Add comment</a>
                                                    </div>
                                                </form>

                                            </div>
                                            <!--/comment-add-->
                                        </div>
                                        <!--/comments-->
                                    </div>


                                </div>
                                <!--/row-->
                            </div>
                            <!--/content-->
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
    <!--/info-->
</section>


<div class="modal inmodal" id="add_image_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Gambar Produk</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="add_image_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="id_product_img" name="id_product_img">
                    <input type="hidden" id="id_product" name="id_product">
                    <div class="form-group" id="product_img_file_form">
                        <label for="product_img_file"></label>
                        <p class="no-margins"><span id="product_img_file">-</span></p>
                    </div>
                    <div class="form-group">
                        <label for="product_img_ket">Keterangan Gambar</label>
                        <input type="text" placeholder="Keterangan Gabar" class="form-control" id="product_img_ket" name="product_img_ket" required="required">
                    </div>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah Data</strong></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var id_perusahaan = `<?= $contentData['id_seller'] ?>`;
        var id_product = `<?= $contentData['id_product'] ?>`;

        $('#price').mask('000.000.000', {
            reverse: true
        });


        var add_image_modal = {
            self: $('#add_image_modal'),
            form: $('#add_image_form'),
            'id_product_img': $('#add_image_form').find('#id_product_img'),
            'product_img_ket': $('#add_image_form').find('#product_img_ket'),
            'product_img_file': new FileUploader($('#add_image_form').find('#product_img_file'), "", "product_img_file", ".jpg , .jpeg , .png", true, true),

            'product_img_file_form': $('#add_image_form').find('#product_img_file_form'),
              'id_product': $('#add_image_form').find('#id_product'),
            //   'catatan_add_image_form': $('#add_image_form').find('#catatan_add_image_form'),
            add_btn: $('#add_image_form').find('#add_btn'),
        }

        var form = {
            'form': $('#form_edit_info'),
            'id_product': $('#form_edit_info').find('#id_product'),
            'nama_product': $('#form_edit_info').find('#nama_product'),
            'category': $('#form_edit_info').find('#category'),
            'sub_category': $('#form_edit_info').find('#sub_category'),
            'stock': $('#form_edit_info').find('#stock'),
            'deskripsi_product': $('#form_edit_info').find('#deskripsi_product'),
            'img': $('#form_edit_info').find('#product-image'),
            'nama_seller': $('#form_edit_info').find('#nama-seller'),
            'edit': $('#form_edit_info').find('#link-edit-product'),
            'price': $('#form_edit_info').find('#price'),
            'cover_product': new FileUploader($('#form_edit_info').find('#cover_product'), "", "cover_product", ".jpg", false, true),
            'cover_product_form': $('#form_edit_info').find('#cover_product_form')

        }

        var swalDeleteConfigure = {
            title: "Konfirmasi hapus",
            text: "Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
        };

        var product_indicators = $('#product-indicators');
        var product_list = $('#product-list');
        var corausel_img = $('#product-image');
        var save_btn_edit = $('#save_btn_edit');
        var add_img_btn = $('#add_img_btn_edit');

        var dataProduct = {}

        $.when(getAllCategory(), getAllSubCategory(), getAllProduct()).then((e) => {
            // toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllCategory() {
            swal({
                title: 'Loading product...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('CategoryController/getAllCategory/') ?>`,
                'type': 'GET',
                data: {
                    id_product: id_product
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    data = json['data'];
                    renderCategory(data);
                },
                error: function(e) {}
            });
        }

        function getAllSubCategory() {
            swal({
                title: 'Loading product...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('CategoryController/getAllSubCategory/') ?>`,
                'type': 'GET',
                data: {
                    id_product: id_product
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    data = json['data'];
                    renderSubCategory(data);
                },
                error: function(e) {}
            });
        }

        function renderCategory(data) {
            console.log(data)
            form.category.empty();
            form.category.append($('<option>', {
                value: "0",
                text: "-- Pilih Category --"
            }));
            Object.values(data).forEach((d) => {
                form.category.append($('<option>', {
                    value: d['id_category'],
                    text: d['id_category'] + ' :: ' + d['nama_category'],
                }));
            });
        }

        function renderSubCategory(data) {
            form.sub_category.empty();
            form.sub_category.append($('<option>', {
                value: "0",
                text: "-- Pilih Sub Category --"
            }));
            Object.values(data).forEach((d) => {
                form.sub_category.append($('<option>', {
                    value: d['id_sub_category'],
                    text: d['id_sub_category'] + ' :: ' + d['nama_sub_category'],
                }));
            });
        }


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
                    id_product: id_product
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataProduct = json['data'][id_product];
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
            console.log(data)
            // product_list.empty();
            // id_product
            form.id_product.val(data['id_product'])
            form.nama_product.val(data['nama_product'])
            form.category.val(data['category'])
            form.sub_category.val(data['sub_category'])
            form.stock.val(data['stock'])
            // form.deskripsi_product.html(data['deskripsi_product'])
            form.deskripsi_product.val(data['deskripsi_product'])
            form.price.val(formatRupiah(data['price']))
            // form.edit.prop('href', '<?= site_url('Seller/editproduct/?s='); ?>' + data['id_product'])
            // href="<?= site_url('Seller/editproduct/?s='); ?>${product['id_product']}"
            form.img.empty()
            product_indicators.append(`
            <img style="height: 70px !important;" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" src="<?= base_url() ?>uploads/cover_product/${data['cover_product']}" class="img-thumbnail col-sm-2" alt="..." > 
            `)



            corausel_img.append(`
                <div class="carousel-item active" data-bs-interval="8000">
                <img style=" max-height: 500px !important;" src="<?= base_url() ?>uploads/cover_product/${data['cover_product']}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
                </div>
                `);
            getImageProduct(data['id_product']);

            $('#price').mask('000.000.000', {
                reverse: true
            });


        }

        add_img_btn.on('click', function() {
            console.log('s')
            add_image_modal.form.trigger('reset');
            add_image_modal.self.modal('show');
            add_image_modal.id_product.val(id_product)
            add_image_modal.add_btn.show();
        })

        add_image_modal.form.submit(function(event) {
            event.preventDefault();

            swal(saveConfirmation("Tambah gambar", "Pastikan ukuran gambar kurang dari 500kb", "Ya, tambah!")).then((result) => {
                if (!result.value) {
                    return;
                }
                buttonLoading(add_image_modal.add_btn);
                $.ajax({
                    url: "<?= site_url('ProductController/add_product_img') ?>",
                    'type': 'POST',
                    data: new FormData(add_image_modal.form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        buttonIdle(add_image_modal.add_btn);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        dataInfo = json['data']
                        renderDokumen(dataInfo);
                        bp3l_rek_modal.self.modal('hide');
                        swal("Simpan Berhasil", "", "success");
                    },
                    error: function(e) {}
                });
            });
        });

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
                    var i = 1;
                    Object.values(dataIMG).forEach((product_img) => {
                        // product_img['']
                        corausel_img.append(`
               
                            <div class="carousel-item align-items-center" data-bs-interval="8000">
                            <img style=" max-height: 700px !important;" src="<?= base_url() ?>uploads/product_img_file/${product_img['product_img_file']}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>${product_img['product_img_ket']}</p>
                                    </div>
                                    <div class="row justify-content-md-center">
                                    <div class="col col-lg-6">
                                    <a data-id='${product_img['id_product_img']}' data-file='${product_img['product_img_file']}' class="deletephoto btn btn-danger d-none d-md-block"><i class="icon icon-trash"> Hapus</i></a>
                                    </div>
                                    </div>
                                    </div>
                            `);
                        product_indicators.append(`
                            <img style="height: 70px !important" data-bs-target="#carouselExampleDark" data-bs-slide-to="${i}" src="<?= base_url() ?>uploads/product_img_file/${product_img['product_img_file']}" class="img-thumbnail col-sm-2" alt="..." > 
                            `)
                        i++;
                    });
                    $('.deletephoto').on('click', function() {
                        console.log('del')
                        event.preventDefault();
                        var id = $(this).data('id');
                        var file = $(this).data('file');
                        swal(swalDeleteConfigure).then((result) => {
                            if (!result.value) {
                                return;
                            }
                            $.ajax({
                                url: "<?= site_url('ProductController/delete_image') ?>",
                                'type': 'POST',
                                data: {
                                    'id_product_img': id,
                                    'file': file
                                },
                                success: function(data) {
                                    var json = JSON.parse(data);
                                    if (json['error']) {
                                        swal("Delete Gagal", json['message'], "error");
                                        return;
                                    }
                                    delete dataUser[id];
                                    swal("Delete Berhasil", "", "success");
                                    renderUser(dataUser);
                                },
                                error: function(e) {}
                            });
                        });

                    })
                },
                error: function(e) {}
            });

        }


        //  '.edit',
        var swalSaveConfigure = {
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        };

        save_btn_edit.on('click', function(e) {
            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                swal({
                    title: 'Loading ...',
                    allowOutsideClick: false
                });
                swal.showLoading();

                // buttonLoading(button);
                $.ajax({
                    url: '<?= site_url('Seller/edit_product') ?>',
                    'type': 'POST',
                    // data: form.form.serialize(),
                    data: new FormData(form.form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        // var user = json['data']
                        // dataUser[user['id_user']] = user;
                        swal("Simpan Berhasil", "", "success");
                        // renderUser(dataUser);
                        // UserModal.self.modal('hide');
                    },
                    error: function(e) {}
                });
            });
        })
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