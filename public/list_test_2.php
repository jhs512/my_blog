<?php
$cateItemId = $_GET['cateItemId'];

$dbHost = "site10.blog.oa.gg"; // 컴퓨터 까지 접근 가능
$dbPort = 3306; // 컴퓨터 안에 있는 MySQL에게 까지 접근가능
$dbId = 'site10';
$dbPw = 'sbs123414'; //' MySQL안으로 통과까지 가능
$dbName = 'site10'; // 알맞은 DB까지 접근가능

$dbConn = mysqli_connect($dbHost, $dbId, $dbPw, $dbName, $dbPort) or die("DB CONNECTION ERROR");

$sql = "
SELECT `name`
FROM cateItem
WHERE id = '{$cateItemId}'
";
$rs = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($rs);
$cateItemName = $row['name'];

$sql = "
SELECT *
FROM article
WHERE cateItemId = '{$cateItemId}'
ORDER BY id DESC
";
$rs = mysqli_query($dbConn, $sql);
$rows = [];

while ( true ) {
    $row = mysqli_fetch_assoc($rs);
    if ( $row == null ) {
        break;
    }
    $rows[] = $row;
}

include '../part/head.php';
?>

<h1 class="con"><?=$cateItemName?></h1>

<div class="con">
    <ul>
        <?php foreach ( $rows as $row ) { ?>
        <li>
            <a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a>
            <br>
            <a href="detail.php?id=<?=$row['id']?>"><img src="<?=$row['thumbImgUrl']?>" alt=""></a>
        </li>
        <?php } ?>
    </ul>
</div>

<?php
include '../part/foot.php';
?>