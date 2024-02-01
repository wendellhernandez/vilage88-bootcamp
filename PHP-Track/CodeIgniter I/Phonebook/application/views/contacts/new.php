<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <main>
        <a href="/contacts" class="return_link"><i class="fa-solid fa-square-caret-left"></i> Go Back</a>
        <p>Add New Contact</p>
<?php
    if(!empty($errors)){
?>
        <?= $errors ?>
<?php
    }
?>
        <form action="/contacts/create" method="post" enctype="multipart/form-data" class="bookmark_form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name here" value="<?= !empty($name) ? $name : ""; ?>">

            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" placeholder="09691231234" value="<?= !empty($contact_number) ? $contact_number : ""; ?>">

            <input type="submit" value="Create">
        </form>
    </main>
</body>
</html>