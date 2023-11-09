<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $this->titleBoardName ?></title> <!--link와 script를 무조건 부트스트랩꺼를 가져와야 적용됨-->
</head>
<body>
    <?php require_once("view/inc/header.php"); ?>

    <div class="text-center mt-5 mb-5">
        <h1><?php echo $this->titleBoardName ?></h1>
        <svg 
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
        </svg>
    </div>

    <!-- <div id="modal" class="displayNone">
      <div id="modalW"></div>
      <button id="btnModalClose">닫기</button>
    </div> id="btnDetail"-->

    <main>
        <?php foreach($this->arrBoardInfo as $item) { ?>
          <div class="card" id="card<?php echo $item["id"]; ?>">
            <img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없음">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item["b_title"]; ?></h5>
              <p class="card-text" ><?php echo mb_strlen($item["b_content"]) > 20 ? mb_substr($item["b_content"], 0, 10)."..." : $item["b_content"]; ?></p> <!--어차피 width 달라지는데 css가 맞지 않나-->
              <!-- <button 
                class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#modalDetail"
                >상세
              </button> -->
              <button 
                class="btn btn-primary" 
                onclick="openDetail(<?php echo $item['id']; ?>); return false;" 
                >상세
              </button>
            </div>
          </div>
        <?php } ?>
        
    </main>

    <!-- detail Modal -->
    <div class="modal fade"  id="modalDetail" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="b_title"></h5>
            <button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="b_date" style="font-size: 0.7rem; text-align: right;"></p>
            <p id="b_content"></p>            
            <br><br>
            <img id="b_img" src="" class="card-img-top" alt="">
          </div>
          <div class="modal-footer">
            <!-- <span id="del_id" class="d-none"></span> 또는-->
            <input type="hidden" id="del_id" value="">
            <button type="button" id="btn_del" onclick="deleteCard(); return false;" class="btn btn-danger me-auto" data-bs-dismiss="modal">삭제</button>
            <!-- <a href="" id="btn-delete" class="btn btn-danger" data-bs-dismiss="modal">삭제</a> -->
            <a href="" id="btn-update" class="btn btn-primary" data-bs-dismiss="modal">수정</a>
            <button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>

    <!-- insert Modal -->
    <div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="/board/add" method="post" enctype="multipart/form-data">
            <input type="text" name="b_type" value="<?php echo $this->boardType ?>" hidden>
            <div class="modal-header">
              <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요">
            </div>
            <div class="modal-body">
              <textarea name="b_content" class="form-control" cols="30" rows="10" placeholder="내용을 입력하세요"></textarea>
              <br><br>
              <input type="file" name="b_img" accept="image/*">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button> <!--submit 변경-->
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer> <!--크롬 f12 들어가면 클래스에 어떤 css를 줬는지 나옴-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/view/js/common.js"></script>
</body>
</html>