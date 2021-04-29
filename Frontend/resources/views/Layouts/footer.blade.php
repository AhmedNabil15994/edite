<div class="footer" id="footer" data-scroll-index="4">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2 class="titleFooter">ارسال رسالة</h2>
				<form class="contact" method="post" action="{{ URL::to('/contactUs') }}">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="inputStyle">
								<input type="text" name="name" />
								<span>الاسم:</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="inputStyle">
								<input type="tel"  name="phone" />
								<span>رقم الجوال:</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="inputStyle">
								<input type="email" name="email" />
								<span>البريد الاكتروني:</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="inputStyle">
								<input type="text" name="address" />
								<span>عنوان الرسالة:</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="inputStyle">
								<input type="text" name="message" />
								<span>تفاصيل الرسالة:</span>
							</div>
						</div>
					</div>

					<button>ارسل رسالتك</button>
				</form>
			</div>
			<div class="col-md-5">
				@php 
					$mobile = App\Models\Variable::getVar('رقم الواتس اب:');
					$email =  App\Models\Variable::getVar('البريد الإلكتروني(للرسائل):');
					$page = App\Models\Page::where('title','الحقوق')->first();
				@endphp
				<h2 class="titleFooter">اتصل بنا</h2>
				<div class="numberStyle">
					<i class="flaticon-telephone"></i>
					<a href="tel:{{ $mobile }}">{{ $mobile }}</a>
				</div>
				<div class="numberStyle">
					<i class="flaticon-email"></i>
					<a href="mailto:{{ $email }}">{{ $email }} </a>
				</div>
			</div>
		</div>
		<center class="clearfix">
			<p class="copyRights">{{ strip_tags($page->description) }}  {{ date('Y') }}</p>
			<ul class="socialFooter">
				<li><a href="{{ \App\Models\Variable::getVar('رابط الفيس بوك:') }}" target="_blank" class="fa fa-facebook"></a></li>
				<li><a href="{{ \App\Models\Variable::getVar('رابط السناب شات:') }}" target="_blank" class="fa fa-snapchat"></a></li>
				<li><a href="{{ \App\Models\Variable::getVar('رابط تويتر:') }}" target="_blank" class="fa fa-twitter"></a></li>
				<li><a href="{{ \App\Models\Variable::getVar('رابط يوتيوب:') }}" target="_blank" class="fa fa-youtube"></a></li>
				<li><a href="{{ \App\Models\Variable::getVar('رابط انستجرام:') }}" target="_blank" class="fa fa-instagram"></a></li>
			</ul>
			<a href="https://servers.com.sa/" class="logoServers"><img src="{{ asset('/assets/images/logoServers.png') }}" alt="" /></a>
		</center>
	</div>
	<div class="imgFooter"></div>
</div>