@extends('Layouts.master')

@section('title','استكمال البيانات')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">
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
   				<div class="col-md-11 center-block">
   					<div class="steps">
   						<ul>
	   						<li>
	   							<a href="{{ str_replace('complete', 'registeration', URL::current()) }}">
	   								<i class="flaticon-user"></i>
	   								<span>المعلومات</span>
	   							</a>
	   						</li>
	   						<li class="active">
	   							<i class="flaticon-add-contact"></i>
	   							<span>تأكيد الطلب</span>
	   						</li>
	   						<li>
	   							<a href="{{ isset($data->order) && $data->order->status == 4 ? str_replace('complete', 'payment', URL::current()) : '' }}">
	   								<i class="flaticon-credit-card"></i>
	   								<span>الدفع</span>
	   							</a>
	   						</li>
   						</ul>
   					</div>
					<form class="formStyle" method="post" action="{{ URL::current() }}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<input type="tel" placeholder="رقم الهوية:" name="identity_no"  value="{{ isset($data->data->identity_no) ? $data->data->identity_no : old('identity_no') }}" />
							</div>
							<div class="col-md-6">
								<input type="text" class="datepicker" placeholder="تاريخ انتهاء الهوية:" name="identity_end_date"  value="{{ isset($data->data->identity_end_date) ? $data->data->identity_end_date : old('identity_end_date') }}" />
							</div>
							<div class="col-md-12">
								<div class="uploadStyle">
									<label>
										<span>الصورة الشخصية:</span>
										<input type="file"  name="image"/>
										<i class="flaticon-upload"></i>
									</label>
									<div class="images image">
										@if(!empty($data->data->image))
										<div class='img'>
											<img src='{{ $data->data->image }}'>
											<i class='fa remove fa-close'></i>
										</div>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="uploadStyle">
									<label>
										<span>صورة الهوية:</span>
										<input type="file"  name="identity_image"/>
										<i class="flaticon-upload"></i>
									</label>
									<div class="images identity_image">
										@if(!empty($data->data->identity_image))
										<div class='img'>
											<img src='{{ $data->data->identity_image }}'>
											<i class='fa remove fa-close'></i>
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="btnCheck">
							<div class="checkDiv"></div>
							<button class="btnForm">التالي</button>
						</div>
					</form>
					
   				</div>

   				{{-- <div class="col-md-7 center-block">
   					<div class="steps">
   						<ul>
	   						<li class="active">
	   							<i class="flaticon-user"></i>
	   							<span>المعلومات</span>
	   						</li>
	   						<li class="active">
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
							<h2 class="title">جاري التوجة الآن الى بوابة الدفع</h2>
							<img src="{{ asset('/assets/images/waiting.svg') }}" alt="" class="iconPayment fa-spin" />
						</div>
					</div>


   				</div>
   				
   				<div class="col-md-7 center-block">
   					<div class="steps">
   						<ul>
	   						<li class="active">
	   							<i class="flaticon-user"></i>
	   							<span>المعلومات</span>
	   						</li>
	   						<li class="active">
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
								وستصلك رسالة التفعيل على الواتساب الخاص بالرقم
							</div>
						</div>
					</div>

   				</div>
   				
				<div class="col-md-7 center-block">
   					<div class="steps">
   						<ul>
	   						<li class="active">
	   							<i class="flaticon-user"></i>
	   							<span>المعلومات</span>
	   						</li>
	   						<li class="active">
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
								يرجى إعادة المحاولة مره آخرى
							</div>
							<button class="btnForm">إعادة المحاولة</button>
						</div>
					</div>

   				</div>	
   				
   				<div class="col-md-7 center-block">
   					<div class="details">
   						<h2 class="title">تفاصيل الفاتورة</h2>
   						<ul class="list">
   							<li class="clearfix">رسوم العضوية <span>215 SAR</span></li>
   							<li class="clearfix">سعر الشحن <span>215 SAR</span></li>
   							<li class="clearfix">ضريبة القيمة المضافة <span>215 SAR</span></li>
   							<li class="clearfix">الاجمالي <span>411 SAR</span></li>
   						</ul>
   					</div>
   					<div class="verification">
   						<h2 class="title">التحقق من العضوية</h2>
   						<input type="text" placeholder="أضف الرقم المرسل لك" />
   						<button class="btnForm">التحقق</button>
   					</div>
   					<div class="done">
   						<img src="{{ asset('/assets/images/checked.svg') }}" alt="" />
   						<h2 class="title">تم ارسال طلبك بنجاح رقم</h2>
   						<a href="#" class="numb">9200178235</a>
   						<span class="text">وسيتم التواصل معك قريباً</span>
   					</div>
   				</div> --}}
   				
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" type="text/javascript"></script>
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection