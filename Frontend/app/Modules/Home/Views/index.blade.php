@extends('Layouts.master')

@section('title','الصفحة الرئيسية')

@section('styles')

@endsection

@section('content')
	<div class="relative" data-scroll-index="1">
        <div class="slider">
            <ul id="slider" class="the-slider-inner">
                <li>
                    <div class="background-slider"></div>
                        <img src="{{ asset('/assets/images/sliderImage.png') }}" alt="" />
                    <div class="slider-details">
                        <div class="container">
                            <div class="des">الجمعية العربية السعودية للثقافة والفنون</div>
                        </div>
                        
                    </div>
    
                </li>
    
            </ul>
            <ul class="list-unstyled the-slider-control">
                <li><span id="slider-next"></span></li>
                <li><span id="slider-prev"></span></li>
            </ul> <!-- END the slider control-->            
            
        </div>
       
        <div class="itemsSlider">
            <div class="containerItems clearfix Owl" id="containerItems">
                <div class="item">
                    <i class="flaticon-drum"></i>
                    <h2 class="title">التراث والفنون الشعبية</h2>
                </div>
                <div class="item">
                    <i class="flaticon-music-note"></i>
                    <h2 class="title">الموسيقي</h2>
                </div>
                <div class="item">
                    <i class="flaticon-spotlight"></i>
                    <h2 class="title">المسرح</h2>
                </div>
                <div class="item">
                    <i class="flaticon-book"></i>
                    <h2 class="title">التأليف والكتابة</h2>
                </div>
                <div class="item">
                    <i class="flaticon-color-palette"></i>
                    <h2 class="title">الفنون التشكيلية</h2>
                </div>
                <div class="item">
                    <i class="flaticon-sketch"></i>
                    <h2 class="title">الخط العربي</h2>
                </div>
                <div class="item">
                    <i class="flaticon-camera"></i>
                    <h2 class="title">التصوير   الضوئي</h2>
                </div>
                <div class="item">
                    <i class="flaticon-writing"></i>
                    <h2 class="title">الشعر</h2>
                </div>
                <div class="item">
                    <i class="flaticon-video-camera"></i>
                    <h2 class="title">الأفلام</h2>
                </div>
            </div>
        </div>
        
    </div>

    <div class="aboutUs" data-scroll-index="2">
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
    
    <div class="memberships" id="memberships" data-scroll-index="3">
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
    </div>
    
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
@endsection

@section('scripts')
@endsection