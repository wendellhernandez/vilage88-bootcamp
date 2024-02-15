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
            <h1><?= count($requests) ?> Leave Request</h1>
            <?= form_open("/requests") ?>
                <input type="radio" name="sort_by_request_date" id="most_recent" value="most_recent">
                <label for="most_recent">Most Recent</label>
                <input type="radio" name="sort_by_request_date" id="old_request" value="old_request">
                <label for="old_request">Old Request</label>
                <select name="leave_type">
                    <option value="">Leave Type</option>
                    <option value="Vacation">Vacation</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Unpaid leave">Unpaid leave</option>
                    <option value="Paid Leave">Paid Leave</option>
                    <option value="Half Day Unpaid">Half Day Unpaid</option>
                </select>
                <input type="submit" value="Search">
            <?= form_close() ?>
        </header>

        <div class="leave_container">
            <div class="table_head">Employee Name</div>
            <div class="table_head">Request Date</div>
            <div class="table_head">From Date</div>
            <div class="table_head">To Date</div>
            <div class="table_head">Leave Type</div>
<?php
    foreach($requests as $request){
        if(!empty($request)){
?>
            <div><?= $request["employee_name"] ?></div>
            <div><?= $request["request_date"] ?></div>
            <div><?= $request["from_date"] ?></div>
            <div><?= $request["to_date"] ?></div>
            <div><?= $request["leave_type"] ?></div>
<?php   
        }
    }
?>
        </div>
    </body>
</html>