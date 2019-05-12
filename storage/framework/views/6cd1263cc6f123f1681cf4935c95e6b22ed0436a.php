<table class="table table-striped- table-bordered table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $promotion->id; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $promotion->name; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $promotion->code; ?></td>
        <td data-field="Status" class="kt-datatable__cell"><?php if($promotion->status): ?> On <?php else: ?> Off <?php endif; ?></td>

        
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="<?php echo route('promotions.edit', [$promotion->id]); ?>" ><i class="la la-edit"></i></a>
            <a href="<?php echo route('promotions.destroy', [$promotion->id]); ?>" ><i class="la la-trash"></i></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="<?php echo e($promotions->url(1)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="<?php echo e($promotions->previousPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        <?php for($i =1; $i <= $promotions->lastPage(); $i++): ?>
         <li style=""></li>
        <li>
            <a href="<?php echo e($promotions->url($i)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link-number <?php if($i==$promotions->currentPage()): ?> kt-datatable__pager-link--active <?php endif; ?> " data-page="1" title="1"><?php echo e($i); ?></a>
        </li>
        <?php endfor; ?>
        
        
        <li><a title="Next" href="<?php echo e($promotions->nextPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="<?php echo e($promotions->url($promotions->lastPage())); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing <?php echo e($promotions->firstItem()); ?> - <?php echo e($promotions->lastItem()); ?> of <?php echo e($promotions->total()); ?></span>
    </div>
</div>