@extends('backend.layouts.main')

@push('title')
Details on Role {{ $role->name }}
@endpush


@push('content')
<div class="row align-justify">
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">
        <a class="button responsive_button fabu fa-pencil before" href="{{ url('manage/roles/'. $role->id .'/edit' ) }}">
            Edit This Role
        </a>
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<div class="row align-justify">
    <div class="column small-12 large-expand">
        <div class="row collapse align-left align-middle">
            <div class="columns shrink">
                <h4>
                    Role:
                    <strong>
                        {{ $role->display_name }}
                    </strong>
                </h4>
            </div>
            <!-- END OF .columns -->
            <div class="columns shrink ">
                <small>
                   ({{$role->name}})
                </small>
            </div>
            <!-- END OF .columns -->
            <div class="columns small-12">
                <p>
                    {{ $role->description }}
                </p>
            </div>
            <!-- END OF .columns small-12 -->
        </div>
        <!-- END OF .row collapse -->
    </div>
    <!-- END OF .column small-12 large-expand -->
    <div class="column small-12 large-expand">
        <br/>
        <div class="callout">
            <div class="row align-justify">
                <div class="column shrink">
                    <h5>
                        Permissions
                    </h5>
                </div><!-- END OF .column shrink -->
    <div class="column shrink" style="text-align:right">
        <a class="button small secondary responsive_button fabu fa-pencil before" href="{{ url('manage/roles/'. $role->id .'/edit' ) }}">
            Edit Permissions
        </a>
    </div>                
            </div><!-- END OF .row -->
            @foreach($role->permissions as $permission)
                <div class="checkbox secondary">
                    <input id="pcheckbox_{{$permission->id}}" type="checkbox" checked disabled class="styled">
                        <label for="pcheckbox_{{$permission->id}}">
                            {{ $permission->display_name }} ({{ $permission->description }})
                        </label>
                </div><!-- END OF .checkbox -->             
            @endforeach
            
        </div>
        <!-- END OF .callout -->
    </div>
    <!-- END OF .column small-12 large-expand -->
</div>
<!-- END OF .row -->
@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush
