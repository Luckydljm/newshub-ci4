<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NewsHub - <?= $title; ?></title>

    <link rel="stylesheet" href="../../../assets/css/main/app.css" />
    <link rel="stylesheet" href="../../../assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="../../../assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="../../../assets/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="../../../assets/css/shared/iconly.css" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="../../../assets/css/main/style.css" />

    <!-- datatables -->
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css"
        rel="stylesheet" />

    <!-- Summernote -->
    <link rel="stylesheet" href="../../../assets/css/pages/summernote.css" />
    <link rel="stylesheet" href="../../../assets/extensions/summernote/summernote-lite.css" />

</head>

<body>
    <script src="../../../assets/js/initTheme.js"></script>

    <div id="app">
        <?= $this->include('/layouts/sidebar'); ?>
        <main id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page">
                <?php $this->renderSection('heading') ?>
                <br>
                <?php $this->renderSection('content') ?>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; NEWSHub.</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart"></i></span> by
                            Kelompok 8
                        </p>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script src="../../../assets/js/app.js"></script>
    <script src="../../../assets/js/bootstrap.js"></script>

    <!-- Need: Apexcharts -->
    <script src="../../../assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="../../../assets/js/pages/dashboard.js"></script>

    <!-- Datatables -->
    <script src="../../../assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js">
    </script>

    <!-- Summernote -->
    <script src="../../../assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="../../../assets/js/pages/summernote.js"></script>

    <!-- page scripts -->
    <?= $this->renderSection('scripts'); ?>
</body>

</html>