<?php $__env->startSection('title','مجموعات المشرفين - اضافة'); ?>


<?php $__env->startSection('sub-header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h3 class="text-dark font-weight-bold my-1 mr-5 m-subheader__title--separator">مجموعات المشرفين</h3>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/')); ?>" class="text-muted"><i class="m-nav__link-icon la la-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/groups')); ?>" class="text-muted">مجموعات المشرفين</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/groups/add')); ?>" class="text-muted">اضافة</a>
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
                    <?php if(\Helper::checkRules('add-group')): ?>
                    <a href="<?php echo e(URL::to('/groups/add')); ?>" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-plus"></i>
                        <span class="m-nav__link-text">اضافة</span>
                    </a>
                    <?php endif; ?>
                    <?php if(\Helper::checkRules('sort-group')): ?>
                    <a href="<?php echo e(URL::to('/groups/arrange')); ?>" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-sort-numeric-up"></i>
                        <span class="m-nav__link-text">ترتيب</span>
                    </a>
                    <?php endif; ?>
                    <?php if(\Helper::checkRules('charts-group')): ?>
                    <a href="<?php echo e(URL::to('/groups/charts')); ?>" class="dropdown-item">
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
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="<?php echo e(URL::to('/groups/create')); ?>">  
                    <?php echo csrf_field(); ?>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">العنوان عربي</label>
                            <input type="hidden" name="status" value="">
                            <input class="form-control mb-5" type="text" name="title" value="<?php echo e(old('title')); ?>" maxlength="" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">الصلاحيات: </label>
                            <div class="row">
                                <?php $__currentLoopData = $data->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $onePermission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-sm-6">
                                    <label class="checkbox checkbox-success">
                                    <input type="checkbox" <?php echo e($onePermission['viewTitle'] == 'الرئيسية' ? 'checked' : ''); ?> name="<?php echo e($onePermission['title']); ?>" value="<?php echo e($onePermission['modulePermissions']); ?>" />
                                    <span></span><?php echo e($onePermission['viewTitle']); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <br>
                                            <button type="button" style="width:100%;" class="btn btn-success btn-lg btn-block SelectAllCheckBox">اختيار الكل</button>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <br>
                                            <button type="button" style="width:100%;" class="btn btn-danger btn-lg btn-block UnSelectAllCheckBox">عدم اختيار الكل</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">صلاحيات اداريه: </label>
                            <select name="admin_privs" class="form-control mb-5 select2" id="kt_select2_1">
                                <option value="0" <?php echo e(old('admin_privs') == 0 ? 'selected' : ''); ?>>لا</option>
                                <option value="1" <?php echo e(old('admin_privs') == 1 ? 'selected' : ''); ?>>نعم</option>
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
<?php echo $__env->make('Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Server/Projects/Edite/Backend/app/Modules/Group/Views/add.blade.php ENDPATH**/ ?>