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
                        Users 
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            
                            <a href="<?php echo route('users.create'); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
                                        <input type="hidden" class="inputsearchURL"  value="<?php echo route('users.index'); ?>">
                                        <input type="text" class="form-control inputsearch" placeholder="Search..." value="<?php echo e($searchParam); ?>" id="ordersSearch">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <div class="dropdown bootstrap-select form-control">
                                                <button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="kt_form_status" title="All">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">
                                                            <div class="filter-option-inner-inner"><?php echo e($statusParam); ?></div>
                                                        </div>
                                                    </div>
                                                </button>
                                                <div class="dropdown-menu " role="combobox">
                                                    <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                        <ul class="dropdown-menu inner show">
                                                            <li class="selected active">
                                                                <a role="option" href="<?php echo route('users.index'); ?>" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class="text">All</span></a>
                                                            </li>
                                                            <li>
                                                                <a role="option"  href="<?php echo route('users.index','status=0'); ?>" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false">
                                                                    <span class="text">Disabled</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a role="option"  href="<?php echo route('users.index','status=1'); ?>" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false">
                                                                    <span class="text">Enabled</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
                    <?php echo $__env->make('users.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>