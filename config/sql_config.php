<?php
// 数据库配置 - 支持环境变量覆盖
$servername = getenv('DB_HOST') ?: 'cyber_mysql';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: 'root';
$dbname = getenv('DB_NAME') ?: 'sql';

/**
 * 数据库连接函数
 * @return mysqli
 * @throws Exception 当连接失败时抛出异常
 */
global $servername, $username, $password, $dbname;

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    error_log("数据库连接失败: " . $conn->connect_error);
    throw new Exception("无法连接到数据库，请稍后再试");
}

// 设置字符集
if (!$conn->set_charset("utf8mb4")) {
    error_log("设置字符集失败: " . $conn->error);
}

/**
 * 获取数据库连接
 * @param string $host 数据库主机
 * @param string $user 数据库用户名
 * @param string $pass 数据库密码
 * @param string $db 数据库名
 * @return mysqli
 * @throws Exception 当连接失败时抛出异常
 */
function get_db_connection($host = null, $user = null, $pass = null, $db = null) {
    $host = $host ?? getenv('DB_HOST') ?: 'cyber_mysql';
    $user = $user ?? getenv('DB_USER') ?: 'root';
    $pass = $pass ?? getenv('DB_PASS') ?: 'root';
    $db = $db ?? getenv('DB_NAME') ?: 'sql';
    
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        error_log("数据库连接失败: " . $conn->connect_error);
        throw new Exception("无法连接到数据库，请稍后再试");
    }
    
    if (!$conn->set_charset("utf8mb4")) {
        error_log("设置字符集失败: " . $conn->error);
    }
    
    return $conn;
}

// 测试连接（可选）
if (getenv('DB_TEST_CONNECTION')) {
    try {
        $testConn = get_db_connection();
        $testConn->close();
    } catch (Exception $e) {
        error_log("数据库连接测试失败: " . $e->getMessage());
    }
}
?>
