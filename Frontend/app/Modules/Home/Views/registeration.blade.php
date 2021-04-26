@extends('Layouts.master')

@section('title','طلب عضوية')

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
   				<div class="col-md-11 center-block">
   					<div class="steps">
   						<ul>
	   						<li class="active">
	   							<a href="{{ URL::current() }}">
	   								<i class="flaticon-user"></i>
	   								<span>المعلومات</span>
	   							</a>
	   						</li>
	   						<li>
	   							<a href="{{ isset($data->data) && $data->data->status != 1 ? str_replace('registeration', 'complete', URL::current()) : '' }}">
	   								<i class="flaticon-add-contact"></i>
	   								<span>تأكيد الطلب</span>
	   							</a>
	   						</li>
	   						<li>
	   							<i class="flaticon-credit-card"></i>
	   							<span>الدفع</span>
	   						</li>
   						</ul>
   					</div>
					<form class="formStyle" method="post" action="{{ URL::current() }}">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="الاسم الرباعي:" name="name" value="{{ isset($data->data->name) ? $data->data->name  : old('name') }}" />
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="الاسم المطلوب في البطاقة:" name="card_name" value="{{ isset($data->data->card_name) ? $data->data->card_name  : old('card_name') }}" />
							</div>
							<div class="col-md-6">
								<input type="tel" placeholder="رقم الجوال:" name="phone" value="{{ isset($data->data->phone) ? $data->data->phone  : old('phone') }}" />
							</div>
							<div class="col-md-6">
								<input type="email" placeholder="البريد الاكتروني:" name="email" value="{{ isset($data->data->email) ? $data->data->email  : old('email') }}" />
							</div>
							<div class="col-md-6">
								<div class="selectStyle" id="select1">
									<select class="select2" name="gender">
										<option value="">الجنس:</option>
										<option value="1" {{ isset($data->data->gender) && $data->data->gender == 1  ? : (old('gender') == 1 ? 'selected' : '') }}>ذكر</option>
										<option value="2" {{ isset($data->data->gender) && $data->data->gender == 2  ? : (old('gender') == 2 ? 'selected' : '') }}>أنثي</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="selectStyle" id="select2">
									<select class="select2" name="field_id">
										@foreach($data->fields as $field)
										<option value="{{ $field->id }}" {{ isset($data->data->field_id) && $data->data->field_id == $field->id ? 'selected' : (old('field_id') == $field->id ? 'selected' : '') }}>{{ $field->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="selectStyle" id="select3">
									<select class="select2" name="city_id">
										@foreach($data->cities as $city)
										<option value="{{ $city->id }}" {{ isset($data->data->city_id) && $data->data->city_id == $city->id ? 'selected' : (old('city_id') == $city->id ? 'selected' : '') }}>{{ $city->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="selectStyle" id="select4">
									<select class="select2" name="membership_id">
										<option value="">حدد العضوية:</option>
										@foreach($data->memberships as $membership)
										<option value="{{ $membership->id }}" {{ Request::has('membership_id') && Request::get('membership_id') == $membership->id ? 'selected' : (isset($data->data->membership_id)  && $data->data->membership_id == $membership->id ? 'selected' : '' ) }}>{{ $membership->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<textarea type="text" name="brief" placeholder="السيرة الذاتية المختصرة:">{{ isset($data->data->brief) ? $data->data->brief : old('brief') }}</textarea>
							</div>
							<div class="col-md-12">
								<div class="addSocial clearfix">
									<span class="title">إضافة مواقع التواصل الاجتماعي</span>
									<div class="add" id="add1">
										<i class="fa fa-twitter"></i>
										<span class="name">{{ isset($data->details->twitter) ? $data->details->twitter : old('twitter') }}</span>
										<div class="inputSocial">
											<input type="text" name="twitter" placeholder="@yourname" value="{{ isset($data->details->twitter) ? $data->details->twitter : old('twitter') }}" />
											<span class="btnSoc">اضافة</span>
										</div>
									</div>
									<div class="add" id="add2">
										<i class="fa fa-youtube-play"></i>
										<span class="name">{{ isset($data->details->youtube) ? $data->details->youtube : old('youtube') }}</span>
										<div class="inputSocial">
											<input type="text" name="youtube" placeholder="@yourname" value="{{ isset($data->details->youtube) ? $data->details->youtube : old('youtube') }}" />
											<span class="btnSoc">اضافة</span>
										</div>
									</div>
									<div class="add" id="add3">
										<i class="fa fa-instagram"></i>
										<span class="name">{{ isset($data->details->instagram) ? $data->details->instagram : old('instagram') }}</span>
										<div class="inputSocial">
											<input type="text" name="instagram" placeholder="@yourname" value="{{ isset($data->details->instagram) ? $data->details->instagram : old('instagram') }}" />
											<span class="btnSoc">اضافة</span>
										</div>
									</div>
									<div class="add" id="add4">
										<i class="fa fa-snapchat-ghost"></i>
										<span class="name">{{ isset($data->details->snapchat) ? $data->details->snapchat : old('snapchat') }}</span>
										<div class="inputSocial">
											<input type="text" name="snapchat" placeholder="@yourname" value="{{ isset($data->details->snapchat) ? $data->details->snapchat : old('snapchat') }}" />
											<span class="btnSoc">اضافة</span>
										</div>
									</div>
									<div class="add" id="add5">
										<i class="fa fa-facebook"></i>
										<span class="name">{{ isset($data->details->facebook) ? $data->details->facebook : old('facebook') }}</span>
										<div class="inputSocial">
											<input type="text" name="facebook" placeholder="@yourname" value="{{ isset($data->details->facebook) ? $data->details->facebook : old('facebook') }}" />
											<span class="btnSoc">اضافة</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="btnCheck">
							<div class="checkDiv">
								<span class="text">
									الموافقة على <a href="#" data-toggle="modal" data-target="#modalSing">الشروط والأحكام</a>
								</span>
								<label class="switch">
								  <input type="checkbox" name="privacy" {{ isset($data->data) || old('privacy') == 'on' ? 'checked' : '' }}>
								  <span class="sliderSwitch round"></span>
								</label>
								<br>
								<span class="text">
									<a href="{{ URL::to('/verify') }}">التحقق من العضوية</a>
								</span>
							</div>
							<button type="submit" class="btnForm">التالي</button>
						</div>
					</form>
   				</div>
   			</div>
   		</div>
   	</div>
@endsection

@section('scripts')
@endsection