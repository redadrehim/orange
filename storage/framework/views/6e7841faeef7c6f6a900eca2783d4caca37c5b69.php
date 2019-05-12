<table class="table table-striped- table-bordered table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Mobile</th>
            <th>User Email</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $order->id; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $order->user->name; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $order->user->mobile; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $order->user->email; ?></td>
        <td data-field="OrderID" class="kt-datatable__cell"><?php echo $order->total; ?></td>
        <td data-field="Status" class="kt-datatable__cell"><?php if($order->status==0): ?> New <?php elseif($order->status==1): ?> Pending <?php elseif($order->status==2): ?> Shipping <?php elseif($order->status==3): ?> Delivered <?php endif; ?></td>

        
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="<?php echo route('orders.edit', [$order->id]); ?>" ><i class="la la-edit"></i></a>
            <a href="<?php echo route('orders.destroy', [$order->id]); ?>" ><i class="la la-trash"></i></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="<?php echo e($orders->url(1)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="<?php echo e($orders->previousPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        <?php for($i =1; $i <= $orders->lastPage(); $i++): ?>
         <li style=""></li>
        <li>
            <a href="<?php echo e($orders->url($i)); ?>" class="kt-datatable__pager-link kt-datatable__pager-link-number <?php if($i==$orders->currentPage()): ?> kt-datatable__pager-link--active <?php endif; ?> " data-page="1" title="1"><?php echo e($i); ?></a>
        </li>
        <?php endfor; ?>
        
        
        <li><a title="Next" href="<?php echo e($orders->nextPageUrl()); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="<?php echo e($orders->url($orders->lastPage())); ?>" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing <?php echo e($orders->firstItem()); ?> - <?php echo e($orders->lastItem()); ?> of <?php echo e($orders->total()); ?></span>
    </div>
</div>