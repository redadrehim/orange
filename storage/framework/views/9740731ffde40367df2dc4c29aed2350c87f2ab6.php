<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('name', 'Name'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('categories', 'Cagteogries'); ?>

    <?php if(isset($promotion->categories)): ?>
    <?php echo e(Form::select('categories[]', $categories, $promotion->categories->pluck('id')->all(), ['id' => 'kt_select2_11_categories', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php else: ?>
    <?php echo e(Form::select('categories[]', $categories, null, ['id' => 'kt_select2_11_categories', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php endif; ?>
    
</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('brands', 'Brands'); ?>

    <?php if(isset($promotion->brands)): ?>
    <?php echo e(Form::select('brands[]', $brands, $promotion->brands->pluck('id')->all(), ['id' => 'kt_select2_11_brands', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php else: ?>
    <?php echo e(Form::select('brands[]', $brands, null, ['id' => 'kt_select2_11_brands', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php endif; ?>
    
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('items', 'Items'); ?>

    <?php if(isset($promotion->items)): ?>
    <?php echo e(Form::select('items[]', $items, $promotion->items->pluck('id')->all(), ['id' => 'kt_select2_11_items', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php else: ?>
    <?php echo e(Form::select('items[]', $items, null, ['id' => 'kt_select2_11_items', 'multiple' => 'multiple','class' => 'form-control m-select2','disabled' =>false,'required'=>'required'])); ?>

    <?php endif; ?>
    
</div>


<!-- Discount Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('discount', 'Discount'); ?>

    <?php echo Form::number('discount', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Type Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('type', 'Type'); ?>

    <?php echo Form::select('type', $types, old('type'), ['class' => 'custom-select form-control','disabled' =>false]); ?>

</div>

<!-- Code Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('code', 'Code'); ?>

    <?php echo Form::text('code', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('status', 'Status'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('status', null, ['checked' => 'checked']); ?>

        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('promotions.index'); ?>" class="btn btn-default">Cancel</a>
</div>
