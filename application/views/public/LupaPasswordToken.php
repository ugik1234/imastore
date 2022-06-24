    <section class="login-wrapper login-wrapper-page">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Sign in</h3>
            </header>

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 col-md-offset-3">

                    <!-- === login-wrapper === -->

                    <div class="login-wrapper">

                        <div class="white-block">

                            <!--signin-->

                            <div class="login-block login-block-signin">

                                <div class="h4">Sign in <a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">create an account</a></div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control" placeholder="User ID">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" value="" class="form-control" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId3">
                                            <label for="checkBoxId3">Remember me</label>
                                        </span>
                                    </div>

                                    <div class="col-xs-6 text-right">
                                        <a href="#" class="btn btn-main">Login</a>
                                    </div>
                                </div>
                            </div>
                            <!--/signin-->
                            <!--signup-->

                            <div class="login-block login-block-signup">

                                <div class="h4">Register now <a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right">Log in</a></div>

                                <hr />
                                <form id="registerForm" class="m-t" role="form">

                                    <div class="row">

                                        <input type="text" value="<?= $dataContent['id_user'] ?>" class="form-control" id="id_user" name="id_user" placeholder="Name: *">
                                        <input type="text" value="<?= $dataContent['token'] ?>" class="form-control" id="token" name="token" placeholder="Company name: *">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" placeholder="New Password" class="form-control" id="password" name="password" autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" placeholder="Re-New Password" class="form-control" id="repassword" name="repassword" autocomplete="new-password">
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-12">
                                            <hr />
                                            <span class="checkbox">
                                                <input type="checkbox" id="checkBoxId1" value="cek">
                                                <label for="checkBoxId1">I have read and accepted the <a href="#">terms</a>, as well as read and understood our terms of <a href="#">business contidions</a></label>
                                            </span>
                                            <span class="checkbox">
                                                <input type="checkbox" id="checkBoxId2">
                                                <label for="checkBoxId2">Subscribe to exciting newsletters and great tips</label>
                                            </span>
                                            <hr />
                                        </div> -->

                                        <div class="col-md-12">
                                            <button href="#" id="registerBtn" class="btn btn-main btn-block">Reset</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <!--/signup-->
                        </div>
                    </div>
                    <!--/login-wrapper-->
                </div>
                <!--/col-md-6-->

            </div>

        </div>
    </section>
    <script>
        $(document).ready(function() {

            var registerForm = $('#registerForm');
            var submitBtn = registerForm.find('#registerBtn');
            // cek_1 = $("#checkBoxId1");
            // cek_2 = $("#checkBoxId2");
            // // cek_2 = document.getElementById("checkBoxId2").checked;
            // valid_cek()

            // cek_1.on('change', function() {
            //     valid_cek()
            // })
            // cek_2.on('change', function() {
            //     valid_cek()
            // })

            // function valid_cek() {
            //     if (document.getElementById("checkBoxId1").checked && document.getElementById("checkBoxId2").checked) {
            //         document.getElementById("registerBtn").disabled = false;
            //     } else {
            //         document.getElementById("registerBtn").disabled = true;
            //     }
            // }
            registerForm.on('submit', (ev) => {
                ev.preventDefault();
                // console.log(document.getElementById("checkBoxId1").checked)
                // if ($('#password').val() != $('#repassword').val()) {
                //     swal("Registrasi Gagal", 'Password tidak sama!!', "error");
                //     return;
                // }
                // if (document.getElementById("checkBoxId1").checked && document.getElementById("checkBoxId1").checked) {

                buttonLoading(submitBtn);
                $.ajax({
                    url: "<?= site_url() . 'reset-password-process' ?>",
                    type: "POST",
                    data: registerForm.serialize(),
                    success: (data) => {
                        buttonIdle(submitBtn);
                        json = JSON.parse(data);
                        if (json['error']) {
                            swal("Reset Gagal", json['message'], "error");
                            return;
                        } else {
                            swal("Success", 'Silahkan login menggunakan password baru anda.', "success").then((result) => {
                                window.location.href = "<?= base_url() ?>";
                            });
                        }
                        // $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
                    },
                    error: () => {
                        buttonIdle(submitBtn);
                    }
                });
                // } else {
                //     document.getElementById("registerBtn").disabled = true;
                // }
            });

        });
    </script>