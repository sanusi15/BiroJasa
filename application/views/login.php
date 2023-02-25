<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flashdata" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Silahkan isi kolom username dan password.</p>

                    <form action="<?= base_url('signIn'); ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>                       
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum memiliki akun? <a href="auth-register.html" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Lupa password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <!-- sweatalert -->
    <script src="<?= base_url('assets/template'); ?>/vendors/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var flash = $('.flashdata').data('flash');
        if (flash == 'loginFailed') {
            Swal.fire({
                position: 'top-start',
                icon: 'error',
                title: 'Login Failed',
                text: 'Please check username and password!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
</body>

</html>