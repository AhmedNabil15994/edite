@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<style type="text/css" media="screen">
	.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{
		display: none;
	}
	.mb-3{
		margin-bottom: 30px;
	}
	.row .col-xs-4 a img{
		width: 100px;
		height: 100px;
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
							<h2 class="title">اختر نوع الدفع قبل التوجة الى بوابة الدفع</h2>
							<div class="row mb-3">
								<div class="col-xs-4"><a href="{{ URL::to('/paymentGateway/VISA') }}">
									<img src="{{ asset('assets/images/visa.svg') }}" alt="">
								</a></div>
								<div class="col-xs-4"><a href="{{ URL::to('/paymentGateway/MASTER') }}">
									<img src="{{ asset('assets/images/mastercard.svg') }}" alt="">
								</a></div>
								<div class="col-xs-4"><a href="{{ URL::to('/paymentGateway/MADA') }}">
									<img src="{{ asset('assets/images/Mada_Logo.svg') }}" alt="">
								</a></div>
							</div>
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