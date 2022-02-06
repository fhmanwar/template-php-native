<?php

include 'config/Database.php';
include 'config/Library.php';
include 'algorithm/BoyerMoore.php';

use Config\Library;
use Algorithm\Search as BM;

$db = new Database();
$conn = $db->connect();

if (isset($_POST['method'])) {

    if ($_POST['method'] == 'get') {
        $str = mysqli_real_escape_string($conn, $_POST['ask']);
        $pattern = strtolower($str);
        $data = [];
        $res = [];
        $query = "SELECT * FROM about";
        // $query = "SELECT * FROM about WHERE ask LIKE '%$str%'";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            if ($result->num_rows == 1) {
                $data =  mysqli_fetch_assoc($result);
            } else {
                $data =  mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }else {
            $dataRes = Library::jsonRes(false, 'Data Doesn\'t exist');
        }
        
        foreach ($data as $item) {
            $text = $item['ask'];
            $askText = strtolower($text);
            $cek = BM::BoyerMoore($askText, $pattern);
            if ($cek != -1) {
                $res[] = ['res' => $item['respon']];
            } else {
                continue;                
            }
        }
        if ($res != null) {
            $dataRes = Library::jsonRes(false, 'Data exist', $res);
        } else {
            $dataRes = Library::jsonRes(false, 'Data Doesn\'t exist', ['res' => 'Aku tidak paham maksud Anda, bisa diulangi?']);
        }
        echo $dataRes;
    }
}
