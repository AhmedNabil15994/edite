@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<style type="text/css" media="screen">
	.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{
		display: none;
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
   					<div class="done">
              <img src="{{ asset('/assets/images/checked.svg') }}" alt="" />
              <h2 class="title">تم ارسال طلبك بنجاح رقم</h2>
              <a href="#" class="numb">{{ $data->order_no }}</a>
              <span class="text">وسيتم التواصل معك قريباً</span>
            </div>
     			</div>
   			</div>
   		</div>
   	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection