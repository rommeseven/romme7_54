@extends('backend.layouts.main')

@push('title')
Edit Role#{{ $role->id }}
@endpush

@push('bread')
<li><a href="{{ url('/manage') }}">Management</a></li>
@endpush


@push('bread')
<li><a href="{{ url('/manage/roles') }}">Roles</a></li>
@endpush

@push('bread')
<li>Editing</li>
@endpush


@push('content')
<div id="app"><div class="row">
        <div class="column">
            <p>
                <h3>
                    Editing {{ $role->display_name }} Role
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    <div class="row align-spaced">
        <div class="column small-12 medium-8 large-7">
            <div class="callout">
                <div class="row align-left align-middle">
                    <div class="column small-12 medium-2 large-1" style="text-align:center">
                        <i class="fa icon fa-info-circle fa-3x">
                        </i>
                    </div>
                    <!-- END OF .column small-12 medium-4 large-3 -->
                    <div class="column small-12 medium-10" style="text-align:center; padding-top: 15px;">
                        <p>
                            Leave the fields you don't want to change blank
                        </p>
                    </div>
                    <!-- END OF .column small-12 medium-8 large-9 -->
                </div>
                <!-- END OF .row -->
            </div>
            <!-- END OF .callout -->
        </div>
        <!-- END OF .column shrink -->
    </div>
    <!-- END OF .row -->
    <!-- END OF .row -->
    <form action="{{ url('manage/roles/' . $role->id) }}" method="POST">
        {{csrf_field()}}
        {{method_field("PATCH")}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="name">
                    Display Name:
                    <input name="display_name" placeholder="{{$role->display_name}}" v-model="display_name" type="text"/>
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
                    <input name="description" placeholder="{{$role->description}}" v-model="description"  type="text"/>
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
               
        </div><!-- END OF .row -->
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
    <!-- END OF .callout --></div><!-- END OF #app -->
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            {{--
            <input class="button" type="submit" value="Add User"/>
            --}}
    <div class="row align-center" v-if="!changed()">
        <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
            <button class="button expanded fabu before fa-save" type="submit">
                Save Changes
            </button>
        </div>
        <!-- END OF .column small-10 medium-5 -->
    </div>

    <div class="row align-center" v-if="changed()">
        <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
            <button class="button expanded secondary fabu before fa-save" disabled="" type="submit">
               No Changes
            </button>
        </div>
        <!-- END OF .column small-10 medium-5 -->
    </div>
            <!-- END OF .row align-center -->
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <input type="hidden" name="permissions" :value="permissions" />
    </form>
    <!-- END OF .row -->
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    <!-- END OF .row --></div><!-- END OF #app -->
@endpush

@push('extrajs')
<script>
// Warn if overriding existing method
if(Array.prototype.equals)
    console.warn("Overriding existing Array.prototype.equals. Possible causes: New API defines the method, there's a framework conflict or you've got double inclusions in your code.");
// attach the .equals method to Array's prototype to call it on any array
Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time 
    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;       
        }           
        else if (this[i] != array[i]) { 
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;   
        }           
    }       
    return true;
}
// Hide method from for-in loops
Object.defineProperty(Array.prototype, "equals", {enumerable: false});


    var app = new Vue({
        el:'#app',
        data:{
            permissions:{!! $role->permissions->pluck('id') !!},
            originalPermissions:{!! $role->permissions->pluck('id') !!},
            description:'',
            display_name:''
        },
        methods:{
            changed()
            {
                return ((this.permissions.sort().equals(this.originalPermissions.sort())) && this.description == '' && this.display_name == '');
            }
        }

    });
</script>
@endpush
