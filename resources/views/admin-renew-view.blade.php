@extends('layouts.admin-temp')

@section('style_push')
    {{--    ADDITIONAL STYLES GO HERE--}}

@endsection


@section('content')


    {{--    MAIN CONTENT GOES HERE--}}
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Clearance Letter Renewal Applicant Details</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Clearance letter</a>
                </li>
                <li>
                    New Application
                </li>
                <li class="active">
                    <strong>{{$info_data->name}}</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <h5>Approve/Reject</h5>

                            <div class="hr-line-dashed"></div>
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalA">
                                Approve
                            </button>
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModalR">
                                Reject
                            </button>
                            <div class="hr-line-dashed"></div>
                            <h5>Applicant Details:</h5>
                            <ul class="folder-list" style="padding: 0">
                                <li><button class="btn btn-info"> <b>Status :</b></i> {{$info_data->status}}</button></li>
                                <li><h4><b>Name  :</b> {{$info_data->name}}</h4></li>
                                <li><h4><b>Nationality :</b>{{$info_data->nationality}}</h4></li>
                                <li><h4><b>Gender :</b></i> {{$info_data->gender}}</h4></li>
                                <li><h4><b>Passport No :</b></i> {{$info_data->passport_no}}</h4></li>
                                <li><h4><b>Company :</b></i> {{$info_data->company}}</h4></li>
                                <li><h4><b>Date :</b> {{$info_data->created_at}}</h4></li>

                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <iframe alt="image" class="img-responsive" src="{{ URL::to('/') }}/renewal_apps/passportPic/{{ $info_data->passport_pic}}"></iframe>
                                    </div>
                                    <div class="file-name">
                                        Passport Pic
                                        <br/>
                                        <small><a href="{{ asset('renewal_apps/passportPic/'.$info_data->passport_pic) }}" target="_blank"> View</a></small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <iframe alt="image" class="img-responsive" src="{{ URL::to('/') }}/renewal_apps/current_permit/{{ $info_data->current_permit}}"></iframe>
                                    </div>
                                    <div class="file-name">
                                        Current Permit
                                        <br/>
                                        <small><a href="{{ asset('renewal_apps/current_permit/'.$info_data->current_permit) }}" target="_blank"> View</a></small>
                                    </div>
                                </a>

                            </div>
                        </div>

                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <iframe alt="image" class="img-responsive" src="{{ URL::to('/') }}/renewal_apps/understudy_cv/{{ $info_data->understudy_cv}}"></iframe>
                                    </div>
                                    <div class="file-name">
                                        UnderStudy CV
                                        <br/>
                                        <small><a href="{{ asset('renewal_apps/understudy_cv/'.$info_data->understudy_cv) }}" target="_blank"> View</a></small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <iframe alt="image" class="img-responsive" src="{{ URL::to('/') }}/renewal_apps/takeover/{{ $info_data->takeover_evidence}}"></iframe>
                                    </div>
                                    <div class="file-name">
                                       Evidence Understudy Cant Takeover
                                        <br/>
                                        <small><a href="{{ asset('renewal_apps/takeover/'.$info_data->takeover_evidencet) }}" target="_blank"> View</a></small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <iframe alt="image" class="img-responsive" src="{{ URL::to('/') }}/renewal_apps/Efforts/{{ $info_data->company_effort}}"></iframe>
                                    </div>
                                    <div class="file-name">
                                        Company Effort To Train Understudy
                                        <br/>
                                        <small><a href="{{ asset('renewal_apps/Efforts/'.$info_data->company_effort) }}" target="_blank"> View</a></small>
                                    </div>
                                </a>

                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--modal approve--}}
    <div class="modal inmodal" id="myModalA" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Approve Application</h4>
                    <small class="font-bold">Give an brief remark if necessary on the application to be approved.</small>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="dashboard_renew_approve" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="application_id" type="hidden" value="{{$info_data->id}}">
                            <input name="user_id" type="hidden" value="{{$info_data->user_id}}">
                            <label class="fieldlabels">Additional Information to the Applicant: *</label>
                            <textarea name="info"
                                      placeholder="Briefly give a job description of the title above"
                                      class="form-control required" rows="5" required></textarea>
                            @error('job_description') <span class="error text-red-500 text-xs"
                                                            style="color:red">{{ $message }}</span> @enderror
                            <br>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Approve</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{--modal reject--}}
    <div class="modal inmodal" id="myModalR" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Reject Application</h4>
                    <small class="font-bold">Give a reason why the application has been rejected to the applicant.</small>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="dashboard_renew_reject" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="application_id" type="hidden" value="{{$info_data->id}}">
                            <input name="user_id" type="hidden" value="{{$info_data->user_id}}">
                            <label class="fieldlabels">Reason for rejecting the application: *</label>
                            <textarea name="info"
                                      placeholder="Reson for rejecting the application"
                                      class="form-control required" rows="5" required></textarea>
                            @error('job_description') <span class="error text-red-500 text-xs"
                                                            style="color:red">{{ $message }}</span> @enderror
                            <br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script_push')

    {{--    ADDITIONAL SCRIPT TAGS GO HERE--}}

@endsection
