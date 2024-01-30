<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookmarks</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>
        All Bookmarks + <a href="/"><i class="fa-solid fa-bookmark"></i></a>
    </header>
    <main class="entry_container">
        <p class="table_head">Folder</p>
        <p class="table_head">Name</p>
        <p class="table_head table_url">Url</p>
        <p class="table_head table_action">Action</p>

<?php
    foreach($bookmarks as $row){ ?>
        <p><?= $row['folder'] ?></p>
        <p><?= $row['name'] ?></p>
        <p class="table_url"><?= $row['url'] ?></p>
        <form action="/bookmarks/destroy/<?= $row['id'] ?>" method="post" class="table_action">
            <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
        </form>
<?php }
?>
        
    </main>
</body>
</html>