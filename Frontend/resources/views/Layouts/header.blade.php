<div class="header">
  <div class="container">
    <a href="{{ URL::to('/') }}" class="logo"><img src="{{ asset('/assets/images/logo.png') }}" alt="" /></a>
    <i class="fa fa-bars openMenu"></i>
    <ul class="menu">
      <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
      <li><a href="#" data-scroll-nav="2">من نحن</a></li>
      <li><a href="{{ URL::to('/events') }}">الفعاليات</a></li>
      <li><a href="{{ URL::to('/registeration') }}">طلب عضوية</a></li>
      @if(Request::segment(1) == 'registeration')
      <li><a href="{{ URL::to('/'.'#memberships') }}">العضويات</a></li>
      <li><a href="#" data-scroll-nav="3">اتصل بنا</a></li>
      @else
      <li><a href="#" data-scroll-nav="3">العضويات</a></li>
      <li><a href="#" data-scroll-nav="4">اتصل بنا</a></li>
      @endif
    </ul>
  </div>
</div>

<div class="headerHeight"></div>