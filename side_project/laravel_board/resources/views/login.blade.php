@extends('layout.layout') {{-- layout폴더 속 layout파일 with blade --}}

@section('title','Login')
	
@section('main')
<main class="d-flex justify-content-center align-items-center h-75"><!--display: flex => d-flex -->
	<form action="{{route('user.login.post')}}" method="POST" style="width: 300px"> <!--'폼'/'개요'에서 첫번째-->
		      {{-- route()로 name한 걸 부른다. --}}
		@include('layout.errorlayout')
		@csrf
		<div class="mb-3">
			<label for="email" class="form-label">이메일</label>
			<input type="text" class="form-control" name="email" id="email"> <!--type="email" => "text" | input태그 속성에서 aria-describedby="emailHelp" 삭제-->
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">비밀번호</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>
		<button type="submit" class="btn btn-dark float-end">로그인</button><!--class="btn-primary" => "btn-dark"-->		
	</form>
</main>
@endsection

