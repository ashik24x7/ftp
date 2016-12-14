@extends('admin.app')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
         
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Movies</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Movies</span>
                    </li>
                </ul>
                
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> View All Movies</h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i> All Movies </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="all">Movie Title</th>
                                        <th class="min-phone-l">Movie Category</th>
                                        <th class="min-tablet">Movie quality</th>
                                        <th class="desktop">Movie Filesize</th>
                                        <th class="min-tablet">Imdb Ratings</th>
                                        <th class="min-tablet">Uploader</th>
                                        <th class="min-tablet">Edit</th>
                                        <th class="min-tablet">Delete</th>
                                        <th class="none">uploaded Time</th>
                                        <th class="none">IMDB id</th>
                                        <th class="none">release date</th>
                                        <th class="none">runtime</th>
                                        <th class="none">original language</th>
                                        <th class="none">overview</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@stop