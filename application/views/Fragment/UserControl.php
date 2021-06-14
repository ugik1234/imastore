<div class="envelope-wrapper">
    <div class="h4">Mail Box</div>
    <!-- <form id="loginForm">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required" autocomplete="username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" autocomplete="current-password"/>
                        </div>
                        <div class="form-group">
                            <a href="#forgotpassword" class="open-popup">Forgot password?</a>
                            <a href="#createaccount" class="open-popup">Don't have an account?</a>
                        </div>
                        <button id="loginBtn" type="submit" class="btn btn-block btn-main">
                            Submit
                        </button>
                    </form> -->
</div>
<div class="login-wrapper">
    <div class="h4"><?= $this->session->userdata['username'] ?></div>
    <!-- <form id="loginForm">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required" autocomplete="username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" autocomplete="current-password"/>
                        </div>
                        <div class="form-group">
                            <a href="#forgotpassword" class="open-popup">Forgot password?</a>
                            <a href="#createaccount" class="open-popup">Don't have an account?</a>
                        </div>
                    </form> -->
    <button id="logout" type="submit" class="btn btn-block btn-main glyphicon glyphicon-log-out">
        Logout
    </button>
</div>
<script>
    $(document).ready(function() {

        var logout = $('#logout');
        // var submitBtn = loginForm.find('#loginBtn');
        <?php if (!empty($activator)) {
            echo 'swal("Succes Activation", "", "success")';
        } ?>;

        logout.on('click', (ev) => {
            ev.preventDefault();
            buttonLoading(logout);
            $.ajax({
                url: "<?= site_url() . 'logout' ?>",
                type: "POST",
                data: {},
                success: (data) => {
                    buttonIdle(logout);
                    json = JSON.parse(data);
                    if (json['error']) {
                        swal("Logout Gagal", json['message'], "error");
                        return;
                    }
                    $(location).attr('href', '<?= base_url() ?>');
                },
                error: () => {
                    buttonIdle(submitBtn);
                }
            });
        });

    });
</script>