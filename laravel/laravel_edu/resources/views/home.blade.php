<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
</head>
<body>
	<h1>이쪽으로 들어와</h1>
	<form action="/home" method="POST">
		@csrf
		<button type="submit">이쪽</button>
	</form>
	<form action="/home" method="POST">
		@csrf 
		@method('PUT') <!--원래 input type="hidden" name="myMethod" value="put" 주고 그거 읽는다네요-->
		<button type="submit">저쪽</button>
	</form>
	<form action="/home" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit">그쪽</button>
	</form>
</body>
</html>