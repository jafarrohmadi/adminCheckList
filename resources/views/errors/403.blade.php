@extends('layouts.admin.app')
@section('css')
    <style type="text/css">
        .new-errorpage {
            display: block;
            position: relative;
            width: 100%;
            max-width: 500px;
            padding: 20px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .new-errorpage .block {
            display: block;
            position: relative;
            margin-bottom: 20px;
            text-align: center;
        }

        .new-errorpage .block:last-child {
            margin-bottom: 0;
        }

        .new-errorpage img {
            display: block;
            position: relative;
            width: 100%;
        }

        .new-errorpage h1 {
            color: #000;
        }

        .new-errorpage p {
            font-size: 14px;
            line-height: 28px;
        }

        .new-errorpage a {
            display: inline-block;
            position: relative;
            background-color: #fff;
            color: #000;
            border: 1px solid #777;
            line-height: 40px;
            padding: 0 20px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s;
        }

        .new-errorpage a:hover {
            color: #222;
            border: 1px solid #ccc;
        }
    </style>
@endsection
@section('content')
<div class="new-errorpage">
    <div class="block">
        <img src="{{asset('images/error-403.png')}}">
    </div>
    <div class="block">
        <a href="#">Kembali ke Home</a>
    </div>
</div>
@endsection
