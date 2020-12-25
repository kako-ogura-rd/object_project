<?php

    //データベース接続
    //引数：なし
    //返り値：接続結果を返す
    function dbConnect()
    {
        $dbn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
        $user = 'blog_user';
        $pass = 'Jsb24830';

        try {
            $dbh = new PDO($dbn,$user,$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e){
            echo '接続失敗' . $e->getMessage();
            exit();
        }

        return $dbh;
    }

    //データベース取得
    //引数：なし
    //返り値：取得したデータ
    function getAllBlog()
    {
        $dbh = dbConnect();
    //    1.Sqlの準備
        $sql = 'SELECT * FROM blog';
    //    2,Sqlの実行
        $stmt = $dbh->query($sql);
    //    3,Sqlの結果を受け取る
        $result = $stmt->fetchAll(Pdo::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }

    //取得したデータを表示
        $blogData = getAllBlog();

    //カテゴリー名を表示
    //引数：数字
    //返り値：カテゴリの文字列
    function setCategoryName($category)
    {
        if ($category === '1')
        {
            return'ブログ';
        }
        elseif ($category === '2')
        {
            return '日常';
        }
        else
        {
            return 'その他';
        }
    }
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
            <td><?php echo setCategoryName($column['category']) ?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>