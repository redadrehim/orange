<table class="table table-striped- table-bitemed table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>In Stock</th>
            <th>Price</th>
            <th>Brand Name</th>
            <th>Is Offer</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->id; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->name; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->code; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->quantity; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->in_stock; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->price; ?></td>
        <td data-field="itemID" class="kt-datatable__cell"><?php echo $item->brand_id; ?></td>
         <td data-field="IsOffer" class="kt-datatable__cell"><?php if($item->is_offer): ?> Is Offer Item <?php endif; ?></td>
        <td data-field="Status" class="kt-datatable__cell"><?php if($item->status): ?> On <?php else: ?> Off <?php endif; ?></td>

        
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="<?php echo route('items.edit', [$item->id]); ?>" ><i class="la la-edit"></i></a>
            <a href="<?php echo route('items.delete', [$item->id]); ?>" ><i class="la la-trash"></i></a>
            <a href="<?php echo route('items.inventory', [$item->id]); ?>" ><i class="la la-inventory"></i> inventory</a>
            <a href="<?php echo route('logs.index'); ?>?search=<?php echo e($item->code); ?>" ><i class="la la-log"></i> Log</a>
        </td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="<?php echo e($items->url(1)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="<?php echo e($items->previousPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        <?php for($i =1; $i <= $items->lastPage(); $i++): ?>
         <li style=""></li>
        <li>
            <a href="<?php echo e($items->url($i)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link-number <?php if($i==$items->currentPage()): ?> kt-datatable__pager-link--active <?php endif; ?> " data-page="1" title="1"><?php echo e($i); ?></a>
        </li>
        <?php endfor; ?>
        
        
        <li><a title="Next" href="<?php echo e($items->nextPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="<?php echo e($items->url($items->lastPage())); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing <?php echo e($items->firstItem()); ?> - <?php echo e($items->lastItem()); ?> of <?php echo e($items->total()); ?></span>
    </div>
</div>