<?php
    require_once 'blog.php';
    //ini_set('display_errors','On');
    $blog = new Blog();
    //取得したデータを表示
    $blogData = $blog->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>ブログ一覧</title>
</head>
<body>
<h2>ブログ一覧</h2>
<p><a href="/project1/form.html">新規作成</a></p>
<table>
    <tr>
        <th>No</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
    </tr>
    <?php foreach ($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo $blog->setCategoryName($column['category']) ?></td>
            <td><a href="/project1/detail.php?id=<?php echo $column['id']?>">詳細</a></td>
            <td><a href="/project1/update_form.php?id=<?php echo $column['id']?>">編集</a></td>
        </tr>
    <?php endforeach;?>
</table>
</body>
</html>