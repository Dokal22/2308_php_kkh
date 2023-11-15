@extends('layout.layout')

@section('title', 'List')

@section('main')
    <main>
        @forelse ($data as $item)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->b_title }}
                    </h5>
                    <p class="card-text">
                        {{ $item->b_content }}
                    </p>
                    <a href="{{ route('board.show', ['board' => $item->b_id]) }}" class="btn btn-primary"
                        {{-- data-bs-toggle="modal" data-bs-target="#modalDetail" --}}>
                        상세
                    </a>
                </div>
            </div>
        @empty
            게시글 없음
        @endforelse
    </main>
@endsection
