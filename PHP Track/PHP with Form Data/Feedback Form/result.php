<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main id="result_form_container">
        <h1>Submitted Entry</h1>
        <div>Your Name (optional): </div>
        <p><?= $_POST['name'] ?></p>
        <div>Course Title:</div>
        <p><?= $_POST['course'] ?></p>
        <div>Given Score (1-10):</div>
        <p><?= $_POST['score'] ?></p>
        <div>Reason:</div>
        <p><?= $_POST['reason'] ?></p>
        <a href="index.php">Return</a>
    </main>
</body>
</html>