<?php $__env->startSection('content'); ?>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Logs 
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            
                            <a href="<?php echo route('logs.create'); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="kt-portlet__body">
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="row align-items-center">
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <input type="hidden" class="inputsearchURL"  value="<?php echo route('logs.index'); ?>">
                                        <input type="text" class="form-control inputsearch" placeholder="Search..." value="<?php echo e($searchParam); ?>" id="ordersSearch">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
                    <?php echo $__env->make('logs.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>