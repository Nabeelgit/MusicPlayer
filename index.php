<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music player</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h1>Music player</h1>
        <div class="links" style="margin-bottom: 2rem">
            <a href="./upload/">Upload Music</a>
            <a href="#">Source</a>
        </div>
        <form action="./search/" method="get"> 
            <input placeholder="Search for music..." name="q" autocomplete="off" style="width: 20rem">
            <button type="submit">Search</button>
        </form>
        <div class="latest">
            <h2 style="text-align: center">Latest uploads</h2>
            <?php
            require './vendor/autoload.php';
            $conn = new MongoDB\Client('mongodb://localhost:27017');
            $table = $conn->musicplayer->music;
            $match = $table->find([], ['sort' => ['_id' => -1]]);
            foreach($match as $music){
                ?>
                <div class="music">
                    <span><?php echo $music['name']?> - <?php echo $music['author']?></span>
                    <audio controls>
                        <source src="./music/<?php echo $music['audio']?>">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>