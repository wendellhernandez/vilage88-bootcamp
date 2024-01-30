<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bookmark</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>Are you sure you want to delete?</header>
    <main class="destroy_container">
        <p><?= $bookmark["folder"] ?>/<?= $bookmark["name"] ?> (<a href="<?= $bookmark["url"] ?>"><?= $bookmark["url"] ?></a>)</p>
        <div class="choice">
            <a href="/bookmarks/show">No</a>
            <form action="/bookmarks/delete_bookmarks/<?= $bookmark["id"] ?>/">
                <input type="submit" value="Yes, I want to delete">
            </form>
        </div>
    </main>
</body>
</html>