<?php
$id = $_GET['id'];

$dbHost = "site10.blog.oa.gg"; // 컴퓨터 까지 접근 가능
$dbPort = 3306; // 컴퓨터 안에 있는 MySQL에게 까지 접근가능
$dbId = 'site10';
$dbPw = 'sbs123414'; //' MySQL안으로 통과까지 가능
$dbName = 'site10'; // 알맞은 DB까지 접근가능

$dbConn = mysqli_connect($dbHost, $dbId, $dbPw, $dbName, $dbPort) or die("DB CONNECTION ERROR");

$sql = "
SELECT *
FROM article
WHERE id = {$id}
";
$rs = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($rs);

include '../part/head.php';
?>

<!-- 하이라이트 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/default.min.css">

<!-- 하이라이트 라이브러리, 언어 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/php-template.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/sql.min.js"></script>

<!-- 코드 미러 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css" />

<!-- 토스트 UI 에디터, 자바스크립트 코어 -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-viewer.min.js"></script>

<!-- 토스트 UI 에디터, 신택스 하이라이트 플러그인 추가 -->
<script src="https://uicdn.toast.com/editor-plugin-code-syntax-highlight/latest/toastui-editor-plugin-code-syntax-highlight-all.min.js"></script>

<!-- 토스트 UI 에디터, CSS 코어 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

<div class="con">
    번호 : <?=$row['id']?>
</div>
<div class="con">
    제목 : <?=$row['title']?>
</div>
<div id="origin1" style="display:none;"><?=$row['body']?></div>
<div id="viewer1" class="con"></div>

<script>
var editor1__initialValue = $('#origin1').html();
var editor1 = new toastui.Editor({
  el: document.querySelector('#viewer1'),
  height: '600px',
  initialValue: editor1__initialValue,
  viewer:true,
  plugins: [toastui.Editor.plugin.codeSyntaxHighlight]
});
</script>

<?php
include '../part/foot.php';
?>