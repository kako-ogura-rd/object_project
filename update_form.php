<?php

    require_once('blog.php');
    $blog = new Blog();
    $result = $blog->getById($_GET['id']);

    $title = $result['title'];
    $content = $result['content'];
    $category = $result['category'];
    $publish_status = $result['publish_status'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>ブログ更新フォーム</title>
</head>
<body>
<h2>ブログ更新フォーム</h2>
<form action="blog_create.php" method="POST">
    <p>ブログタイトル</p>
    <input type="text" name="title">
    <p>ブログ本文</p>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <br>
    <p>投稿日：</p>
    <input type="date" name="post_at">
    <br>
    <p>カテゴリ</p>
    <select name="category">
        <option value="1">日常</option>
        <option value="2">プログラミング</option>
    </select>
    <br>
    <input type="radio" name="publish_status" value="1" checked>公開
    <input type="radio" name="publish_status" value="2">非公開
    <br>
    <input type="submit" value="送信">
</form>
</body>
</html>
