
<!-- Item Id Field -->
<!--
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('items', 'Items'); ?>

    <?php if(isset($order->items)): ?>
    <?php echo e(Form::select('items[]', $items, $order->items->pluck('id')->all(), ['id' => 'kt_select2_11_items', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php else: ?>
    <?php echo e(Form::select('items[]', $items, null, ['id' => 'kt_select2_11_items', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php endif; ?>
    
</div>
-->
<div class="form-group col-sm-12 col-lg-12" >
    <?php echo Form::label('items', 'Items'); ?>

    <?php echo Form::hidden('taxes', $taxes, ['class' => 'form-control orderitemtaxes']); ?>

    <?php echo Form::hidden('ajaxurl', route('items.ajax'), ['class' => 'form-control orderitemajaxurl']); ?>

    <?php for($x = 1; $x <= 10; $x++): ?>
    <div class="form-group col-sm-12 col-lg-12 reda2-repeater-container" id="reda2-repeater-container-<?php echo e($x); ?>" style="display: <?php if($x != 1): ?> none <?php endif; ?>">
    			<div class="orderitems" id="orderitems-<?php echo e($x); ?>" >
                  
                    <input placeholder="Code" class="form-control orderitemcode" id="orderitemcode-<?php echo e($x); ?>" name="code[<?php echo e($x); ?>]" type="text" style="width: 20%;float: left;">


                    
                    <input  placeholder="Id" class="form-control orderitemid" id="orderitemid-<?php echo e($x); ?>" disabled="disabled" name="id[<?php echo e($x); ?>]" type="hidden" style="width: 20%;float: left;">

                     <input  placeholder="price" class="form-control orderitemprice" value="0" id="orderitemprice-<?php echo e($x); ?>" disabled="disabled" name="price[<?php echo e($x); ?>]" type="text" style="width: 20%;float: left;">

                  
                    <input placeholder="Name" class="form-control orderitemname" id="orderitemname-<?php echo e($x); ?>"  disabled="disabled" name="name[<?php echo e($x); ?>]" type="text" style="width: 40%;float: left;">



                    <input placeholder="Quantity" class="form-control orderitemquantity" value="0" id="orderitemquantity-<?php echo e($x); ?>" name="quantity[<?php echo e($x); ?>]" type="number" style="width: 20%;float: left;">

      
            		<span class="btn-sm btn btn-danger btn-pill reda2-repeater-delete" id="reda2-repeater-delete-<?php echo e($x); ?>" style="margin-top:10px!important;">Delete</span>
     			</div> 

    </div>

    <?php endfor; ?>


    <div class="btn btn btn-sm btn-brand btn-pill reda2-repeater-add " id="reda2-repeater-add-1" style="margin-top:10px;margin-bottom:10px;height: 30px !important;float: right !important;">   
        <span >
            <i class="la la-plus"></i>
            <span>Add More</span>
        </span>
    </div>

    
</div>
<div class="form-group col-sm-12 col-lg-12 reda2-repeater-add" style="height: 10px"></div>

<!-- User Id Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('mobile', 'Mobile'); ?>

    <!--<?php echo Form::select('user_id', $users, old('user_id'), ['id'=>'kt_select2_8','class' => 'form-control m-select2','disabled' =>false]); ?>-->
    <?php echo Form::number('mobile', null, ['class' => 'form-control ordertotal']); ?>

</div>

<!-- Total Field -->
<div class="form-group col-sm-6  col-lg-12">
	<div class="btn btn btn-sm btn-brand btn-pill reda2-repeater-calculate " id="reda2-repeater-calculate-1" style="margin-top:10px;margin-bottom:10px;height: 30px !important;float: right !important;">   
        <span >
            
            <span>Calculate Total</span>
        </span>
    </div>
    <?php echo Form::label('total', 'Total'); ?>

    <?php echo Form::number('total', null, ['class' => 'form-control ordertotal','disabled'=>'disabled']); ?>

</div>

<!-- Grand Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('grand', 'Grand Total including Taxes'); ?>

    <?php echo Form::number('grand', null, ['class' => 'form-control ordergrandtotal','disabled'=>'disabled']); ?>

</div>

<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('status', 'Status'); ?>

    <?php echo Form::select('status', $statuses, old('status'), ['id'=>'kt_select2_8','class' => 'form-control m-select2','disabled' =>false]); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('orders.index'); ?>" class="btn btn-default">Cancel</a>
</div>
