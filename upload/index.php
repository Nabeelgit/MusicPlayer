<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Music</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Upload Music</h1>
        <div class="links" style="margin-bottom: 2rem">
            <a href="../">Home</a>
            <a href="#">Source</a>
        </div>
        <form style="display: flex; flex-direction: column">
            <label for="name">Name: </label>
            <input name="name" class="mb-2" style="width: 20rem" type="text" id="song_name">
            <label for="author">Author:</label>
            <input name="author" type="text" class="mb-2" id="song_author">
            <label style="margin-bottom: 10px">Music: </label>
            <input type="file" id="song_file" accept="audio/*">
        </form>
    </div>        
</body>
</html>