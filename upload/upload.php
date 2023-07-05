<?php
function generateRandomString($length = 9) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
if(isset($_POST['name']) && isset($_FILES['audio'])){
    require '../vendor/autoload.php';
    $conn = new MongoDB\Client("mongodb://localhost:27017");
    $table = $conn->musicplayer->music;
    $name = $_POST['name'];
    $author = $_POST['author'];
    $audio = $_FILES['audio'];
    $ext = pathinfo($audio['name'], PATHINFO_EXTENSION);
    $rand = generateRandomString();
    while($table->findOne(['id' => $rand]) !== null){
        $rand = generateRandomString();
    }
    file_put_contents("../music/$rand.$ext", file_get_contents($audio["tmp_name"]));
    $doc = array(
        'name' => $name,
        'author' => $author,
        "id" => $rand,
        'audio' => "$rand.$ext"
    );
    if($table->insertOne($doc)){
        echo '1';
    } else {
        echo '0';
    }
}
?>