<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/unslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/extensions/autoFill.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/select.dataTables.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/css/core/menu/menu-types/vertical-multi-level-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-climacon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-callout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/extensions/toastr.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}

</head>

<body class="vertical-layout vertical-mmenu 2-columns menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-mmenu" data-col="2-columns">

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12">
                    <h3 class="content-header-title">
                        @yield('title')
                    </h3>
                    @yield('breadcrumb')
                </div>
            </div>
            @yield('content')
        </div>
    </div>


    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.delete', function() {
            var url = $(this).data('url');
            var icon = 'question';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            Swal.fire({
                title: 'Apakah Anda Yakin Ingin Menghapus?',
                text: 'Data akan terhapus secara permanen',
                icon: icon,
                showCancelButton: true
            }).then((action) => {
                if (action.isConfirmed) {
                    console.log(action);
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire('Berhasil', 'Data Berhasil Dihapus', 'success')
                                .then(function() {
                                    location.reload();
                                })
                        },
                        error: function(data) {
                            console.log('Error :' + data);
                        }
                    })
                }
            })
        });
    </script>

    <script>
        $('#form').submit(function(e) {
            let form = this;
            e.preventDefault();

            confirmSubmit(form);
        });
    </script>

    <script>
        function confirmSubmit(form, buttonId) {
            Swal.fire({
                icon: 'question',
                text: 'Apakah anda yakin ingin menyimpan data ini ?',
                showCancelButton: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary mr-1',
                    cancelButton: 'btn btn-secondary margin-cancel-button',
                },
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    let button = 'btnSubmit';

                    if (buttonId) {
                        button = buttonId;
                    }

                    $('#' + button).attr('disabled', 'disabled');
                    $('#loader').removeClass('d-none');

                    form.submit();
                }
            });
        }
    </script>

    <script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function(params) {
            @if (session('success'))
                toastr.success('{{ session('success') }}', 'Notification')
            @endif ()
            @if (session('error'))
                toastr.error('{{ session('error') }}', 'Notification')
            @endif ()
        })
    </script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/menu/jquery.mmenu.all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/extensions/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/extensions/knob.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('assets/data/jvector/visitor-data.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/charts/echarts/echarts.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/timeline/horizontal-timeline.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/extensions/unslider-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="https://www.google.com/jsapi"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/js/scripts/pages/dashboard-crm.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/forms/input-groups.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/tables/datatables-extensions/datatable-autofill.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/scripts/charts/google/bar/bar-stacked.js') }}"></script> --}}
    <!-- END PAGE LEVEL JS-->

    @yield('script')
</body>

</html>
