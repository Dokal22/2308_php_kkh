<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- 
		@yield : 자식 템플릿에서 해당하는 section에게 자리를 양도
					자식에게 section이 없을 경우는 두번째 파라미터를 사용
	 --}}
    <title>@yield('title', '부모타이틀')</title>
</head>

<body>
    {{-- 다른 템플릿을 포함시키는 방법 --}}
    @include('inc.header') {{-- view 절대경로 --}}

    @yield('main')

    {{-- @section ~ @show : 부르는게 안올때 띄울거 --}}
    @section('show')
        <p>임시 데이터</p>
    @show

    {{-- 다른 템플릿을 포함시킬 때 변수 세팅하는 방법 --}}
    @include('inc.footer', ['key1' => 'key1 부모에서 세팅'])
</body>

</html>
