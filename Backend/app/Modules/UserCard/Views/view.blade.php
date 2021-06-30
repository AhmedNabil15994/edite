<!DOCTYPE html>
<html>
<head>
    
   <meta charset="UTF-8" />
    <!-- IE Compatibility Meta -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta  -->
	<meta name="viewport" content="width=device-width, height=device-height ,  maximum-scale=1 , initial-scale=1">
    
    <title>{{ $data->order->card_name }}</title>
    
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap-rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />
    <style type="text/css">
    	.card{
    		margin-top: 250px;
    	}
    	.footerCard svg{
			position: absolute;
			left: 0;
		}
		.card .footerCard{
        	margin-left: 100%;
        }
    </style>
          
   <!--[if lt IE 9]>
       <script src="js/html5shiv.min.js"></script>
       <script src="js/respond.min.js"></script>
   <![endif]-->
  
    
</head>
<body>


	<div class="cards">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="card style{{ $data->order->membership_id }}">
						<img src="{{ asset('/assets/cards/images/bg'.$data->order->membership_id.'.png') }}" class="bg1" alt="" />
						<img src="{{ asset('/assets/cards/images/bg'.$data->order->membership_id.$data->order->membership_id.'.png') }}" class="bg2" alt="" />
						<div class="head clearfix">
							<div class="headDetails">
								<img src="{{ $data->image }}" />
								<span>{{ $data->order->fieldText }}</span>
								<span>{{ $data->order->fieldTextEn }}</span>
							</div>
							<div class="name">
								<span class="ar">{{ $data->order->name }}</span>
								<span>{{ $data->order->card_name }}</span>
							</div>
							<img src="{{ asset('/assets/cards/images/logo.png') }}" class="logo" />
						</div>
						<span class="type">{{ $data->membership_name }}</span>
						<div class="footerCard">
							{!! \QrCode::size(70)->generate($data->code) !!}
							<span class="date">{{ date('m/Y',strtotime($data->end_date)) }}</span>
							<span class="code">{{ $data->code }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
     
    	<script src="{{ asset('/assets/cards/js/jquery-1.11.2.min.js') }}"></script>
	    <script src="{{ asset('/assets/cards/js/bootstrap.min.js') }}"></script>
	    {{-- <script src="{{ asset('/assets/cards/js/custom.js') }}"></script> --}}
	    <script>
	    	$(function(){
	    		setTimeout(function(){
	    			var myURL = window.location.href;
					if(myURL.indexOf("#") != -1){
					    myURL = myURL.replace('#','');
					}
					if(myURL.indexOf("viewCard") != -1){
					    newMyURL = myURL.replace('viewCard','printCard');
						window.location.href = newMyURL;
					}
	    		},2000);
	    	});
	    </script>	
</body>

</html>