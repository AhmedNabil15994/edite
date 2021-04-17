@extends('Layouts.master')

@section('title','التحقق من العضوية')

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
            <h2>التحقق من العضوية</h2>
            <ul class="list-unstyled">
                <li class="active"><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li>التحقق من العضوية</li>
            </ul>
        </div>
    </div>
	    
   	<div class="registration">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-7 center-block">
   					<div class="verification">
              <h2 class="title">التحقق من العضوية</h2>
              <form method="post" action="{{ URL::current() }}">
                @csrf
                <input type="text" name="code" placeholder="أضف الرقم المرسل لك" />
                @if(Session::has('status'))
                <h2 class="title">{!! Session::get('status') !!}</h2>
                @endif
                <button class="btnForm">التحقق</button>
              </form>
            </div>
   				</div>
   			</div>
   		</div>
   	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection