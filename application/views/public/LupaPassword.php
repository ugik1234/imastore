    <section class="login-wrapper login-wrapper-page">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Lupa Password</h3>
            </header>

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 col-md-offset-3">

                    <!-- === login-wrapper === -->

                    <div class="login-wrapper">

                        <div class="white-block">



                            <div class="login-block login-block-signup">

                                <div class="h4">Lupa Password</div>

                                <hr />
                                <form id="registerForm" class="m-t" role="form">

                                    <div class="row">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control" id="email" name="email" placeholder="Email: *" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button href="" id="registerBtn" class="btn btn-main btn-block">Kirim</button>
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
                    url: "<?= site_url() . 'lupas-process' ?>",
                    type: "POST",
                    data: registerForm.serialize(),
                    success: (data) => {
                        buttonIdle(submitBtn);
                        json = JSON.parse(data);
                        if (json['error']) {
                            swal("Gagal", json['message'], "error");
                            return;
                        } else {
                            swal("Berhasil", 'silahkan periksa email anda.', "success").then((result) => {
                                window.location.href = "<?= base_url() ?>";
                            })
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