@extends('backend.layouts.main')

@push('title')
Edit User#{{ $user->id }}
@endpush


@push('content')
<div class="row">
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
                Username:
                <input name="name" placeholder="{{$user->name}}" type="text"/>
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
            <label for="email">
                Email:
                <input name="email" placeholder="{{$user->email}}" type="email"/>
                @if ($errors->has('email'))
                <small class="errortext">
                    {{ $errors->first('email') }}
                </small>
                @endif
            </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row" id="app">
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
</form>
<div class="row">
    <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
        {{--
        <input class="button" type="submit" value="Add User"/>
        --}}
        <div class="row align-center">
            <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
                <button class="button expanded fabu before fa-save" type="submit">
                    Save Changes
                </button>
            </div>
            <!-- END OF .column small-10 medium-5 -->
        </div>
        <!-- END OF .row align-center -->
    </div>
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>
<!-- END OF .row -->
<!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
<!-- END OF .row -->
@endpush
{{-- TODO: better checkbox and radio 
--}}
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
    let app = new Vue({
        el:'#app',
        data:{
            pwchoice:'keep'
        }
    });
</script>
@endpush