@extends('backend.layouts.main')

@push("title","Dashboard")
@push('content')
Seven CMS - {{setting("app_title")}} ({{env("APP_CODE","seven") }}{{ env("HEROKU_RELEASE_VERSION","vLocal") }})
@endpush