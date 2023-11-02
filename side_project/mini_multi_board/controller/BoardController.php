<?php

namespace controller;

class BoardController extends ParentsController {
    // 게시판 리스트 페이지 이동
    protected function listGet() {
        return "view/list.php";
    }
}