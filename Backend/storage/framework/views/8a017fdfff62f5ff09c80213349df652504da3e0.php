<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta charset="utf-8" />
    <title><?php echo e(\App\Models\Variable::getVar('العنوان عربي')); ?> | تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,600,700" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?php echo e(asset('/assets/css/pages/login/classic/login-3.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo e(asset('/assets/plugins/global/plugins.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?php echo e(asset('/assets/css/themes/layout/header/base/light.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/css/themes/layout/header/menu/light.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/css/themes/layout/brand/dark.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/css/themes/layout/aside/dark.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?php echo e(asset('/assets/images/favicon.ico')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/css/login.css')); ?>">
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Login-->
      <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(<?php echo e(asset('/assets/images/bg-3.jpg')); ?>);">
          <div class="login-form text-center text-updated p-7 position-relative overflow-hidden">
            <!--begin::Login Header-->
            <div class="d-flex flex-center mb-15">
              <a href="#">
                <img src="<?php echo e(asset('/assets/images/favicon.ico')); ?>" class="max-h-100px" alt="" />
              </a>
            </div>
            <!--end::Login Header-->
            <!--begin::Login Sign in form-->
            <div class="login-signin animate__animated">
              <div class="mb-20">
                <h3>تسجيل الدخول للوحة التحكم</h3>
                <!-- <p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p> -->
              </div>
              <form class="form" id="kt_login_signin_form" action="<?php echo e(URL::to('/login')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <input class="form-control h-auto text-right text-updated placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="اسم المستخدم" name="username" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input class="form-control h-auto text-right text-updated placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="كلمة المرور" name="password" />
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
                  <a href="javascript:;" id="kt_login_forgot" class="text-updated font-weight-bold">نسيت كلمة المرور ؟</a>
                  <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-white text-muted font-b m-0">
                      <input type="checkbox" name="remember" />
                      تذكرني<span></span>
                    </label>
                  </div>
                </div>
                <div class="form-group text-center mt-10">
                  <button id="kt_login_signin_submit" class="btn btn-pill btn-outline-brand font-weight-bold opacity-90 px-15 py-3">انطلق</button>
                </div>
              </form>
              <div class="mt-10">
                
                
              </div>
            </div>
            <!--end::Login Sign in form-->
            <!--begin::Login forgot password form-->
            <div class="login-forgot animate__animated">
              <div class="mb-20">
                <h3>نسيت كلمة المرور ؟</h3>
                <p class="opacity-60">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بك:</p>
              </div>
              <form class="form" id="kt_login_forgot_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-10">
                  <input class="form-control h-auto text-right text-updated placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="البريد الالكتروني" name="email" autocomplete="off" />
                </div>
                <div class="form-group">
                  <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">الغاء</button>
                  <button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-brand font-weight-bold opacity-90 px-15 py-3 m-2">طلب</button>
                </div>
              </form>
            </div>
            <!--end::Login forgot password form-->
          </div>
        </div>
      </div>
      <!--end::Login-->
    </div>
    <?php echo $__env->make('Partials.notf_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--end::Main-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo e(asset('/assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/scripts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/components/notifications.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/components/login.js')); ?>"></script>
  </body>
  <!--end::Body-->
</html><?php /**PATH /var/www/Server/Projects/Edite/Backend/app/Modules/Auth/Views/login.blade.php ENDPATH**/ ?>