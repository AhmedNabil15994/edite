<div class="menuMobile">
	<div class="BgClose"></div>
	<div class="menuContent">
		<div class="headMenu">
			<a href="#" class="logoMenu"><img src="{{ asset('/assets/images/logo.png') }}" alt="" /></a>
			<i class="fa fa-close closeX"></i>
		</div>
		<ul class="menuRes">
			<li><a href="#" data-scroll-nav="1">الرئيسية</a></li>
			<li><a href="#" data-scroll-nav="2">من نحن</a></li>
			<li><a href="{{ URL::to('/events') }}">الفعاليات</a></li>
			<li><a href="{{ URL::to('/registeration') }}">طلب عضوية</a></li>
			<li><a href="#" data-scroll-nav="3">العضويات</a></li>
			<li><a href="#" data-scroll-nav="4">اتصل بنا</a></li>
		</ul>
	</div>
</div>