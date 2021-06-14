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
                <img src="{{ asset('/assets/images/warning.png') }}" />
                <h2 class="title">عفواً هنا خطاً</h2>
                <div class="desc">
                  يوجد  مشكلة في الدفع
                  <br>
                  {{ Session::get('errorMSG') }}
                  <br>
                  يرجى إعادة المحاولة مره آخرى
                </div>
                <form action="{{ URL::to('/payment/'.$data->id) }}" method="get" accept-charset="utf-8">
                  <button class="btnForm">إعادة المحاولة</button>
                </form>
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