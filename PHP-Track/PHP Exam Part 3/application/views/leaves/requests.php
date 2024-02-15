<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Leave Requests</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/ajax.js"></script>
    </head>
    <body>
        <header>
            <?= form_open("/leaves/table_partial") ?>
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
            <?= form_close() ?>
        </header>

        <div class="leave_container">

        </div>
    </body>
</html>