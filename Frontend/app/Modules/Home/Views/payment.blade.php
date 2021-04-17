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
   					<div class="steps">
   						<ul>
	   						<li>
	   							<a href="{{ isset($data->data) && $data->data->status == 4 ? str_replace('payment', 'registeration', URL::current()) : '' }}">
	   								<i class="flaticon-user"></i>
	   								<span>المعلومات</span>
	   							</a>
	   						</li>
	   						<li>
	   							<a href="{{ isset($data->data) && $data->data->status == 4 ? str_replace('payment', 'complete', URL::current()) : '' }}">
	   								<i class="flaticon-add-contact"></i>
	   								<span>تأكيد الطلب</span>
	   							</a>
	   						</li>
	   						<li class="active last">
	   							<a href="{{ URL::current() }}">
	   								<i class="flaticon-credit-card"></i>
	   								<span>الدفع</span>
	   							</a>
	   						</li>
   						</ul>
   					</div>
					<div class="formStyle">
						<div class="paymentNow">
							<h2 class="title">جاري التوجة الآن الى بوابة الدفع</h2>
							<img src="{{ asset('/assets/images/waiting.svg') }}" alt="" class="iconPayment fa-spin" />
						</div>
					</div>


   				</div>  				
   			</div>
   		</div>
   	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection