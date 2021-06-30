@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />
<style type="text/css" media="screen">
    .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{
        display: none;
    }
    .footerCard svg{
        position: absolute;
        left: 0;
    }
</style>
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="bg"></div>
        <div class="container">
            <h2>طلب عضوية</h2>
            <ul class="list-unstyled">
                <li class="active"><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li>طلب عضوية</li>
            </ul>
        </div>
    </div>
        
    <div class="registration">
        <div class="container">
            <div class="row">
                <div class="col-md-7 center-block">
                    <div class="steps">
                        <ul>
                            <li>
                                <i class="flaticon-user"></i>
                                <span>المعلومات</span>
                            </li>
                            <li>
                                <i class="flaticon-add-contact"></i>
                                <span>تأكيد الطلب</span>
                            </li>
                            <li class="active">
                                <i class="flaticon-credit-card"></i>
                                <span>الدفع</span>
                            </li>
                        </ul>
                    </div>
                    <div class="formStyle">
                        <div class="cash">
                            <img src="{{ asset('/assets/images/cash.png') }}" />
                            <h2 class="title">تم الدفع بنجاح</h2>
                            <div class="desc">
                                شكراً لقد تم استلام دفعتكم بنجاح وجاري تفعيل حسابكم 
                                وستصلك رسالة التفعيل على البريد الالكتروني الخاص بك
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 center-block">
                    <div class="card style{{ $data->membership->membership_id }}">
                        <img src="{{ asset('/assets/cards/images/bg'.$data->membership->membership_id.'.png') }}" class="bg1" alt="" />
                        <img src="{{ asset('/assets/cards/images/bg'.$data->membership->membership_id.$data->membership->membership_id.'.png') }}" class="bg2" alt="" />
                        <div class="head clearfix">
                            <div class="headDetails">
                                <img src="{{ $data->image }}" />
                                <span>{{ $data->membership->Order->Field->title }}</span>
                                <span>{{ $data->membership->Order->Field->title_en }}</span>
                            </div>
                            <div class="name">
                                <span class="ar">{{ $data->membership->Order->name }}</span>
                                <span>{{ $data->membership->Order->card_name }}</span>
                            </div>
                            <img src="{{ asset('/assets/cards/images/logo.png') }}" class="logo" />
                        </div>
                        <span class="type">{{ $data->membership->Membership->title }}</span>
                        <div class="footerCard">
                            {!! \QrCode::size(70)->generate($data->membership->code) !!}
                            {{-- <img src="{{ asset('/assets/cards/images/qr.png') }}" class="qrcode" /> --}}
                            <span class="date">{{ date('m/Y',strtotime($data->membership->end_date)) }}</span>
                            <span class="code">{{ $data->membership->code }}</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
<script>
    $(function(){
        setTimeout(function(){
            window.location.href = '/printCard/{{ $data->membership->id }}';
        },2000);
    });
</script>   
@endsection