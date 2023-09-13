<?php


include("./02_070_인크루드되는.php"); // 없으면 오류 띄우고 계속함
require("./02_070_인크루드되는.php"); // 어 이상해 멈춰


include_once("./02_070_인크루드되는.php"); // 중복 금지
include_once("./02_070_인크루드되는.php"); // 중복 금지

require_once("./02_070_인크루드되는.php"); // 중복 금지 22
require_once("./02_070_인크루드되는.php"); // 중복 금지 22


echo "토종입니다\n";