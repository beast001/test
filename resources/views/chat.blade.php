@extends('layouts.admin-temp')

@section('content')


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <strong>Chat room v.1</strong> can be used to create chat room in your app. In first version there is a html template. In next versions of Inspinia we will add more design options. Feel free to write to us on <span class="text-navy">support@webapplayer.com</span>                                if you need any help with implemnetation.

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted">Last message:  Mon Jan 26 2015 - 18:39:23</small> Chat room panel
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion">

                                    @if(!$message_no==0)
                                    <div class="chat-message">
                                        <img class="message-avatar" src="img/a1.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> Michael Smith </a>
                                            <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                                            <span class="message-content">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </span>
                                        </div>
                                    </div>

                                    @else
                                        <div class="chat-message">
                                            <div class="message">
                                                <span class="message-content">
											You have no messages yet. Send one tody?
                                            </span>
                                            </div>
                                        </div>


                                    @endif




                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">


                                    <div class="users-list">
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a4.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Karl Jordan</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a1.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Monica Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <span class="pull-right label label-primary">Online</span>
                                            <img class="chat-avatar" src="img/a2.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Michael Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <span class="pull-right label label-primary">Online</span>
                                            <img class="chat-avatar" src="img/a3.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Janet Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a5.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Alice Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a6.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Monica Cale</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a2.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Mark Jordan</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <span class="pull-right label label-primary">Online</span>
                                            <img class="chat-avatar" src="img/a3.jpg" alt="">
                                            <div class="chat-user-name">
                                                <a href="#">Janet Smith</a>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chat-message-form">

                                    <div class="form-group">

                                        <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>

@endsection
