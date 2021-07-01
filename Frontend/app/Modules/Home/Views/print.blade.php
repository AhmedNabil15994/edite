<!DOCTYPE html>
<html>
	<head>
	   	<meta charset="UTF-8" />
	    <!-- IE Compatibility Meta -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- First Mobile Meta  -->
		<meta name="viewport" content="width=device-width, height=device-height ,  maximum-scale=1 , initial-scale=1">
	    <title></title>
		{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
		{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet"> --}}
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap-rtl.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/font-awesome.min.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />  
	   	<!--[if lt IE 9]>
	       	<script src="{{ asset('/assets/card/js/html5shiv.min.js') }}"></script>
	       	<script src="{{ asset('/assets/card/js/respond.min.js') }}"></script>
	   	<![endif]-->
	   	<style type="text/css" media="">
	   		@font-face {
                font-family: "Tajawal-Regular";
                src:url('{{ asset("/assets/cards/fonts/Tajawal-Regular.ttf") }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-Bold";
                src: url('{{ asset("/assets/cards/fonts/Tajawal-Bold.ttf") }}') format('truetype') ;
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-ExtraBold";
                src: url('{{ asset('/assets/cards/fonts/Tajawal-ExtraBold.ttf') }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            .cards{
    			font-family: 'Tajawal-Regular', sans-serif !important;
            	padding-top: 225px;
            }
	        .contentCard2 .data li,.validTill{
	        	font-size: 24px;
	        }
	        .footerCard svg{
				position: absolute;
				left: 0;
			}
			.card .footerCard{
	        	margin-left: 100%;
	        }
	        .card .head .name span{
	        	font-size: 26px;
	        }
	   	</style>
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
								{!! \QrCode::size(70)->generate(URL::to('/').'/printCard/'.$data->id) !!}
								<span class="date">{{ date('m/Y',strtotime($data->end_date)) }}</span>
								<span class="code">{{ $data->code }}</span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>