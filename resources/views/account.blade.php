@extends('layout.common')

@section('title', 'インデックスページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="/css/chat.css" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<a>neko</a>
@endsection

@include('layout.sidemenu')