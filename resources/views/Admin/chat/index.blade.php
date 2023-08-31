@extends('Admin.Layouts.Base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 mt-5">
                    <!--begin::Messenger-->
                    <div class="card" id="kt_chat_messenger">
                        <!--begin::Card header-->
                        <div class="card-header" id="kt_chat_messenger_header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <!--begin::User-->
                                <div class="d-flex justify-content-center flex-column me-3">
                                    <a href="#"
                                        class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ Auth::user()->name }}</a>
                                    <!--begin::Info-->
                                    <div class="mb-0 lh-1">
                                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                        <span class="fs-7 fw-bold text-muted">Active</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body" id="kt_chat_messenger_body">
                            <!--begin::Messages-->
                            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages">
                                <!--begin::Message(in)-->
                                <div class="d-flex justify-content-start mb-10">
                                    <!--begin::Wrapper-->
                                    <p>{{$response}}</p>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->
                        </div>
                        <!--end::Messages-->
                    
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <form action="{{route('chat.post')}}" method="post">
                        @csrf
                        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                            <!--begin::Input-->
                            <textarea class="form-control form-control-flush mb-3" name="prompt" rows="1" data-kt-element="input"
                                placeholder="Type a message"></textarea>
                            <!--end::Input-->
                            <!--begin:Toolbar-->
                            <div class="d-flex flex-stack">
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center me-2">
                                </div>
                                <!--end::Actions-->
                                <!--begin::Send-->
                                <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                                <!--end::Send-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </form>
                    <!--end::Card footer-->
                </div>
                <!--end::Messenger-->
            </div>
        </div>
    </div>
    </div>
@endsection
