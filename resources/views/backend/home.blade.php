@extends('backend.layouts.main')

@push('title')
Dashboard
@endpush


@push('content')
<h1>
    Welcome to {{ config('app.name', 'Laravel') }}
</h1>
<h2 class="subheader">
    You are logged in als {{ Auth::user()->name }}
</h2>

<br />

<ul>
	<li><a href="{{ route('home') }} ">Dashboard</a></li>
	<li><a href="{{ url('manage/users') }} ">Users</a></li>
	<li><a href="{{ url('') }} ">Asperiores</a></li>
	<li><a href="{{ url('') }} ">Nam</a></li>
	<li><a href="{{ url('') }} ">Aspernatur</a></li>
	<li><a href="{{ url('') }} ">Veniam</a></li>
</ul>

<br/>
<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    Logout
</a>
<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endpush

@push('extrajs')
<script>
    alert('welcome home');
</script>
@endpush
