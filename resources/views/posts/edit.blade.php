@extends('layouts.default')

@section('title')
Edit {{ $post->title }}
@stop

@section('top')
<div class="page-header">
<h1>Edit {{ $post->title }}</h1>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-xs-6">
        <p class="lead">
            请编辑:
        </p>
    </div>
    <div class="col-xs-6">
        <div class="pull-right">
            <a class="btn btn-success" href="{!! URL::route('blog.posts.show', array('posts' => $post->id)) !!}"><i class="fa fa-file-text"></i> 查看详情</a> <a class="btn btn-danger" href="#delete_post" data-toggle="modal" data-target="#delete_post"><i class="fa fa-times"></i> 删除</a>
        </div>
    </div>
</div>
<hr>
<div class="well">
    <?php
    $form = ['url' => URL::route('blog.posts.update', ['posts' => $post->id]),
        '_method' => 'PATCH',
        'method' => 'POST',
        'button' => 'Save Post',
        'defaults' => [
            'title' => $post->title,
            'summary' => $post->summary,
            'body' => $post->body,
    ], ];
    ?>
    @include('posts.form')
</div>
@stop

@section('bottom')
@auth('blog')
    @include('posts.delete')
@endauth
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/css/bootstrap-markdown.min.css">
@stop

@section('js')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
@stop
