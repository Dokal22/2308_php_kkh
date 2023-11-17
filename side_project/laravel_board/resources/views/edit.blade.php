@extends('layout.layout')

@section('title', 'Edit')

@section('main')
    <main class="d-flex justify-content-center align-items-center h-75"><!--display: flex => d-flex -->
        <form action="{{ route('board.update', ['board' => $data->b_id]) }}" method="POST" style="width: 300px">
            <!--'폼'/'개요'에서 첫번째-->
            {{-- route()로 name한 걸 부른다. --}}
            @include('layout.errorlayout')
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="b_title" class="form-label">제목</label>
                <input type="text" class="form-control" name="b_title" id="b_title" value="{{ $data->b_title }}">
            </div>
            <div class="mb-3">
                <label for="b_content" class="form-label">내용</label>
                <input type="text" class="form-control" name="b_content" id="b_content" value="{{ $data->b_content }}">
                <!--type="email" => "text" | input태그 속성에서 aria-describedby="emailHelp" 삭제-->
            </div>
            <button type="submit" class="btn btn-dark float-end">작성</button><!--class="btn-primary" => "btn-dark"-->
            <a class="btn btn-secondary"
                href="{{ route('board.show', ['board' => $data->b_id]) }}">취소</a><!--class="btn-primary" => "btn-dark"-->
        </form>
    </main>
@endsection
