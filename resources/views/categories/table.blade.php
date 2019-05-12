<table class="table table-striped- table-bordered table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Service</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        <td data-field="Id" class="kt-datatable__cell">{!! $category->id !!}</td>
        <td data-field="Name" class="kt-datatable__cell">{!! $category->name !!}</td>
        <td data-field="Name" class="kt-datatable__cell">{!! $category->service->name !!}</td>
        <td data-field="IsStatus" class="kt-datatable__cell">@if($category->status) On @else Off @endif</td>
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="{!! route('items.import', [$category->id]) !!}" ><i class="la la-import">Import</i></a>
            <a href="{!! route('categories.edit', [$category->id]) !!}" ><i class="la la-edit"></i></a>
            <a href="{!! route('categories.delete', [$category->id]) !!}" ><i class="la la-trash"></i></a>
        </td>
    </tr>
    @endforeach

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="{{$categories->url(1)}}" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="{{$categories->previousPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        @for ($i =1; $i <= $categories->lastPage(); $i++)
         <li style=""></li>
        <li>
            <a href="{{$categories->url($i)}}" class="kt-datatable__pager-link kt-datatable__pager-link-number @if($i==$categories->currentPage()) kt-datatable__pager-link--active @endif " data-page="1" title="1">{{$i}}</a>
        </li>
        @endfor
        
        
        <li><a title="Next" href="{{$categories->nextPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="{{$categories->url($categories->lastPage())}}" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing {{$categories->firstItem()}} - {{$categories->lastItem()}} of {{$categories->total()}}</span>
    </div>
</div>