<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTTP Analyzer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/app.js"></script>
    </head>
    <body>
        <form action="/websites/get_page" method="post">
            <label for="url">URL to fetch by Ajax:</label>
            <input name="url" type="text" id="url" placeholder="Enter a url">
            <input type="submit" value="Fetch">
        </form>

        <div class="fetch_container">
            
        </div>
    </body>
</html>