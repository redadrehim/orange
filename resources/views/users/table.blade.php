<table class="table table-striped- table-bordered table-hover table-checkable" id="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    @if($user->is_admin ==0)
    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
        <td data-field="Id" class="kt-datatable__cell">{!! $user->id !!}</td>
        <td data-field="Name" class="kt-datatable__cell">{!! $user->name !!}</td>
        <td data-field="Name" class="kt-datatable__cell">{!! $user->email !!}</td>
        <td data-field="Name" class="kt-datatable__cell">{!! $user->mobile !!}</td>
        <td data-field="Status" class="kt-datatable__cell">@if($user->status) On @else Off @endif</td>

        
        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
            <a href="{!! route('users.edit', [$user->id]) !!}" ><i class="la la-edit"></i></a>
            <a href="{!! route('users.delete', [$user->id]) !!}" ><i class="la la-trash"></i></a>
        </td>
    </tr>
    @endif
    @endforeach

    </tbody>

</table>

<div class="kt-datatable__pager kt-datatable--paging-loaded">
    <ul class="kt-datatable__pager-nav">
        <li>
            <a title="First" href="{{$users->url(1)}}" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
        </li>
        <li>
            <a title="Previous" href="{{$users->previousPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i>
            </a>
        </li>
        
        @for ($i =1; $i <= $users->lastPage(); $i++)
         <li style=""></li>
        <li>
            <a href="{{$users->url($i)}}" class="kt-datatable__pager-link kt-datatable__pager-link-number @if($i==$users->currentPage()) kt-datatable__pager-link--active @endif " data-page="1" title="1">{{$i}}</a>
        </li>
        @endfor
        
        
        <li><a title="Next" href="{{$users->nextPageUrl()}}" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a></li>
        <li><a title="Last" href="{{$users->url($users->lastPage())}}" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="15"><i class="flaticon2-fast-next"></i></a>
        </li>
    </ul>
    <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">Showing {{$users->firstItem()}} - {{$users->lastItem()}} of {{$users->total()}}</span>
    </div>
</div>