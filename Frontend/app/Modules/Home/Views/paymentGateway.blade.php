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
						<div class="paymentNow">
							<h2 class="title">اكمال الدفع:</h2>
							<form action="{{ $data->redirectURL }}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
						</div>
					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   
    {{-- <div id="modalSing" class="modalSing modal fade" role="dialog">
        <div class="modal-dialog">
                        
            <div class="modal-content">
    
                <div class="modal-body">
    
                    <button type="button" class="close closeX" data-dismiss="modal">&times;</button>
                    <h2 class="title">سياسة التسجيل</h2>
                    <div class="desc">
						معسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالك معسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالكمعسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالك
                   		<br>
                   		معسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالك معسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالكمعسكر تحدي المشاريع,نخبة من رواد الأعمال والاستشاريين بخبرات عصرية وحديثة والمطالعة دائماً على التطورات والخطط الجديدة التي تساعدك في نمو أعمالك
                    </div>
                    <a href="#" class="btnModal" data-dismiss="modal">سجل معنا</a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection



@section('scripts')
<script>
    var wpwlOptions = {
        locale: "ar"
    }
</script>
<script async src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $data->response->id }}"></script>
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection