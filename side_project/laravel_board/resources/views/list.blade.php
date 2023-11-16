@extends('layout.layout')

@section('title', 'List')

@section('main')
    <div class="text-center mt-5 mb-5">
        <a href="{{route('board.create')}}"><svg 
        xmlns="http://www.w3.org/2000/svg" 
        width="50" 
        height="50" 
        fill="currentColor" 
        class="bi bi-plus-circle-fill " 
        viewBox="0 0 16 16"
        data-bs-toggle="modal" 
        data-bs-target="#modalInsert"
        >
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg></a>
    </div>

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
