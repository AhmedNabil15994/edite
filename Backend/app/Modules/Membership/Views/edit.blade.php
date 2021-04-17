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
                        <a href="{{ URL::to('/memberships') }}" class="text-muted">العضويات</a>
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
                    @if(\Helper::checkRules('add-membership'))
                    <a href="{{ URL::to('/memberships/add') }}" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-plus"></i>
                        <span class="m-nav__link-text">اضافة</span>
                    </a>
                    @endif
                    @if(\Helper::checkRules('sort-membership'))
                    <a href="{{ URL::to('/memberships/arrange') }}" class="dropdown-item">
                        <i class="m-nav__link-icon fa fa-sort-numeric-up"></i>
                        <span class="m-nav__link-text">ترتيب</span>
                    </a>
                    @endif
                    @if(\Helper::checkRules('charts-membership'))
                    <a href="{{ URL::to('/memberships/charts') }}" class="dropdown-item">
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
                <i class="menu-icon far fa-id-card"></i>
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
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="{{ URL::to('/memberships/update/'.$data->data->id) }}">  
                    @csrf
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">العنوان عربي</label>
                            <input class="form-control" type="text" name="title" value="{{ $data->data->title }}" maxlength="" placeholder="">
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->data->created_at }}</span>
                        </div>
                    </div>     
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">السعر</label>
                            <input class="form-control mb-5" type="text" name="price" value="{{ $data->data->price }}" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <input type="hidden" name="status" value="{{ $data->data->status }}">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">السعر بعد الخصم</label>
                            <input class="form-control mb-5" type="text" name="discount_price" value="{{ $data->data->discount_price }}" maxlength="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">الشروط</label>
                            <div class="row">
                                @foreach($data->conditions as $key => $oneCondition)
                                <div class="col-lg-6 col-sm-6">
                                    <label class="checkbox checkbox-success">
                                    <input type="checkbox" {{ $data->data->conditions != '' && in_array($oneCondition->id,$data->data->conditions) ? 'checked' : '' }} name="conditions[]" value="{{ $oneCondition->id }}" />
                                    <span></span>{{ $oneCondition->title }}</label>
                                </div>
                                @endforeach

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
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->data->created_at }}</span>
                        </div>
                    </div> 
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 mt-15" style="margin-bottom: 20px;">المميزات</label>
                            <div class="row">
                                @foreach($data->features as $key => $oneFeature)
                                <div class="col-lg-6 col-sm-6">
                                    <label class="checkbox checkbox-success">
                                    <input type="checkbox" {{ $data->data->features != '' && in_array($oneFeature->id,$data->data->features) ? 'checked' : '' }} name="features[]" value="{{ $oneFeature->id }}" />
                                    <span></span>{{ $oneFeature->title }}</label>
                                </div>
                                @endforeach

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
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->data->created_at }}</span>
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

