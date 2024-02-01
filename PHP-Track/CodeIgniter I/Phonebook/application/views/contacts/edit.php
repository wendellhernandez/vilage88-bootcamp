<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <main>
        <a href="/contacts" class="return_link"><i class="fa-solid fa-square-caret-left"></i> Go Back</a>
        <a href="/contacts/show/<?= $contact["id"] ?>" class="return_link"><i class="fa-solid fa-eye"></i> Show</a>
        <p>Edit Contact #<?= $contact["id"] ?></p>
<?php
    if(!empty($errors)){
?>
        <?= $errors ?>
<?php
    }
?>
        <form action="/contacts/update/<?= $contact["id"] ?>" method="post" enctype="multipart/form-data" class="bookmark_form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name here" value="<?= !empty($name) ? $name : $contact["name"]; ?>">

            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" placeholder="09691231234" value="<?= !empty($contact_number) ? $contact_number : $contact["contact_number"]; ?>">

            <input type="submit" value="Save">
        </form>
    </main>
</body>
</html>