{{-- Extends layout --}}
@extends('Layouts.master')
@section('title','العضويات - تعديل')

{{-- Content --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/default-skin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/photoswipe.css') }}">
<style type="text/css" media="screen">
    body{
        overflow-x: hidden;
    }
</style>
@endsection

@section('content')
<div class="py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h3 class="text-dark font-weight-bold my-1 mr-5 m-subheader__title--separator">العضويات</h3>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ URL::to('/') }}" class="text-muted"><i class="m-nav__link-icon la la-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ URL::to('/العضويات') }}" class="text-muted">العضويات</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ URL::current() }}" class="text-muted">تعديل</a>
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
                    @if(\Helper::checkRules('charts-user-card'))
                    <a href="{{ URL::to('/userCards/charts') }}" class="dropdown-item">
                        <i class="m-nav__link-icon flaticon-graph"></i>
                        <span class="m-nav__link-text">الاحصائيات</span>
                    </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <div href="#" class="dropdown-item">
                        <a href="{{ URL::to('/logout') }}" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">تسجيل الخروج</a>
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
                <i class="menu-icon flaticon-home-2"></i>
            </span>
            <h3 class="card-label">تعديل</h3>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs  m-tabs-line" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#AddTabs" role="tab"><i class="la la-refresh"></i>تعديل</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="AddTabs" role="tabpanel">
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="{{ URL::to('/userCards/update/'.$data->id) }}">  
                    @csrf
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">الكود</label>
                            <input class="form-control" type="text" name="code" readonly value="{{ $data->code }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>   
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رقم الهوية</label>
                            <input class="form-control" type="text" name="identity_no" value="{{ $data->identity_no }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>   
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">تاريخ انتهاء الهوية</label>
                            <input class="form-control datetimepicker-input" id="kt_datetimepicker_7_1"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_1" type="text" name="identity_end_date" value="{{ $data->identity_end_date }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>     
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الاسم علي البطاقة</label>
                            <input class="form-control" type="text" name="card_name" value="{{ $data->card_name }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">رقم الشحنة</label>
                            <input class="form-control" type="text" name="deliver_no" value="{{ $data->deliver_no }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">تاريخ البدء</label>
                            <input class="form-control datetimepicker-input" id="kt_datetimepicker_7_2"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_2" type="text" name="start_date" value="{{ $data->start_date }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">تاريخ الانتهاء</label>
                            <input class="form-control datetimepicker-input" id="kt_datetimepicker_7_3"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_3" type="text" name="end_date" value="{{ $data->end_date }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">العضوية</label>
                            <select name="membership_id" class="form-control">
                                <option value="">حدد اختيارك</option>
                                @foreach($data->allmemberships as $membership)
                                <option value="{{ $membership->id }}" {{ $membership->id == $data->membership_id ? 'selected' : '' }}>{{ $membership->title }}</option>
                                @endforeach
                            </select>
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الحالة</label>
                            <select name="status" class="form-control">
                                <option value="">حدد اختيارك</option>
                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>غير مفعلة</option>
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>مفعلة</option>
                                <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>لم يتم التصدير</option>
                            </select>
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->created_at }}</span>
                        </div>
                    </div>  
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">صورة الهوية</label>
                            <div class="dropzone dropzone-default" id="kt_dropzone_110">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                    <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                </div>
                                @if($data->identity_image != '')
                                <div class="dz-preview dz-image-preview" id="my-preview">  
                                    <div class="dz-image">
                                        <img alt="image" src="{{ $data->identity_image }}">
                                    </div>  
                                    <div class="dz-details">
                                        <div class="PhotoBTNS">
                                            <div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">
                                               <figure itemprop="associatedMedia" itemscope="" itemtype="">
                                                    <a href="{{ $data->identity_image }}" itemprop="contentUrl" data-size="555x370"><i class="flaticon-search"></i></a>
                                                    <img src="{{ $data->identity_image }}" itemprop="thumbnail" style="display: none;">
                                                </figure>
                                            </div>
                                            <a class="DeleteCardPhoto" data-tabs="identity_image" data-area="{{ $data->id }}"><i class="flaticon-delete"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">الصورة الشخصية</label>
                            <div class="dropzone dropzone-default" id="kt_dropzone_111">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                    <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                </div>
                                @if($data->image != '')
                                <div class="dz-preview dz-image-preview" id="my-preview">  
                                    <div class="dz-image">
                                        <img alt="image" src="{{ $data->image }}">
                                    </div>  
                                    <div class="dz-details">
                                        <div class="PhotoBTNS">
                                            <div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">
                                               <figure itemprop="associatedMedia" itemscope="" itemtype="">
                                                    <a href="{{ $data->image }}" itemprop="contentUrl" data-size="555x370"><i class="flaticon-search"></i></a>
                                                    <img src="{{ $data->image }}" itemprop="thumbnail" style="display: none;">
                                                </figure>
                                            </div>
                                            <a class="DeleteCardPhoto" data-tabs="image" data-area="{{ $data->id }}"><i class="flaticon-delete"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
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
                <input name="Submit" type="submit" class="btn btn-success AddBTN " value="حفظ" id="SubmitBTN">
                <input name="Submit" type="submit" class="btn btn-primary AddBTN " value="حفظ كمسودة" id="SaveBTN">
                <input type="reset" class="btn btn-danger Reset pageReset" value="مسح الحقول">
                <input name="Add" type="hidden" value="TRUE" id="SaveBTN">
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
@endsection

@section('modals')
@include('Partials.photoswipe_modal')
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('/assets/js/photoswipe.min.js') }}"></script>
<script src="{{ asset('/assets/js/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('/assets/components/myPhotoSwipe.js') }}"></script>     
@endsection

