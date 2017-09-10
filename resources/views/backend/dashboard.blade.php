@extends('backend.layouts.main')

@push("title","Dashboard")
@push('content')
Seven CMS {{ env("HEROKU_RELEASE_VERSION","vLocal") }}
@endpush