<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contact</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <main>
        <a href="/contacts" class="return_link"><i class="fa-solid fa-square-caret-left"></i> Go Back</a>
        <a href="/contacts/edit/<?= $contact["id"] ?>" class="return_link"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <p>Contact #<?= $contact["id"] ?></p>
        <div>Name: <?= $contact["name"] ?></div>
        <div>Contact Number: <?= $contact["contact_number"] ?></div>
    </main>
</body>
</html>