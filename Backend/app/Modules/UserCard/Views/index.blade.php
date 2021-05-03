{{-- Extends layout --}}
@extends('Layouts.master')
@section('title','العضويات')

{{-- Content --}}
@section('sub-header')

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
                        <a href="{{ URL::to('/userCards') }}" class="text-muted">العضويات</a>
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
                <i class="menu-icon far fa-credit-card"></i>
            </span>
            <h3 class="card-label">العضويات</h3>
        </div>
        <div class="card-toolbar">
            @if(\Helper::checkRules('edit-user-card'))
            <a href="#" class="btn btn-outline-success quickEdit m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill " data-toggle="tooltip" data-placement="top" data-original-title="تعديل سريع">
                <i class="la la-edit"></i>
            </a>
            @endif
            <a href="#" class="btn btn-outline-danger search-mode m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill " data-toggle="tooltip" data-placement="top" data-original-title="معلومات عن البحث المتقدم">
                <i class="flaticon-questions-circular-button"></i>
            </a>
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                الاجراءات</button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <ul class="nav flex-column nav-hover">
                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">خيارات التصدير</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link print-but">
                                <i class="nav-icon la la-print"></i>
                                <span class="nav-text">Print</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link copy-but">
                                <i class="nav-icon la la-copy"></i>
                                <span class="nav-text">Copy</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link excel-but">
                                <i class="nav-icon la la-file-excel-o"></i>
                                <span class="nav-text">Excel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link csv-but">
                                <i class="nav-icon la la-file-text-o"></i>
                                <span class="nav-text">CSV</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pdf-but">
                                <i class="nav-icon la la-file-pdf-o"></i>
                                <span class="nav-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
        </div>
    </div>
    <div class="card-body">
        <div class="accordion accordion-solid accordion-toggle-arrow" id="accordionExample6">
            <div class="card ">
                <div class="card-header" id="headingTwo6">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="false">
                        <i class="flaticon-search-1"></i>البحث المتقدم
                    </div>
                </div>
                <div id="collapseTwo6" class="collapse" data-parent="#accordionExample6" style="">
                    <div class="card-body">
                        <form class="m-form m-form--fit m--margin-bottom-20" method="get" action="{{ URL::current() }}">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>ID:</label>
                                    <input type="text" class="form-control m-input" name="id" value="{{ Request::get('id') }}" data-col-index="0">
                                    <br>
                                </div>  
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>الكود:</label>
                                    <input type="text" class="form-control m-input" name="code" value="{{ Request::get('code') }}" data-col-index="1">
                                    <br>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>رقم الهوية:</label>
                                    <input type="text" class="form-control m-input" name="indentity_no" value="{{ Request::get('indentity_no') }}" data-col-index="4">
                                    <br>
                                </div>  
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>تاريخ انتهاء الهوية:</label>
                                    <input type="text" class="form-control m-input datetimepicker-input" id="kt_datetimepicker_7_5" placeholder="تاريخ انتهاء الهوية"  name="identity_end_date" value="{{ Request::get('identity_end_date') }}" data-col-index="5" data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_5">
                                    <br>
                                </div>   
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>الاسم علي البطاقة:</label>
                                    <input type="text" class="form-control m-input" name="card_name" value="{{ Request::get('card_name') }}" data-col-index="6">
                                    <br>
                                </div> 
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>رقم الشحنة:</label>
                                    <input type="text" class="form-control m-input" name="deliver_no" value="{{ Request::get('deliver_no') }}" data-col-index="7">
                                    <br>
                                </div> 
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>العضوية:</label>
                                    <select name="membership_id" class="form-control m-input">
                                        <option value="">حدد اختيارك</option>
                                        @foreach($data->memberships as $membership)
                                        <option value="{{ $membership->id }}">{{ $membership->title }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>تاريخ البدء:</label>
                                    <input type="text" class="form-control datetimepicker-input" id="kt_datetimepicker_7_1" placeholder="تاريخ البدء"  name="start_date" value="{{ Request::get('start_date') }}" data-col-index="5" data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_1" />
                                    <br>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>تاريخ الانتهاء:</label>
                                    <input type="text" class="form-control datetimepicker-input" id="kt_datetimepicker_7_3" placeholder="تاريخ الانتهاء"  name="end_date" value="{{ Request::get('end_date') }}" data-col-index="6" data-toggle="datetimepicker" data-target="#kt_datetimepicker_7_3" />
                                    <br>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <label>الحالة:</label>
                                    <select name="status" class="form-control m-input">
                                        <option value="">حدد اختيارك</option>
                                        <option value="1">مفعلة</option>
                                        <option value="2">تم ارسال الطلب</option>
                                        <option value="3">تم الرفض</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                            <div class="m-separator m-separator--md m-separator--dashed"></div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-brand m-btn m-btn--icon" type="submit" id="m_search">
                                        <span>
                                            <i class="la la-search"></i>
                                            <span>البحث</span>
                                        </span>
                                    </button>
                                    &nbsp;&nbsp;
                                    <a href="{{ URL::to('/userCards') }}" class="btn btn-secondary m-btn m-btn--icon" id="m_reset">
                                        <span>
                                            <i class="la la-close"></i>
                                            <span>الغاء</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="data-area" value="{{ \Helper::checkRules('edit-user-card') }}">
        <input type="hidden" name="data-cols" value="{{ \Helper::checkRules('delete-user-card') }}">
        <!--begin: Datatable-->
        <table class="table table-separate  table-hover table-bordered table-head-custom table-foot-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>الكود</th>
                    <th>الصورة الشخصية</th>
                    <th>صورة الهوية</th>
                    <th>رقم الهوية</th>
                    <th>تاريخ انتهاء الهوية</th>
                    <th>الاسم علي البطاقة</th>
                    <th>رقم الشحنة</th>
                    <th>العضوية</th>
                    <th>تاريخ البدء</th>
                    <th>تاريخ الانتهاء</th>
                    <th>الحالة</th>
                    <th>الاجراءات</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>الكود</th>
                    <th>الصورة الشخصية</th>
                    <th>صورة الهوية</th>
                    <th>رقم الهوية</th>
                    <th>تاريخ انتهاء الهوية</th>
                    <th>الاسم علي البطاقة</th>
                    <th>رقم الشحنة</th>
                    <th>العضوية</th>
                    <th>تاريخ البدء</th>
                    <th>تاريخ الانتهاء</th>
                    <th>الحالة</th>
                    <th>الاجراءات</th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection

@section('modals')
@include('Partials.search_modal')
@include('Partials.newMemberModal')
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('/assets/components/userCards-datatables.js')}}"></script>           
@endsection
