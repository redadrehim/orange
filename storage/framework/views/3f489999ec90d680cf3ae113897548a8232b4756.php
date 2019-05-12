<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('code', 'Code'); ?>

    <?php echo Form::text('code', null, ['class' => 'form-control','required'=>'required']); ?>

    <?php echo Form::hidden('inventory', 0, ['class' => 'form-control']); ?>

</div>

<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('name', 'Name'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','required'=>'required']); ?>

</div>



<!-- Thumbnail Field -->
<div class=" form-group col-sm-12 col-lg-12 custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
    <label class="custom-file-label" for="customFile">Thumbnail</label>
</div>
<!--
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('media', 'Media'); ?>

    <div id="kt_repeater_1">
        <div class="form-group  row" id="kt_repeater_1">
            <div data-repeater-list="" class="col-lg-10">
                <div data-repeater-item class="form-group row align-items-center">
                    <div class=" form-group col-sm-10 col-lg-10 custom-file" >
                        <input type="file" class="custom-file-input" >
                        <label class="custom-file-label" for="customFile">File</label>
                        <span data-repeater-delete="" class="btn-sm btn btn-danger btn-pill" style="margin-top:10px!important;">Delete</span>
                    </div>
                </div>
            </div>
            <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill" style="height: 30px!important">
                    <span>
                        <i class="la la-plus"></i>
                        <span>Add More</span>
                    </span>
                </div>
        </div>
            
    </div>
</div>    
-->

<div class="form-group col-sm-12 col-lg-12" >
	<?php for($x = 1; $x <= 5; $x++): ?>
	<div class="form-group col-sm-9 col-lg-9 reda1-repeater-container" id="reda1-repeater-container-<?php echo e($x); ?>" style="display: <?php if($x != 1): ?> none <?php endif; ?>">	
	    <input type="file" class="custom-file-input" id="customFile<?php echo e($x); ?>" name="media[<?php echo e($x); ?>]">
	    <label class="custom-file-label" for="customFile<?php echo e($x); ?>">Media</label>
	    <?php if($x != 1): ?>
	        <span class="btn-sm btn btn-danger btn-pill reda1-repeater-delete" id="reda1-repeater-delete-<?php echo e($x); ?>" style="margin-top:10px!important;">Delete</span>
	    <?php endif; ?>
	   
	</div>
	<?php endfor; ?>

	<div class="btn btn btn-sm btn-brand btn-pill reda1-repeater-add " id="reda1-repeater-add-1" style="margin-top:10px;height: 30px !important;float: right !important;">   
        <span >
            <i class="la la-plus"></i>
            <span>Add More</span>
        </span>
	</div>
</div>
<div class="form-group col-sm-12 col-lg-12 reda1-repeater-add" style="height: 10px"></div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('description', 'Description'); ?>

    <?php echo Form::textarea('description', null, ['class' => 'form-control summernote','required'=>'required']); ?>

</div>

<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('is_offer', 'Is Offer'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('is_offer', null); ?>

        <span></span>
    </label>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('price', 'Price'); ?>

    <?php echo Form::number('price', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Off Price Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('old_price', 'Old Price'); ?>

    <?php echo Form::number('old_price', null, ['class' => 'form-control']); ?>

</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-12">
    <?php echo Form::label('brand_id', 'Brand'); ?>

    <?php echo Form::select('brand_id', $brands, old('brand_id'), ['id'=>'kt_select2_8','class' => ' m-select2 form-control','disabled' =>false]); ?>

</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    <?php echo Form::label('categories', 'Cagteogries'); ?>

    <?php if(isset($item->categories)): ?>
    <?php echo e(Form::select('categories[]', $categories, $item->categories->pluck('id')->all(), ['id' => 'kt_select2_11_categories', 'multiple' => 'multiple','class' => ' m-select2 form-control','disabled' =>false,'required'=>'required'])); ?>

    <?php else: ?>
    <?php echo e(Form::select('categories[]', $categories, null, ['id' => 'kt_select2_11_categories', 'multiple' => 'multiple','class' => 'm-select2 form-control','disabled' =>false,'required'=>'required'])); ?>

    <?php endif; ?>
    
</div>



<div class="form-group col-sm-12 col-lg-12" >
    <?php echo Form::label('factsheet', 'Fact Sheet'); ?>

    <?php for($x = 0; $x <= 10; $x++): ?>
    <div class="form-group col-sm-12 col-lg-12 reda2-repeater-container" id="reda2-repeater-container-<?php echo e($x); ?>" style="display: <?php if($x != 0 && !isset($item->facts[$x]->key)): ?> none <?php endif; ?>">
                
        <input placeholder="Key" class="form-control factsheetkey" id="factsheetkey-<?php echo e($x); ?>" value="<?php if(isset($item->facts[$x]->key)): ?> <?php echo e($item->facts[$x]->key); ?><?php endif; ?>" name="key[<?php echo e($x); ?>]" type="text" style="width: 40%;float: left;">
                    
        <input  placeholder="Content" class="form-control factsheetcontent" value="<?php if(isset($item->facts[$x]->content)): ?> <?php echo e($item->facts[$x]->content); ?><?php endif; ?>" id="factsheetcontent-<?php echo e($x); ?>"  name="content[<?php echo e($x); ?>]" type="text" style="width: 60%;float: left;">
      
        <span class="btn-sm btn btn-danger btn-pill reda2-repeater-delete" id="reda2-repeater-delete-<?php echo e($x); ?>" style="margin-top:10px!important;">Delete</span>

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













<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('status', 'Status'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('status', null); ?>

        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('items.index'); ?>" class="btn btn-default">Cancel</a>
</div>
