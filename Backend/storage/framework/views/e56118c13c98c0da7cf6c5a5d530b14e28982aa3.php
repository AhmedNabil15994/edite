<?php $__env->startSection('title','المشرفين والاداريين - اضافة'); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
    body{
        overflow-x: hidden;
    }
</style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h3 class="text-dark font-weight-bold my-1 mr-5 m-subheader__title--separator">المشرفين والاداريين</h3>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/')); ?>" class="text-muted"><i class="m-nav__link-icon la la-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/users')); ?>" class="text-muted">المشرفين والاداريين</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/users/add')); ?>" class="text-muted">اضافة</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Dropdown-->
            <div class="main-menu dropdown dropdown-inline">
                <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor"></i>
                </button>
                <div class="dropdown-menu" dropdown-toggle="hover">
                    <?php if(\Helper::checkRules('add-user')): ?>
                    <a href="<?php echo e(URL::to('/users/add')); ?>" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-plus"></i>
                        <span class="m-nav__link-text">اضافة</span>
                    </a>
                    <?php endif; ?>
                    <?php if(\Helper::checkRules('sort-user')): ?>
                    <a href="<?php echo e(URL::to('/users/arrange')); ?>" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-sort-numeric-up"></i>
                        <span class="m-nav__link-text">ترتيب</span>
                    </a>
                    <?php endif; ?>
                    <?php if(\Helper::checkRules('charts-user')): ?>
                    <a href="<?php echo e(URL::to('/users/charts')); ?>" class="dropdown-item">
                        <i class="m-nav__link-icon flaticon-graph"></i>
                        <span class="m-nav__link-text">الاحصائيات</span>
                    </a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <div href="#" class="dropdown-item">
                        <a href="<?php echo e(URL::to('/logout')); ?>" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
            <!--end::Dropdown-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="menu-icon flaticon-users"></i>
            </span>
            <h3 class="card-label">اضافة</h3>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs  m-tabs-line" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#AddTabs" role="tab"><i class="fa fa-plus"></i>اضافة</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="AddTabs" role="tabpanel">
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="<?php echo e(URL::to('/users/create')); ?>">  
                    <?php echo csrf_field(); ?>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">مجموعات المشرفين:</label>
                            <select class="form-control" name="group_id">
                                <option value="0">حدد اختيارك</option>
                                <?php $__currentLoopData = $data->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($group->id); ?>" <?php echo e(old('group_id')  == $group->id ? 'selected' : ''); ?>><?php echo e($group->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الاسم عربي</label>
                            <input class="form-control mb-5" type="text" name="name_ar" value="<?php echo e(old('name_ar')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الاسم انجليزي</label>
                            <input class="form-control mb-5" type="text" name="name_en" value="<?php echo e(old('name_en')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">حدد النوع: </label>
                            <select name="gender" class="form-control mb-5 select2" id="kt_select2_13">
                                <option value="1" <?php echo e(old('gender') == 1 ? 'selected' : ''); ?>>ذكر</option>
                                <option value="2" <?php echo e(old('gender') == 2 ? 'selected' : ''); ?>>انثي</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">اسم المستخدم</label>
                            <input type="hidden" name="status" value="">
                            <input class="form-control mb-5" type="text" name="username" value="<?php echo e(old('username')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">كلمة المرور: </label>
                            <input class="form-control mb-5" type="password" name="password" value="" maxlength="" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">البريد الالكتروني: </label>
                            <input class="form-control mb-5" type="email" name="email" value="<?php echo e(old('email')); ?>" maxlength="" placeholder="">
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">العنوان: </label>
                            <input class="form-control mb-5" type="text" name="address" value="<?php echo e(old('address')); ?>" maxlength="" placeholder="">
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رقم الجوال: </label>
                            <input class="form-control mb-5" type="text" name="phone" value="<?php echo e(old('phone')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">المدينة: </label>
                            <select name="city_id" class="form-control mb-5 select2" id="kt_select2_5">
                                <option value="">حدد اختيارك</option>
                                <?php $__currentLoopData = $data->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id') == $city->id ? 'selected' : ''); ?>><?php echo e($city->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رابط فيسبوك</label>
                            <input class="form-control mb-5 m-input" type="text" name="facebook" value="<?php echo e(old('facebook')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رابط تويتر</label>
                            <input class="form-control mb-5 m-input" type="text" name="twitter" value="<?php echo e(old('twitter')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رابط يوتيوب</label>
                            <input class="form-control mb-5 m-input" type="text" name="youtube" value="<?php echo e(old('youtube')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رابط سناب شات</label>
                            <input class="form-control mb-5 m-input" type="text" name="snapchat" value="<?php echo e(old('snapchat')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رابط انستجرام</label>
                            <input class="form-control mb-5 m-input" type="text" name="instagram" value="<?php echo e(old('instagram')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">حالة التفعيل: </label>
                            <select name="is_active" class="form-control mb-5 select2" id="kt_select2_2">
                                <option value="0" <?php echo e(old('is_active') == 0 ? 'selected' : ''); ?>>غير مفعل</option>
                                <option value="1" <?php echo e(old('is_active') == 1 ? 'selected' : ''); ?>>مفعل</option>
                            </select>
                        </div>
                    </div>     
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">اظهار البيانات: </label>
                            <select name="show_details" class="form-control mb-5 select2" id="kt_select2_3">
                                <option value="0" <?php echo e(old('show_details') == 0 ? 'selected' : ''); ?>>لا</option>
                                <option value="1" <?php echo e(old('show_details') == 1 ? 'selected' : ''); ?>>نعم</option>
                            </select>
                        </div>
                    </div>     
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">اظهار الصور: </label>
                            <select name="show_images" class="form-control mb-5 select2" id="kt_select2_12">
                                <option value="0" <?php echo e(old('show_images') == 0 ? 'selected' : ''); ?>>لا</option>
                                <option value="1" <?php echo e(old('show_images') == 1 ? 'selected' : ''); ?>>نعم</option>
                            </select>
                        </div>
                    </div>     
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">نبذة تعريفية</label>
                            <textarea class="summernote mb-5" id="kt_summernote_1" name="brief"><?php echo e(old('brief')); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">وقت قفل الشاشة: </label>
                            <input class="form-control mb-5" type="number" name="session_time" value="<?php echo e(old('session_time')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الصورة</label>
                            <div class="dropzone dropzone-default mb-5" id="kt_dropzone_1">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                    <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">اختر لغتك: </label>
                            <select name="lang" class="form-control mb-5 select2" id="kt_select2_1">
                                <option value="0" <?php echo e(old('lang') == 0 ? 'selected' : ''); ?>>ar</option>
                            </select>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <input name="Submit" type="submit" class="btn btn-success AddBTN " value="اضافة" id="SubmitBTN">
                <input name="Submit" type="submit" class="btn btn-primary AddBTN " value="حفظ كمسودة" id="SaveBTN">
                <input type="reset" class="btn btn-danger Reset" value="مسح الحقول">
                <input name="Add" type="hidden" value="TRUE" id="SaveBTN">
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('/assets/js/pages/crud/forms/editors/summernote.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Server/Projects/Edite/Backend/app/Modules/User/Views/add.blade.php ENDPATH**/ ?>