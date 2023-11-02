<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>로그인 페이지</title> <!--link와 script를 무조건 부트스트랩꺼를 가져와야 적용됨-->
</head>
<body class="vh-100 vw-100">
    <?php require_once("view/inc/header.php"); ?>
    
    <main class="d-flex justify-content-center align-items-center h-75"><!--display: flex => d-flex -->
        <form action="/board/list" style="width: 300px"> <!--'폼'/'개요'에서 첫번째-->
            <div id="errorMsg" class="form-text text-danger">에러에러에러</div><!--아이디 박스 밑에서 올라옴-->
            <div class="mb-3">
              <label for="u_id" class="form-label">아이디</label>
              <input type="text" class="form-control" id="u_id"> <!--type="email" => "text" | input태그 속성에서 aria-describedby="emailHelp" 삭제-->
            </div>
            <div class="mb-3">
              <label for="u_pw" class="form-label">비밀번호</label>
              <input type="password" class="form-control" id="u_pw">
            </div>
            <button type="submit" class="btn btn-dark">로그인</button><!--class="btn-primary" => "btn-dark"-->
          </form>
    </main>
    
    <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer> <!--크롬 f12 들어가면 클래스에 어떤 css를 줬는지 나옴-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>