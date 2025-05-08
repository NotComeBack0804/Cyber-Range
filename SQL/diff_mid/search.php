<?php
session_start(); // 在输出之前调用 session_start()

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

include('../../config/sql_config.php');
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>职位查询页面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>职位查询页面</h1>
        <form action="" method="GET">
            <input type="text" name="query" placeholder="请输入搜索内容" required>
            <button type="submit">查询</button>
        </form>
    
        <?php
        if (isset($_GET['query'])) {
            $query = htmlspecialchars($_GET['query']);
            echo "<h2>搜索结果 for: <em>$query</em></h2>";
            // 查询名称
            $Name_query = "SELECT Name, Position FROM diff_mid WHERE id='$query'";
            $Position_query = "SELECT Position FROM diff_mid WHERE id='$query'";
            
            // 执行查询
            $Name_result = mysqli_query($conn, $Name_query);
            $Position_result = mysqli_query($conn, $Position_query);
            
            // 检查查询结果
            if ($Name_result && $Position_result) {
                echo "<ul class='results'>";
                
                // 输出名称结果
                while ($row = mysqli_fetch_assoc($Name_result)) {
                    echo "<li>Name: " . htmlspecialchars($row['Name']) . "</li>";
                }
                
                // 输出职位结果
                while ($row = mysqli_fetch_assoc($Position_result)) {
                    echo "<li>Position: " . htmlspecialchars($row['Position']) . "</li>";
                }
                
                echo "</ul>";
            } else {
                echo "查询失败: " . mysqli_error($conn);
            }
            
            // 关闭连接
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
