{{-- 상속 --}}
@extends('inc.layout') {{-- '/'아니고 '.'으로 --}}

{{-- section : 부모템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')

{{-- @section ~ @endsection : 처리해야 될 코드가 많을 경우  --}}
@section('main')
    <h2>자식1</h2>
    <p>여러 데이터 개능</p>

    {{-- 조건문 --}}
    @if ($gender === '0')
        <span>성별 : 남자</span>
    @elseif($gender === '1')
        <span>성별 : 여자</span>
    @else
        <span>성별 : 기타</span>
    @endif

    <hr>{{-- ------------------------------------------------ --}}

    {{-- 반복문 --}}
    @for ($i = 0; $i < 5; $i++)
        <span>{{ $i + 1 }}</span>
    @endfor

    <hr>

    <h3>foreach문</h3>
    @foreach ($data as $key => $val)
        <p>카운트 : {{ $loop->count }}</p> {{-- 라라벨에서 지정한 변수 : loop, count, iteration, ... --}}
        <p>{{ $loop->iteration }}번 째</p>
        <span>=> {{ $key }} : {{ $val }}</span>
        <br>
    @endforeach

    <hr>

    @forelse ($data2 as $key => $val)
        {{-- foreach와 동일(+비어있을 때 분기) --}}
        <span>{{ $key }} : {{ $val }}</span>
        <br>
    @empty
        <span>빈배열임</span>
    @endforelse

@endsection

{{-- 부모 show 테스트용 --}}
@section('show')
    <h2>정실</h2>
    <p>정실 자식1</p>
    <h3>{{ $test }}</h3>
@endsection
