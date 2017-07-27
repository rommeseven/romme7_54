@extends('backend.layouts.main')

@push('title')
Edit User#{{ $user->id }}
@endpush

@push('bread')
<li><a href="{{ url('/manage') }}">Management</a></li>
@endpush


@push('bread')
<li><a href="{{ url('/manage/users') }}">Users</a></li>
@endpush

@push('bread')
<li>Editing</li>
@endpush

@push('content')
<div id="app"><div class="row">
        <div class="column">
            <p>
                <h3>
                    Editing User#{{ $user->id }} ({{ $user->name }})...
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
    <form action="{{ url('manage/users/' . $user->id) }}" method="POST">
        {{csrf_field()}}
        {{method_field("PATCH")}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="name">
                    Name:
                    <input name="name" placeholder="{{$user->name}}" v-model="dname" type="text"/>
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
                    Username:
                    <input name="username" placeholder="{{$user->username}}" v-model="username" type="text"/>
                    @if ($errors->has('username'))
                    <small class="errortext">
                        {{ $errors->first('username') }}
                    </small>
                    @endif
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="email">
                    Email:
                    <input name="email" placeholder="{{$user->email}}" v-model="email" type="email"/>
                    @if ($errors->has('email'))
                    <small class="errortext">
                        {{ $errors->first('email') }}
                    </small>
                    @endif
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row" >
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="password">
                    Password:
                    <br/>
                    <div class="radio primary">
                        <input id="pw1" name="pwchoice" required="" type="radio" v-model="pwchoice" value="keep">
                            <label for="pw1">
                                Keep Current Password
                            </label>
                            <br/>
                        </input>
                    </div>
                    <!-- END OF .radio primary -->
                    <div class="radio primary">
                        <input id="pw2" name="pwchoice" type="radio" v-model="pwchoice" value="genpw">
                            <label for="pw2">
                                Generate New Password
                            </label>
                            <br/>
                        </input>
                    </div>
                    <!-- END OF .radio primary -->
                    <div class="radio primary">
                        <input id="pw3" name="pwchoice" type="radio" v-model="pwchoice" value="typepw">
                            <label for="pw3">
                                Set New Password Manually
                            </label>
                            <br/>
                            <br/>
                        </input>
                    </div>
                    <!-- END OF .radio primary -->
                    <input name="password" placeholder="Your Password" type="password" v-if="pwchoice == 'typepw'"/>
                    <input name="password_confirmation" placeholder="Confirm Your Password" type="password" v-if="pwchoice == 'typepw'"/>
                    @if ($errors->has('password'))
                    <small class="errortext">
                        {{ $errors->first('password') }}
                    </small>
                    @endif
                </label>
            </div>
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <div class="row collapse">
                    <label>
                        Roles:
                    </label>
                </div>
                <!-- END OF .row -->
                <div class="callout">
                    @forelse($roles as $role)
                    <div class="checkbox success">
                        <input class="styled" id="pcheckbox_{{$role->id}}" name="roles" type="checkbox" v-model="roles" value="{{$role->id}}">
                            <label for="pcheckbox_{{$role->id}}">
                                {{ $role->display_name }} ({{ $role->description }})
                            </label>
                        </input>
                    </div>
                    @empty
                    <p>There are no Roles created yet.</p>
                    @endforelse
                </div>
                <!-- END OF .callout -->
            </div>
            <!-- END OF #app -->
        </div>
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
                        <button class="button expanded secondary" disabled="" type="submit">
                            No Changes
                        </button>
                    </div>
                    <!-- END OF .column small-10 medium-5 -->
                </div>
                <!-- END OF .row align-center -->
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <input type="hidden" name="roles" :value="roles" />
    </form>
    <!-- END OF .row -->
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    <!-- END OF .row --></div><!-- END OF #app -->@endpush
@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
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
            roles:{!! $user->roles->pluck('id') !!},
            originalroles:{!! $user->roles->pluck('id') !!},
            username:'',
            dname:'',
            email:'',
             pwchoice:'keep'
        },
        methods:{
            changed()
            {
                let rolechanged = (!this.roles || !this.originalroles);
                if(rolechanged) rolechanged = (this.roles.sort().equals(this.originalroles.sort()));
                return (rolechanged && this.email == '' && this.username == '' &&this.dname == '' && this.pwchoice=='keep');
            }
        }

    });
</script>
@endpush
