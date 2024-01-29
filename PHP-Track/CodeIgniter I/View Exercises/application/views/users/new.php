<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Users</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <form action="/users/create" method="post">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name"> 
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email"> 
            <input type="submit" value="Add User" name="add_user">
        </form>
    </body>
</html>