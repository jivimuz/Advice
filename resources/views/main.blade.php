<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Marvel -
        {{ request()->segment(1) ? (str_replace('_', ' ', request()->segment(2)) ?: str_replace('_', ' ', request()->segment(1))) : 'Home' }}
    </title>
    <link rel="stylesheet" href="{{ url('') }}/assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('') }}/assets/images/icon.png" />
    <link rel="stylesheet" href="{{ url('') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/fixedColumn.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/fixedheader.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/datatables.button.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/customStyle.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/select.datatable.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/dropify/css/dropify.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/summernote/summernote.min.css">
</head>
@yield('style')

<body>
    <div class="container-scroller">

        <div class="horizontal-menu">
            @include('layout/header')
            @if (auth()->user())
                @include('layout/navigation')
            @endif
        </div>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="p-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}" class="label "
                                    style="text-decoration-line: none; color:grey"><b><i class="fa fa-home"></i>
                                        Home</b></a></li>

                            <?php if( request()->segment(1)){?>
                            <li class="breadcrumb-item label   {{ request()->segment(2) ? '' : 'text-primary' }}"
                                aria-current="page">
                                {{ str_replace('_', ' ', request()->segment(1)) }}
                            </li>
                            <?php }
                             if( request()->segment(2)){?>
                            <li class="breadcrumb-item  label {{ request()->segment(3) ? '' : 'text-primary' }}"
                                aria-current="page">
                                {{ str_replace('_', ' ', request()->segment(2)) }}
                            </li>
                            <?php }
                                if( request()->segment(3)){?>
                            <li class="breadcrumb-item label text-primary" aria-current="page">
                                {{ str_replace('_', ' ', request()->segment(3)) }}
                            </li>
                            <?php } ?>
                        </ol>
                    </nav>

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('') }}/assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ url('') }}/assets/js/template.js"></script>
    <script src="{{ url('') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ url('') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ url('') }}/assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="{{ url('') }}/assets/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="{{ url('') }}/assets/vendors/justgage/justgage.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ url('') }}/assets/js/dashboard.js"></script>


    <script src="{{ url('') }}/assets/js/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/js/sweetalert2.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/assets/js/datatables.button.js"></script>
    <script src="{{ url('') }}/assets/js/responsive.dataTables.min.js"></script>
    <script src="{{ url('') }}/assets/js/select2.min.js"></script>
    <script src="{{ url('') }}/assets/js/fixedColumn.js"></script>
    <script src="{{ url('') }}/assets/js/fixedheader.js"></script>
    <script src="{{ url('') }}/assets/js/datatables.button.js"></script>
    <script src="{{ url('') }}/assets/js/jszip.js"></script>
    <script src="{{ url('') }}/assets/js/pdfmake.js"></script>
    <script src="{{ url('') }}/assets/js/vpsfont.js"></script>
    <script src="{{ url('') }}/assets/js/button-html4.js"></script>
    <script src="{{ url('') }}/assets/js/buttonprint.js"></script>
    <script src="{{ url('') }}/assets/js/select.datatable.js"></script>
    <script src="{{ url('') }}/assets/dropify/js/dropify.js"></script>
    <script src="{{ url('') }}/assets/js/qrcodelib.js"></script>
    <script src="{{ url('') }}/assets/js/webcodecamjquery.js"></script>
    <script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>
    <script src="{{ url('') }}/assets/js/customFunction.js"></script>
    <script>
        $('#cur_lang').attr('disabled', false)
    </script>


    @yield('script')

</body>

</html>
