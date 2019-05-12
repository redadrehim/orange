<table class="table table-striped- table-bitemed table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        
        <td data-field="itemID" class="kt-datatable__cell">{!! $item->id !!}</td>
        <td data-field="itemID" class="kt-datatable__cell">{!! $item->title !!}</td>
        <td data-field="itemID" class="kt-datatable__cell">{!! $item->category->name !!}</td>
        <td data-field="Status" class="kt-datatable__cell">@if($item->status) On @else Off @endif</td>

        
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="{!! route('items.edit', [$item->id]) !!}" ><i class="la la-edit"></i></a>
            <a href="{!! route('items.delete', [$item->id]) !!}" ><i class="la la-trash"></i></a>
        </td>

    </tr>
    @endforeach

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="{{$items->url(1)}}" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="{{$items->previousPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        @for ($i =1; $i <= $items->lastPage(); $i++)
         <li style=""></li>
        <li>
            <a href="{{$items->url($i)}}" class="kt-datatable__pager-link kt-datatable__pager-link-number @if($i==$items->currentPage()) kt-datatable__pager-link--active @endif " data-page="1" title="1">{{$i}}</a>
        </li>
        @endfor
        
        
        <li><a title="Next" href="{{$items->nextPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="{{$items->url($items->lastPage())}}" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing {{$items->firstItem()}} - {{$items->lastItem()}} of {{$items->total()}}</span>
    </div>
</div>