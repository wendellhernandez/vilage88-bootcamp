<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Dashboard</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/validations.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/dashboard/admin">Dashboard</a></li>
                    <li><a href="/users/profile">Profile</a></li>
                    <li><a href="/users/logout" class="logout_button">Logout</a></li>
                </ul>
                <div>
                    <a href="/dashboard/admin"><img src="/assets/images/logo/logo.png"></a>
                    <form action="#" method="get">
                        <input type="text" name="search" placeholder="Search for products, brands and shops">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i><span>2</span></a>
                </div>
            </nav>
        </header>