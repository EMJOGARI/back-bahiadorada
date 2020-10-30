<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 content-header">
                <h1>
                    @yield('contentheader_title', 'Page Header here')
                    <small>@yield('contentheader_description')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
                    <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
