<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'admin_laravel');
define('DB_PASSWORD', 'Pa$$w0rd');
define('DB_NAME', 'admin_laravel');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Xin lỗi, database không kết nối được.');
$conn->query("SET NAMES 'utf8mb4'"); 
$conn->query("SET CHARACTER SET utf8mb4");  
$conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'"); 

function ExecSqlFile($conn, $filename) {
  if (!file_exists($filename)) {
    return false;
  }
  $querys = explode(";", file_get_contents($filename));
//   var_dump($querys);die;
  foreach ($querys as $q) {
    $q = trim($q);
    if (strlen($q)) {
      mysqli_query($conn, $q) or print_r($q);
    }      
  }
  return true;
}

// drop all table
// $dropAllTableScriptFilePath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/db/drop_all_table.sql', PHP_URL_PATH);
$dropAllTableScriptFilePath = __DIR__ . '/db/drop_all_table.sql';
ExecSqlFile($conn, $dropAllTableScriptFilePath);

// restore
// $restoreScriptFilePath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/db/ecommerce_db.sql', PHP_URL_PATH);
$restoreScriptFilePath = __DIR__ . '/db/ecommerce_db.sql';
ExecSqlFile($conn, $restoreScriptFilePath);

?>