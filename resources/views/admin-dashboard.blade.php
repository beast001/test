@extends('layouts.admin-temp')

@section('style_push')
    {{--    ADDITIONAL STYLES GO HERE--}}
    @livewireStyles

@endsection

@section('content')

    {{--    MAIN CONTENT GOES HERE--}}
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="dashboard_new_apps"><span class="label label-success pull-right">Open</span></a>
                    <h5>New Applications</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$apps}} Pending</h1>
                    <div class="stat-percent font-bold text-success">{{$new_pending_percentage}}% <i
                            class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Annual</span>
                    <h5>Renewals</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$renewals}}Pending</h1>
                    <div class="stat-percent font-bold text-info">{{$renwal_panding_percentage }}% <i
                            class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>Users</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$user_total}}</h1>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                    <small>New visits</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Low value</span>
                    <h5>Reports</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$tottal_applications}}</h1>
                    <div class="stat-percent font-bold text-danger">{{$completed_percentage}}% <i
                            class="fa fa-level-down"></i></div>
                    <small>Total Applications</small>
                </div>
            </div>
        </div>
    </div>

    @if (request()->route()->uri=='dashboard')
        <livewire:dahboard-landing/>
    @elseif(request()->route()->uri=='dashboard_new_apps')
        <livewire:new-applications/>
    @elseif(request()->route()->uri=='dashboard_renew_apps')
        <livewire:renew-applications/>
    @endif



@endsection

@section('script_push')
    @livewireScripts

    {{--    ADDITIONAL SCRIPT TAGS GO HERE--}}

@endsection
