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
   					<div class="details">
   						<h2 class="title">تفاصيل الفاتورة</h2>
   						<ul class="list">
   							<li class="clearfix">رسوم العضوية <span>{{ $data->price }} SAR</span></li>
   							<li class="clearfix">سعر الشحن <span>0.00 SAR</span></li>
   							<li class="clearfix">ضريبة القيمة المضافة <span>0.00 SAR</span></li>
   							<li class="clearfix">الاجمالي <span>{{ $data->price }} SAR</span></li>
   						</ul>
   					</div>
   				</div>
   				
   			</div>
   		</div>
   	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection