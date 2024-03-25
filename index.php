<!DOCTYPE html>
<html lang="zh">
<head>
    <title>历史上的今天</title>
    <link rel="icon" href="l.ico" type="image/x-icon">
    <link rel="shortcut icon" href="l.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 CSS 文件 -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <?php
    $year = date('Y');
    $month = date('m');
    $day = isset($_GET['day']) ? $_GET['day'] : date('d');

    // API 请求并获取响应
    $url = "http://www.wudada.online/Api/ScLsDay?month={$month}&day={$day}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data['code'] == '200') {
        echo "<h2 class='day'>今天是：{$year}年{$month}月{$day}</h2>";
        echo "<ul>";
    }
    ?>
    <div class="container">
        <?php
        // 获取年份和日期
        $year = date('Y');
        $month = date('m');
        $day = isset($_GET['day']) ? $_GET['day'] : date('d');

        // API 请求并获取响应
        $url = "http://www.wudada.online/Api/ScLsDay?month={$month}&day={$day}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['code'] == '200') {
            // echo "<h2>今天是：{$year}年{$month}月{$day}</h2>";
            echo "<ul>";

            foreach ($data['data'] as $item) {
                echo "<li class='list-item'>";
                echo "<span>编号：{$item['id']}</span>";
                echo "<p>日期：{$item['date']}</p>";
                echo "<p>标题：{$item['title']}</p>";
                echo "</li>";
            }

            echo "</ul>";
        } else {
            echo "<p style='color:red;'>请求失败</p>";
        }
        ?>
    </div>
</body>
</html>