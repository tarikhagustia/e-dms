@extends('layouts.app')
@section('title', __('Home'))
@section('content')
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-file-text"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">{{__('Total Documents')}}</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{number_format($totalDocument)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">{{__('Total Users')}}</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{number_format($totalUsers)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-download"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">{{__('Total Download')}}</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{number_format($totalDownload)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
