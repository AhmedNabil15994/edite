@extends('Layouts.master')

@section('title','الصفحة الرئيسية')

@section('styles')
{{-- <link rel="stylesheet" href="css/bootstrap.css" /> --}}
{{-- <link rel="stylesheet" href="css/bootstrap-rtl.css" /> --}}
{{-- <link rel="stylesheet" href="css/font-awesome.min.css" /> --}}
<link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />
@endsection

@section('content')
	<div class="relative" data-scroll-index="1">
        <div class="slider">
            <ul id="slider" class="the-slider-inner">
                @foreach($data->sliders as $slider)
                <li>
                    <div class="background-slider"></div>
                        <img src="{{ $slider->photo }}" alt="" />
                    <div class="slider-details">
                        <div class="container">
                            <div class="des">{{ $slider->title }}</div>
                        </div>
                        
                    </div>
                </li>
                @endforeach
            </ul>
            <ul class="list-unstyled the-slider-control">
                <li><span id="slider-next"></span></li>
                <li><span id="slider-prev"></span></li>
            </ul> <!-- END the slider control-->            
            
        </div>
       
        <div class="itemsSlider">
            <div class="containerItems clearfix Owl" id="containerItems">
                @foreach($data->categories as $category)
                <div class="item">
                    <i class="{{ $category->icon }}"></i>
                    <h2 class="title">{{ $category->title }}</h2>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>

    <div class="aboutUs" id="aboutUs" data-scroll-index="2">
        <div class="container">
            {{-- <img src="{{ $data->pages[0]->photo }}" class="bgAbout" alt="" /> --}}
            <div class="row">
                <div class="col-md-5">
                    <div class="imageStyle">
                        <img src="{{ asset('/assets/images/imgStyle1.png') }}" alt="" class="img1" />
                        <img src="{{ $data->pages[0]->photo }}" alt="" class="imgAbout" />
                        <img src="{{ asset('/assets/images/imgStyle2.png') }}" alt="" class="img2" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="details">
                        <h2 class="title">{{ $data->pages[0]->title }}</h2>
                        <div class="desc">
                            {!! $data->pages[0]->description !!}
                        </div>
                        {{-- <a href="#">اقرأ المزيد</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="memberships" data-scroll-index="3">
        <div class="bg" style="background: url('{{ asset("/assets/cards/images/bgMemberShip.png") }}');"></div>
        <h2 class="titleStyle mb-4">العضويات</h2>
        <div class="container">
            <div class="Owl" id="memberships">
                @foreach($data->memberships as $key => $membership)
                <div class="item">
                    <img src="{{ asset('/assets/cards/images/card'.($key+1).'.png') }}" />
                    <div class="details">
                        <h2 class="title">عضوية {{ $membership->title }}</h2>
                        <span>رسوم اشتراك</span>
                        <span>{{ $membership->price }} ر.س</span>
                        <a href="{{ URL::to('/registeration?membership_id='.$membership->id) }}" class="btnStyle">طلب الانضمام</a>
                        <ul class="btns">
                            <input type="hidden" name="conditions" value="{{ json_encode($membership->conditionsText) }}">
                            <input type="hidden" name="features" value="{{ json_encode($membership->featruesText) }}">
                            <li><a class="conditions" href="#">الشروط</a></li>
                            <li><a class="features" href="#">المميزات</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

   {{--  <div class="memberships" id="memberships" data-scroll-index="3">
        <h2 class="titleStyle">العضويات</h2>
        <div class="imgFooter"></div>
        <ul class="tabsBtns clearfix tabsPlans" id="tabs1">
            @foreach($data->memberships as $key => $membership)
            <li id="tab{{ $key+1 }}" class="{{ $key == 0 ? 'active' : '' }}">{{ $membership->title }}</li>
            @endforeach
        </ul>
        <div class="container">
            <div class="tabs tabs1">
                @foreach($data->memberships as $key => $membership)
                <div class="tab{{ $key+1 }} tab">
                    <ul class="tabsBtns tabsDetails clearfix" id="tabs2">
                        <li id="tab{{ $key }}11" class="active">الشروط</li>
                        <li id="tab{{ $key }}22">المميزات</li>
                    </ul>
                    <div class="tabs tabs2 tabber">
                        <div class="tab{{ $key }}11 tab tabbed">
                            <ul class="list clearfix">
                            @foreach($membership->conditionsText as $condKey => $condition)                            
                                <li>{{ $condition }}</li>
                                @if($condKey %2 == 1)
                                <div class="clearfix"></div>
                                @endif
                            @endforeach
                            </ul>
                            <div class="clearfix">
                                <a href="{{ URL::to('/registeration?membership_id='.$membership->id) }}" class="btnStyle">طلب الانضمام</a>
                                <div class="price">
                                    رسوم الاشتراك
                                    <span>{{ $membership->price }}</span>
                                    ريال
                                </div>
                            </div>
                        </div>
                        <div class="tab{{ $key }}22 tab tabbed">
                            <ul class="list clearfix">
                            @foreach($membership->featruesText as $featKey => $feature)
                                <li>{{ $feature }}</li>
                                @if($featKey %2 == 1)
                                <div class="clearfix"></div>
                                @endif
                            @endforeach
                            </ul>
                            <div class="clearfix">
                                <a href="{{ URL::to('/registeration?membership_id='.$membership->id) }}" class="btnStyle">طلب الانضمام</a>
                                <div class="price">
                                    رسوم الاشتراك
                                    <span>{{ $membership->price }}</span>
                                    ريال
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    
    <div class="events">
        <div class="container">
            <h2 class="titleStyle">الفعاليات</h2>
            
               <div id="events" class="Owl">
                    @foreach($data->events as $event)
                    <div class="item">
                        <a href="#" class="itemEvent">
                            <img src="{{ $event->photo }}" alt="" />
                            <div class="details">
                                <span class="desc">
                                    {{ $event->title }}                           
                                </span>
                                <span class="date" dir="ltr">{{ date('h:i a . d M Y',strtotime($event->created_at)) }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            
            
        </div>
    </div>
@include('Partials.eventModal')
@include('Partials.memberships')
@endsection

@section('scripts')
<script src="{{ asset('/assets/cards/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/event.js') }}"></script>
@endsection