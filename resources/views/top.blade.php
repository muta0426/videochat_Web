@extends('layout.common')

@section('title', 'インデックスページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="/css/first.css" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<div class = "first_contents">
    <img class="first_image" src="{{ asset('img/22480543.png') }}" alt="">
    <p>仲間とチャットを始めましょう</p>
    <p>仲間が以内場合はスマートフォンからワークスペースの作製</p>
    <p>若しくは、メンバーを追加してください</p>
</div>
@endsection

@include('layout.sidemenu')