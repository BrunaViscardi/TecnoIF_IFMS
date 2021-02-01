<!DOCTYPE html>
<html>
@includeIf('layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            @includeIf('layout.header')

             @includeIf('layout.sidebar_lateral')


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

</div>
@includeIf('layout.javascript')

</body>
</html>
