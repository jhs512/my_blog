<?php
$dbConn = mysqli_connect("site20.blog.oa.gg", "site20", "sbs123414", "site20", 3306) or die("DB CONNECTION ERROR");

$cateItemId = $_GET['cateItemId'];

$sql = "
SELECT *
FROM cateItem
WHERE id = {$cateItemId}
";
$rs = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($rs);
$cateItemName = $row['name'];

$sql = "
SELECT *
FROM article
WHERE cateItemId = {$cateItemId}
ORDER BY ID DESC
";
$rs = mysqli_query($dbConn, $sql);
$articleRows = [];
while ( true ) {
    $row = mysqli_fetch_assoc($rs);

    if ( $row == null ) {
        break;
    }

    $articleRows[] = $row;
}
?>
<h1>카테고리 : <?=$cateItemName?></h1>
<?php foreach ( $articleRows as $article ) { ?>
<div>
    <a href="./detail.php?id=<?=$article['id']?>">번호 : <?=$article['id']?>, 제목 : <?=$article['title']?>, 작성날짜 : <?=$article['regDate']?></a>
</div>
<?php } ?>