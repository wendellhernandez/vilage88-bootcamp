<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Masterlist</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/app.js"></script>
    </head>
    <body>
        <?= form_open("/students/enroll" , "class='student_form'") ?>
            <p class="lead_title">Insert New Student</p>
            <?= $last_name_error ?>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name">
            <?= $first_name_error ?>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name">
            <label for="classification">Classification</label>
            <select name="classification" id="classification">
                <option value="regular">Regular</option>
                <option value="relearner">Relearner</option>
            </select>
            <?= $gender_error ?>
            <div>
                <p>Gender</p>
                <input type="radio" name="gender" value="Male" id="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female" id="female">
                <label for="female">Female</label>
            </div>
            <input type="submit" value="ADD">
        <?= form_close() ?>

        <div class="student_list">
            <p class="lead_title">List of student</p>
            <div class="table_head">ID</div>
            <div class="table_head">Last Name</div>
            <div class="table_head">First Name</div>
            <div class="table_head">Gender</div>
            <div class="table_head">Date added</div>
            <div class="table_head">Action</div>
<?php
    foreach($students as $student){
        $table_row++;
?>
            <div><?= $table_row ?></div>
            <div><?= $student->last_name ?></div>
            <div><?= $student->first_name ?></div>
            <div><?= $student->gender ?></div>
            <div><?= $student->created_at ?></div>
            <?= form_open("/students/terminate/$delete_row") ?>
                <button type="submit"><i class="fa-solid fa-trash"></i></button>
            <?= form_close() ?>
<?php
        $delete_row++;
    }
?>
        </div>
    </body>
</html>