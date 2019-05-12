<table class="table table-striped- table-bordered table-hover table-checkable" id="">
    <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th  colspan="4" style="width: 70%;">Log</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        <td data-field="Id" class="kt-datatable__cell"><?php echo $log->id; ?></td>
        
        <td data-field="Name" class="kt-datatable__cell" colspan="4"><?php echo $log->content; ?></td>
        
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="<?php echo e($logs->url(1)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="<?php echo e($logs->previousPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        <?php for($i =1; $i <= $logs->lastPage(); $i++): ?>
         <li style=""></li>
        <li>
            <a href="<?php echo e($logs->url($i)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link-number <?php if($i==$logs->currentPage()): ?> kt-datatable__pager-link--active <?php endif; ?> " data-page="1" title="1"><?php echo e($i); ?></a>
        </li>
        <?php endfor; ?>
        
        
        <li><a title="Next" href="<?php echo e($logs->nextPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="<?php echo e($logs->url($logs->lastPage())); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing <?php echo e($logs->firstItem()); ?> - <?php echo e($logs->lastItem()); ?> of <?php echo e($logs->total()); ?></span>
    </div>
</div>