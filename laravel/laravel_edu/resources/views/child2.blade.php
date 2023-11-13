{{-- 상속 --}}
@extends('inc.layout') {{-- '/'아니고 '.'으로 --}}

{{-- section : 부모템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')

@section('main')
    {{-- 반복문 --}}
    @for ($i = 1; $i <= 9; $i++)
        <span>{{ $i }} 단</span>
        <br>
        @for ($j = 1; $j <= 9; $j++)
            <span>{{ $i }} x {{ $j }} = {{ $i * $j }}</span>
            <br>
        @endfor
    @endfor

@endsection
