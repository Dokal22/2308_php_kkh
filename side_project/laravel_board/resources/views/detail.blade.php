@extends('layout.layout')

@section('title','Detail')

@section('main')
<main>
	{{-- result : {{$result}} --}}
	<div class="mb-3">
		<p>글번호</p>
		<p>{{$result->b_id}}</p>
	</div>
	<div class="mb-3">
		<p>제목</p>
		<p>{{$result->b_title}}</p>
	</div>
	<div class="mb-3">
		<p>내용</p>
		<p>{{$result->b_content}}</p>
	</div>
	<div class="mb-3">
		<p>조회수</p>
		<p>{{$result->b_hits}}</p>
	</div>
	<div class="mb-3">
		<p>작성일</p>
		<p>{{$result->created_at}}</p>
	</div>
	<div class="mb-3">
		<p>수정일</p>
		<p>{{$result->updated_at}}</p>
	</div>	
</main>
<form action="{{route('board.destroy',['board'=>$result->b_id])}}" method="POST">
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-danger">삭제</button>
	<a class="btn btn-primary" href="{{route('board.edit',['board'=>$result->b_id])}}">수정</a><!--class="btn-primary" => "btn-dark"-->
	<a class="btn btn-secondary float-end" href="{{route('board.index')}}">취소</a><!--class="btn-primary" => "btn-dark"-->
</form>
@endsection