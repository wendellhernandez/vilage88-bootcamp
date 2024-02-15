<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Leave Requests</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <header>
            <h1>Leave Request</h1>
        </header>

        <div class="leave_container">
            <div class="table_head">Employee Name</div>
            <div class="table_head">Request Date</div>
            <div class="table_head">From Date</div>
            <div class="table_head">To Date</div>
            <div class="table_head">Leave Type</div>
<?php
    for($i=0; $i<$count; $i++){
        if(!empty($requests[$i])){
?>
            <div><?= $requests[$i]["employee_name"] ?></div>
            <div><?= $requests[$i]["request_date"] ?></div>
            <div><?= $requests[$i]["from_date"] ?></div>
            <div><?= $requests[$i]["to_date"] ?></div>
            <div><?= $requests[$i]["leave_type"] ?></div>
<?php   
        }
    }
?>
        </div>

        <?= form_open("/leaves/addcount") ?>
            <input type="submit" value="Show More">
        <?= form_close() ?>
    </body>
</html>