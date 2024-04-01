<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('page-title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('page-css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        @include('headers.header')

        @include('menus.menu')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('footers.footer')

        @include('sidebar.sidebar')
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('assets/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(isset($dateRangerPicker)){ ?>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
	<?php } ?>


    <script>
        $(function() {
            // Datatable
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })

        })

        // datepicker
        $('#datepicker').datepicker({
            autoclose: true
        })
        // Select2
        $('.select2').select2()

        // Modal and Error message Time js
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            window.setTimeout(function() {
                $(".alert").fadeTo(5000, 0).slideUp(1000, function() {
                    $(this).remove();
                });
            }, 1500);


            /*
             * Delete table row
             */
            $("#example1").on("click", ".delete-btn", function() {
                var currentObject = $(this);
                var id = currentObject.attr("data-id");
                var url = currentObject.attr("data-route");

                Swal.fire({
                    icon: 'warning',
                    title: `Are you want to sure delete?`,
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            cache: false,
                            type: "DELETE",
                            dataType: "JSON",
                            data: {
                                id: id,
                            },
                            error: function(xhr) {
                                console.log(
                                    "An error occurred: " + xhr.status + " " + xhr
                                    .statusText
                                );
                            },
                            url: url,
                            success: function(response) {
                                if (response.success) {

                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: response.success,
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                    var table = $('#example1').DataTable();
                                    var removingRow = currentObject.closest('tr');
                                    table.row(removingRow).remove().draw();

                                } else {
                                    $.growl({
                                        title: "Error",
                                        style: "error1",
                                        message: "This is Error",
                                        duration: 5000,
                                    });
                                }
                            },
                        });
                    }
                })
            });


        });


        //============ Menu Active


        // $(function() {
        //   setNavigation();
        // });

        // function setNavigation() {
        //   // Get current page URL
        //   var domain    = window.location.origin;
        //   var url = window.location.pathname;
        //   //var url = window.location;

        //   //alert(domain);
        //   // remove # from URL
        //   url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));

        //   // remove parameters from URL
        //   url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));


        //   // select file name
        //   //url = url.substr(url.lastIndexOf("/") + 1);

        //   // If file name not avilable
        //   if(url == ''){
        //       url = '/';
        //   }

        //   // Remove trailing slash
        //   url = url.replace(/\/$/, "");

        //   url = domain+url;
        //   //alert(url);
        //   // Loop all menu items
        //   $(".sidebar-menu a").each(function(){

        //       // select href
        //       var href = $(this).attr('href');
        //       // Check filename
        //       if(url == href){

        //           // Select parent class
        //           var parentClass = $(this).parent('div').attr('class');
        //           //alert(parentClass);

        //           if($(this).parent('div').hasClass('dropdown-menu')){

        //               //alert('d');
        //               // Add class
        //               $(this).addClass('subactive');
        //               $(this).parents('.sidebar-menu li').addClass('active');
        //           }else{

        //               // Add class
        //               $(this).parent('li').addClass('active');
        //           }

        //       }
        //   });
        // }



<<<<<<< HEAD
    // var url = window.location;
    // var href = url.href;
    // let c = href.split("/").length - 3
    // var afterWithout = href.substr(0, href.lastIndexOf("/"));

    // if (c == 1) {
    //     $('ul.sidebar-menu a').filter(function() {
    //         return this.href == url;
    //     }).addClass('active');
    //     // for sidebar menu and treeview
    //     $('ul.treeview-menu a').filter(function() {
    //             return this.href == url;
    //         }).parentsUntil(".sidebar-menu > .treeview-menu")
    //         .css({
    //             'display': 'block'
    //         })
    //         .addClass('menu-open').prev('a')
    //         .addClass('active');
    // } else {
    //     $('ul.sidebar-menu a').filter(function() {
    //         return this.href == afterWithout;
    //     }).addClass('active');
    //     // for sidebar menu and treeview
    //     $('ul.treeview-menu a').filter(function() {
    //             return this.href == afterWithout;
    //         }).parentsUntil(".sidebar-menu > .treeview-menu")
    //         .css({
    //             'display': 'block'
    //         })
    //         .addClass('menu-open').prev('a')
    //         .addClass('active');
    // }
=======
        // var url = window.location;
        // var href = url.href;
        // let c = href.split("/").length - 3
        // var afterWithout = href.substr(0, href.lastIndexOf("/"));

        // if (c == 1) {
        //     $('ul.sidebar-menu a').filter(function() {
        //         return this.href == url;
        //     }).addClass('active');
        //     // for sidebar menu and treeview
        //     $('ul.treeview-menu a').filter(function() {
        //             return this.href == url;
        //         }).parentsUntil(".sidebar-menu > .treeview-menu")
        //         .css({
        //             'display': 'block'
        //         })
        //         .addClass('menu-open').prev('a')
        //         .addClass('active');
        // } else {
        //     $('ul.sidebar-menu a').filter(function() {
        //         return this.href == afterWithout;
        //     }).addClass('active');
        //     // for sidebar menu and treeview
        //     $('ul.treeview-menu a').filter(function() {
        //             return this.href == afterWithout;
        //         }).parentsUntil(".sidebar-menu > .treeview-menu")
        //         .css({
        //             'display': 'block'
        //         })
        //         .addClass('menu-open').prev('a')
        //         .addClass('active');
        // }
    </script>
>>>>>>> 6b157e525feb4ea182f357f8348f504f276950cc

    @yield('page-js')
</body>

</html>
