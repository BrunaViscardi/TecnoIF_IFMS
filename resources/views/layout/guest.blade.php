<!DOCTYPE html>
<html>
@includeIf('layout.head')
<body class="hold-transition  layout-fixed">

     <div class="wrapper">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                     </div>
            </div>
        </div>
                         @yield('content')


    </div>
    @includeIf('layout.footer')
    </div>
@includeIf('layout.javascript')

</body>
</html>
