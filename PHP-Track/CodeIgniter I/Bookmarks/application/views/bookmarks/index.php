<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bookmarks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <main>
        <p>Add a Bookmark</p>

<?php
    if(!empty($errors)){
?>
        <?= $errors ?>
<?php
    }
?>
        
        <form action="/bookmarks/add" method="post" enctype="multipart/form-data" class="bookmark_form">
            <label for="name">Name / Title</label>
            <input type="text" name="name" id="name" placeholder="Enter URL name here" value="<?= !empty($name) ? $name : ""; ?>">

            <label for="url">URL</label>
            <input type="text" name="url" id="url" placeholder="Enter your last name" value="<?= !empty($name) ? $name : ""; ?>">

            <label for="folder">Folder</label>
            <select name="folder" id="folder">
                <option value="Favorites">Favorites</option>
                <option value="Top">Top</option>
                <option value="Others">Others</option>
            </select>

            <input type="submit" value="Add Bookmark">
        </form>
    </main>
</body>
</html>