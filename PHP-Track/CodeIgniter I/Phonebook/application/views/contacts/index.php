<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Contacts</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>
        Contacts + <a href="/contacts/new">add new contact <i class="fa-solid fa-address-book"></i></a>
    </header>
    <main class="contact_container">
        <p class="table_head">Name</p>
        <p class="table_head">Contact Number</p>
        <p class="table_head">Action</p>
<?php
    foreach($contacts as $contact){ ?>
        <p><?= $contact['name'] ?></p>
        <p><?= $contact['contact_number'] ?></p>
        <p>
            <a href="/contacts/show/<?= $contact['id'] ?>">show <i class="fa-solid fa-eye"></i></a>
            <a href="/contacts/edit/<?= $contact['id'] ?>">edit <i class="fa-solid fa-pen-to-square"></i></a>
            <a href="/contacts/destroy/<?= $contact['id'] ?>">remove <i class="fa-solid fa-trash"></i></a>
        </p>
<?php }
?>
    </main>
</body>
</html>