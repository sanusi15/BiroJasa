<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/app.css">
    <!-- datatable -->
    <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/fontawesome/all.min.css">
    <!-- datatable -->
    <!-- <link rel="shortcut icon" href="<?= base_url('assets/template'); ?>/images/favicon.svg" type="image/x-icon"> -->
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top bg-primary">
                    <div class="container">
                        <div class="logo">
                            <h2 class="text-white">Biro Jasa Alifan</h2>
                        </div>
                        <div class="header-top-right align-center justify-content-center">
                            <?php if(!$this->uri->segment(1) == '') : ?>
                            <a href="<?= base_url('/'); ?>" class="btn border-white border-2">
                                <i class="bi bi-house-fill rounded-circle bg-white px-2 py-1 text-primary fs-6"></i>
                                <span class="text-white fst-italic ">Dashborad</span>
                            </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            </header>