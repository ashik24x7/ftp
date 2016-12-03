<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Fileserver | Admin Panel</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/backend/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
		
        <link href="/backend/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
		<style>
		.position-center-center {
            width:50%;	
            left: 30%;
            position: absolute;
            top: 30%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
		</style>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="login" style="background-color:#006699;">
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content" style="margin-top: 50px;">
            <form class="login-form" action="{{ url('/admin/register') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3 class="form-title">Create your your account</h3>
                @if(count($errors) > 0)
    				<div class="alert alert-danger" style="display:block;">
                        <button class="close" data-close="alert"></button>
                        <span>{{$errors->all()[0]}}</span>
                    </div>
                @endif

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name:</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Full Name" name="full_name" value="{{ old('full_name') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username:</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{ old('username') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password: </label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="{{ old('password') }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-Password: </label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re Password" name="re_password" value="{{ old('re_password') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contact No: </label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Contact No" name="contact_no" value="{{ old('contact_no') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email: </label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Photo: </label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="file" autocomplete="off" placeholder="Photo" name="photo" required />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green pull-right"> Register </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->

            
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="/backend/global/plugins/respond.min.js"></script>
<script src="/backend/global/plugins/excanvas.min.js"></script> 
<![endif]-->
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
        <script src="/backend/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="/backend/pages/scripts/login-4.min.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>