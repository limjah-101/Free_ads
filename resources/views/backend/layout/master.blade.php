<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend.layout.head')
</head>
    <body>
        <div class="container-scroller">
            @include('backend.layout.navbar')
            <div class="container-fluid page-body-wrapper">

                @include('backend.layout.sidebar')

                <div class="main-panel">
                    @yield('content')
                    
                    @include('backend.layout.footer')
                </div><!-- end main-panel -->

            </div><!--end container-fluid page-body-wrapper -->
        </div><!-- end container-scroller -->
        @include('backend.layout.js')
    </body>
</html>

