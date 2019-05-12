@extends('layouts.app')

@section('content')

    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Users </h3>

                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>
            

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--begin::Portlet-->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="kt-portlet">

                        <!--begin::Form-->


                        {!! Form::model($user, ['route' => ['brands.update', $user->id], 'method' => 'patch','enctype'=>'multipart/form-data','class' => 'kt-form kt-form--label-right','id'=>'kt_form_2','novalidate'=>'novalidate']) !!}

                          @include('users.fields')

                        {!! Form::close() !!}


                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>


@endsection


