@extends('layout.layout')

@section('title','Detail')

@section('main')
	b_id : {{$result->b_id}}
	<br>
	b_title : {{$result->b_title}}
	<br>
	b_content : {{$result->b_content}}
	<br>
	b_hits : {{$result->b_hits}}
	<br>
	created_at : {{$result->created_at}}
	<br>
	updated_at : {{$result->updated_at}}
	<br>
	deleted_at : {{$result->deleted_at}}
	<br>
	result : {{$result}}
@endsection