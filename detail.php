<?php

    //共通の関数dbConnect()
    require_once('dbc.php');

    $result = getBlog($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?php echo $result['title']?></h3>
    <p>投稿日時：<?php echo $result['post_at']?></p>
    <p>カテゴリ：<?php echo setCategoryName($result['category'])?></p>
    <hr>
    <p>本文：<?php echo $result['content']?></p>
</body>
</html>