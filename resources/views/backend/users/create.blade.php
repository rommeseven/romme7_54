@extends('backend.layouts.main')

@push('title')
Create New User
@endpush


@push('content')
<div class="row">
    <div class="column">
        <p>
            <h3>
                Creating A New User
            </h3>
        </p>
    </div>
    <!-- END OF .column -->
</div>
<!-- END OF .row -->
<form action="{{ url('manage/users') }}" method="POST">
    {{csrf_field()}}
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <label for="name"
                    @if ($errors->has('name'))
                class = "is-invalid-label"
                @endif
            >
                Username:
                <input name="name" placeholder="example17" type="text"/>
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
            <label for="email"
@if ($errors->has('email'))
                class = "is-invalid-label"
                @endif
            
            >
                Email:
                <input name="email" placeholder="example@mail.com" type="email"/>
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
            <label for="password"
@if ($errors->has('password'))
                class = "is-invalid-label"
                @endif
            
            >
                Password:
                <br/>
                <input id="genpw" type="checkbox" v-model="genpw">
                    <label for="genpw">
                        Generate Password
                    </label>
                    <input name="password" placeholder="Your Password" type="password" v-if="!genpw"/>
                @if ($errors->has('password'))
                <small class="errortext">
                    {{ $errors->first('password') }}
                </small>
                @endif                    
                    <input name="password_confirmation" placeholder="Confirm Your Password" type="password" v-if="!genpw"/>
                </input>
            </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <input class="button" type="submit" value="Add User"/>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <!-- END OF .row -->
</form>
@endpush

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
            genpw:true
        }
    });
</script>
@endpush
