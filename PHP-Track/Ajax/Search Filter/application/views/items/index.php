<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Filter</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/app.js"></script>
    </head>
    <body>
        <?= form_open("/items/filter") ?>
            <input type="text" name="name" placeholder="search by name">
            <input type="text" name="min" placeholder="$min">
            <input type="text" name="max" placeholder="$max">
            <select name="order">
                <option value="ASC">Low to High Price</option>
                <option value="DESC">High to Low Price</option>
            </select>
            <input type="submit">
        <?= form_close() ?>

        <div class="table_container"></div>
    </body>
</html>