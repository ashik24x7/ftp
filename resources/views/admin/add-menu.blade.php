@extends('admin.app')
@section('header')
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/backend/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/layouts/layout/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/backend/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
@stop

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Menu</div>
                </div>
                <div class="portlet-body form">
                    @if(session('message'))
                        <p class="error"> {{ session('message') }} </p>
                    @endif
                    <!-- BEGIN FORM-->
                    <form action="{{url('/admin/menu')}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Menu Name: </label>
                                <div class="col-md-6">
                                    <input type="text" name="menu_name" class="form-control input-circle" placeholder="Enter text">
                                    <span class="help-block">{{ $errors->first('menu_name') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Position</label>
                                <div class="col-md-2">
                                    <select class="form-control input-circle" name="position">
                                    @for($i = 1; $i<=$position; $i++)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @endfor
                                    </select>
                                    <span class="help-block">{{ $errors->first('position') }}</span>
                                </div>
                                <label class="control-label col-md-2">Visible</label>
                                <div class="col-md-2">
                                    <select class="form-control input-circle" name="visible">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span class="help-block">{{ $errors->first('visible') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-circle green">Submit</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
@stop
@section('footer')

    <!-- BEGIN CORE PLUGINS -->
    <script src="/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/backend/pages/scripts/form-samples.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/backend/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
            

@stop