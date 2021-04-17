@extends('Layouts.master')

@section('title','الفعاليات')

@section('styles')

@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="bg"></div>
        <div class="container">
            <h2>الفعاليات</h2>
            <ul class="list-unstyled">
                <li class="active"><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li>الفعاليات</li>
            </ul>
        </div>    
    </div>
	<div class="eventsPage">
        <div class="container">
            <div class="row">
                @foreach($data->data as $event)
                <div class="col-md-6">
                    <a href="#" class="itemEvent" data-toggle="modal" data-target="#modalPost">
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