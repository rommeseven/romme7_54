@extends('backend.layouts.main')

@push('title')
Create New Role
@endpush

@push('bread')
<li>
    <a href="{{ url('/cmseven') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ url('/cmseven/roles') }}">
        Roles
    </a>
</li>
@endpush

@push('bread')
<li>
    Creating
</li>
@endpush

@push('content')
<div id="app">
    <div class="row">
        <div class="column">
            <p>
                <h3>
                    Create New Role
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    <!-- END OF .row -->
    <!-- END OF .row -->
    <form action="{{ url('cmseven/roles/') }}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="name">
                    Display Name:
                    <input name="display_name" placeholder="Role Name" type="text"/>
                    @if ($errors->has('name'))
                    <small class="errortext">
                        {{ $errors->first('name') }}
                    </small>
                    @endif
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="name">
                    Slug:
                    <input name="name" placeholder="role-name" type="text"/>
                    @if ($errors->has('name'))
                    <small class="errortext">
                        {{ $errors->first('name') }}
                    </small>
                    @endif
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="description">
                    Description:
                    <input name="description" placeholder="Description of this Role" type="text" v-model="description"/>
                    @if ($errors->has('description'))
                    <small class="errortext">
                        {{ $errors->first('description') }}
                    </small>
                    @endif
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <div class="row collapse">
                <label>
                    Permissions:
                </label>
            </div>
            <!-- END OF .row -->
            <div class="callout">

                @forelse($permissions as $permission)
                <div class="checkbox primary">
                    <input class="styled" id="pcheckbox_{{$permission->id}}" name="permissions" type="checkbox" v-model="permissions" value="{{$permission->id}}">
                        <label for="pcheckbox_{{$permission->id}}">
                            {{ $permission->display_name }} ({{ $permission->description }})
                        </label>
                    </input>
                </div>
                @empty
                <p>
                    There are no Permissions created yet.
                </p>
                @endforelse
            </div>
            <!-- END OF .callout -->
        </div>
        <!-- END OF #app -->
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                {{--
                <input class="button" type="submit" value="Add User"/>
                --}}
                <div class="row align-center">
                    <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
                        <button class="button expanded fabu before fa-plus" type="submit">
                            Create Role
                        </button>
                    </div>
                    <!-- END OF .column small-10 medium-5 -->
                </div>
                <!-- END OF .row align-center -->
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <input :value="permissions" name="permissions" type="hidden"/>
    </form>
    <!-- END OF .row -->
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    <!-- END OF .row -->
</div>
<!-- END OF #app -->
@endpush

@push('extrajs')
<script>
    var app = new Vue({
        el:'#app',
        data:{
            permissions: []

        }

    });
</script>
@endpush
