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
        <?= form_open("/students/update/$table_row" , "class='student_form'") ?>
            <p class="lead_title">ID #<?= $table_row ?></p>
            <?= $last_name_error ?>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= $students->last_name ?>">
            <?= $first_name_error ?>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?= $students->first_name ?>">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id">
<?php
    foreach($courses as $course){
        $course_row++;
?>
                <option value="<?= $course_row ?>" <?= $students->course_course_name == $course->course_name ? "selected" : "" ?>><?= $course->course_name ?></option>
<?php
    }
?>
            </select>
            <label for="classification">Classification</label>
            <select name="classification" id="classification">
                <option value="regular">Regular</option>
                <option value="relearner">Relearner</option>
            </select>
            <?= $gender_error ?>
            <div>
                <p>Gender</p>
                <input type="radio" name="gender" value="Male" id="male" <?= $students->gender == "Male" ? "checked" : "" ?>>
                <label for="male" active>Male</label>
                <input type="radio" name="gender" value="Female" id="female" <?= $students->gender == "Female" ? "checked" : "" ?>>
                <label for="female">Female</label>
            </div>
            <input type="submit" value="SAVE">
        <?= form_close() ?>
        <?= form_open("/students/terminate/$delete_row" , "class='delete_form'") ?>
            <button type="submit">REMOVE</button>
        <?= form_close() ?>
    </body>
</html>