<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <main id="result_form_container">
        <h1>Submitted Entry</h1>
        <div>Your Name (optional): </div>
        <p><?= $this->input->post('name' , TRUE) ?></p>
        <div>Course Title:</div>
        <p><?= $this->input->post('course' , TRUE) ?></p>
        <div>Given Score (1-10):</div>
        <p><?= $this->input->post('score' , TRUE) ?></p>
        <div>Reason:</div>
        <p><?= $this->input->post('reason' , TRUE) ?></p>
        <a href="/">Return</a>
    </main>
</body>
</html>