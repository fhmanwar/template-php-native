<?php 
include 'config/Library.php';
include 'config/Database.php';
// include 'config/App.php';

use Config\Library;
use App\DotEnv;

$hash = '$argon2id$v=19$m=65536,t=4,p=1$S1NyM2M0bDgxckJPY2o5SA$ffeGfSwmqjOqy1CnNft4WGignt1zJznI5/5G5BP/9VQ';
// $hash = password_hash('asdqwe123', PASSWORD_ARGON2ID );
// $input = 'asdqwe123';
$input = 'P@554mysql';
if (password_verify($input, $hash)) {
// if (crypt($input, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo '<hr/>';
$text = 'THIS IS A TEST TEXT';
// $pattern = 'TEST';
$pattern = 'tes';
// $text = 'dfxxiaofangdfere';
// $pattern = 'xiaofang';

// echo 'Find it , the position is '.BM::BoyerMoore($text, $pattern);

// include 'algo/BoyerMooreV2.php';
// BoyerMoore($pattern, strlen($pattern), $text, strlen($text));

echo '<hr/>';
echo Library::jsonRes(true, 'Create Success');


echo '<hr/>';
(new DotEnv(__DIR__ . '/.env'))->load();

echo getenv('APP_ENV');

echo '<hr/>';
$db = new Database();
$conn = $db->connect();
$data = [];
$query = "SELECT * FROM about";
// $query = "SELECT a.id, a.ask, a.respon, ad.id AS aboutDetailId, ad.desc FROM about a LEFT JOIN aboutDetail ad ON ad.aboutId = a.id";
$result = $conn->query($query);
if($result->num_rows > 0) {
    $data =  mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo json_encode($data);