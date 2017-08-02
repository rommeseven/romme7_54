@extends('backend.layouts.main')

@push('title')
All Permissions
@endpush

@push('bread')
<li><a href="{{ url('/cmseven') }}">Management</a></li>
@endpush


@push('bread')
<li>Permissions</li>
@endpush


@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            {{ $searched or 'All Available Permissions:' }}
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">

        <a class="button responsive_button fabu fa-search secondary before" data-toggle="search_panel" href="#find">
            Find
            @if(isset($searched))
 Another 
@endif
Permission
        </a>

        @if(isset($searched))
        <a class="button responsive_button fabu fa-list-alt primary before" data-toggle="search_panel" href="{{ url('/cmseven/permissions') }}">
            All Permissions
        </a>
        @else
        <a class="button responsive_button fabu fa-plus cover" href="{{ url('cmseven/permissions/create') }}">
            Add New Permission
        </a>
        @endif        
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
<div class="row align-center hiddenPanel" data-animate="hinge-in-from-top hinge-out-from-top" data-toggler="" id="search_panel">
    <div class="column small-12 medium-9 large-7 columns">
        <form action="{{ url('/cmseven/permissions/find') }}" method="POST">
            {{csrf_field()}}
            <label for="search">
                Find Permission:
                <div class="input-group">
                    <input id="search" name="search" placeholder="Name of Permission" type="text"/>
                    <div class="input-group-button">
                        <button class="button button-icon">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
@if ($errors->has('search'))
<small class="errortext">
    {{ $errors->first('search') }}
</small>
@endif
            </label>
        </form>
    </div>
</div>
<!-- END OF .column small-12 medium-9 large-7 columns -->
<!-- END OF .row align-center -->
<div class="row align-center hide-for-large">
    <div class="column shrink">
        {!! $permissions->render() !!}
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->
<div class="row">
    <div class="columns">
        <table class="stack hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Display Name
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Created
                    </th>
                    <th>
                        Updated
                    </th>
                    <th>
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions->unique() as $permission)
                <tr>
                    <td>
                        <span class="hide-for-large">
                            Permission#
                        </span>
                        {{$permission->id }}
                    </td>
                    <td>
                        {{$permission->display_name }}
                    </td>
                    <td>
                        {{$permission->name }}
                    </td>
                    <td>
                        <span class="hide-for-large">
                            Created:
                        </span>
                        {{$permission->created_at }}
                    </td>
                    <td>
                        <span class="hide-for-large">
                            Updated:
                        </span>
                        {{$permission->updated_at }}
                    </td>
                    <td>
                        <a class="button button-icon" href="{{ url('cmseven/permissions/' . $permission->id .  '/edit') }}" title="Edit Permission">
                            <i class="fa fa-pencil">
                            </i>
                        </a>
                                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <!-- END OF .stack hover -->
        <div class="row align-center">
            <div class="column shrink">
                {!! $permissions->render() !!}
            </div>
            <!-- END OF .column shrink -->
        </div>
        <!-- END OF .row align-center -->
    </div>
    <!-- END OF .columns -->
</div>
<!-- END OF .row -->
@endpush

@if(isset($searched))
@push('extrajs')
<script>
$( "table>tbody>tr>td:not(:has(*))" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});

</script>
@endpush
@endif
