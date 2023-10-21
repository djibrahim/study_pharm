<!DOCTYPE html>
<html lang="en">

<head>

   @include('layouts.meta')
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    @include('layouts.extra.css')
    @include('layouts.extra.css.datatable')
    @include('layouts.extra.css.select2')
    @stack('css')

</head>

<body>

<!--*******************
    Preloader start
********************-->
@include('layouts.header.preloader')
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    @include('layouts.header.navbar')
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('layouts.header.header')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('layouts.header.sidebar')
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
           @yield('content')
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
   @include('layouts.footer')
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
@include('layouts.extra.js')
@include('layouts.extra.js.datatable')
@include('layouts.extra.js.select2')
@stack('js')

</body>
</html>
