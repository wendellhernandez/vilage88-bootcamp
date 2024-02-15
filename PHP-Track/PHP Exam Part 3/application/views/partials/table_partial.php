            <h1><?= count($requests) ?> Leave Request</h1>
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