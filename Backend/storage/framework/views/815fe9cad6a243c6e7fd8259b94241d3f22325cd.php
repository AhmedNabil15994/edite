<!DOCTYPE html>
<html>
	<head>
	   	<meta charset="UTF-8" />
	    <!-- IE Compatibility Meta -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- First Mobile Meta  -->
		<meta name="viewport" content="width=device-width, height=device-height ,  maximum-scale=1 , initial-scale=1">
	    <title></title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		
	    <link rel="stylesheet" href="<?php echo e(asset('/assets/cards/css/bootstrap.css')); ?>" />
	    <link rel="stylesheet" href="<?php echo e(asset('/assets/cards/css/bootstrap-rtl.css')); ?>" />
	    <link rel="stylesheet" href="<?php echo e(asset('/assets/cards/css/font-awesome.min.css')); ?>" />
	    <link rel="stylesheet" href="<?php echo e(asset('/assets/cards/css/style.css')); ?>" />
	    <link rel="stylesheet" href="<?php echo e(asset('/assets/cards/css/responisve.css')); ?>" />  
	   	<!--[if lt IE 9]>
	       	<script src="<?php echo e(asset('/assets/card/js/html5shiv.min.js')); ?>"></script>
	       	<script src="<?php echo e(asset('/assets/card/js/respond.min.js')); ?>"></script>
	   	<![endif]-->
	   	<style type="text/css" media="">
	   		@font-face {
                font-family: "Tajawal-Regular";
                src:url('<?php echo e(asset("/assets/cards/fonts/Tajawal-Regular.ttf")); ?>') format('truetype');
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-Bold";
                src: url('<?php echo e(asset("/assets/cards/fonts/Tajawal-Bold.ttf")); ?>') format('truetype') ;
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-ExtraBold";
                src: url('<?php echo e(asset('/assets/cards/fonts/Tajawal-ExtraBold.ttf')); ?>') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            .cards{
    			font-family: 'Tajawal-Regular', sans-serif !important;
    			margin: auto;
            	width: 760px !important;
            	padding-top: 225px;
            	padding: 50px 40px;
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
						<div class="card style1">
							<img src="<?php echo e(asset('/assets/cards/images/bg'.$data->order->membership_id.'.png')); ?>" class="bg1" alt="" />
							<img src="<?php echo e(asset('/assets/cards/images/bg'.$data->order->membership_id.$data->order->membership_id.'.png')); ?>" class="bg2" alt="" />
							<div class="head clearfix">
								<div class="headDetails">
									<img src="<?php echo e($data->identity_image); ?>" />
									<span><?php echo e($data->order->fieldText); ?></span>
									
								</div>
								<div class="name">
									<span class="ar"><?php echo e($data->order->name); ?></span>
									<span><?php echo e($data->order->card_name); ?></span>
								</div>
								<img src="<?php echo e(asset('/assets/cards/images/logo.png')); ?>" class="logo" />
							</div>
							<span class="type">منتسب</span>
							<div class="footerCard">
								<?php echo \QrCode::size(70)->generate($data->code); ?>

								<span class="date"><?php echo e(date('m/Y',strtotime($data->end_date))); ?></span>
								<span class="code"><?php echo e($data->code); ?></span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <script src="<?php echo e(asset('/assets/cards/js/jquery-1.11.2.min.js')); ?>"></script>
	    <script src="<?php echo e(asset('/assets/cards/js/bootstrap.min.js')); ?>"></script>
	    
	</body>

</html><?php /**PATH /var/www/Server/Projects/Edite/Backend/app/Modules/UserCard/Views/print.blade.php ENDPATH**/ ?>