@extends('backend.layouts.main')

@push('title')
Users
@endpush


@push('content')
<div class="grid-x">
    <div class="cell">
        <h1>
            Users page
        </h1>
        <h2 class="subheader">
            You are logged in als {{ Auth::user()->name }}
        </h2>
        <br/>
        <ul>
            <li>
                <a href="{{ route('home') }} ">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('manage/users') }} ">
                    Users
                </a>
            </li>
            <li>
                <a href="{{ url('') }} ">
                    Asperiores
                </a>
            </li>
            <li>
                <a href="{{ url('') }} ">
                    Nam
                </a>
            </li>
            <li>
                <a href="{{ url('') }} ">
                    Aspernatur
                </a>
            </li>
            <li>
                <a href="{{ url('') }} ">
                    Veniam
                </a>
            </li>
        </ul>
        <br/>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <!-- END OF .cell -->
    <div class="cell">
        hi
    </div>
    <!-- END OF .cell -->
</div>
<!-- END OF .grid-x -->
@endpush

@push('extrajs')
<script>
    alert('welcome home');
</script>
@endpush
