<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <meta http-equiv="refresh" content="1"> -->
        <title>Billing Statement</title>

        <!-- Font Awesome , Normalize and Custom CSS -->
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">

        <!-- Scripts for Canvas JS -->
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

        <script>
            window.onload = function () {
                // Edit Data for Canvas JS
                var options = {
                    title: {
                        text: "Client Billing - 2011"              
                    },
                    data: [              
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [
<?php
    foreach($billings as $billing){
        $row++
?>
                            { label: "<?= $billing["month"] ?> - <?= $billing["year"] ?>",  y: <?= $billing["total_cost"] ?>  },
<?php
    }
?>
                        ]
                    }
                    ]
                };

                // Add the Chart to the html container
                $("#chart_container").CanvasJSChart(options);
            }
        </script>
    </head>
    <body>
        <header>
            <!-- Form for entering data range of the report -->
            <?= form_open("/") ?>
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date">
                <input type="submit" value="Show" name="show_report">
            </form>
        </header>

        <!-- Table container for list of charges per month -->
        <main>
            <h1>List of total charges per month</h1>
            <div>
                <span>Month</span>
                <span>Year</span>
                <span>Total Cost</span>
            </div>
<!-- Loop through all chargers inside the range and put it in the table container-->
<?php
    foreach($billings as $billing){
        $row++
?>
            <div class="row_<?= $row%2 ?>">
                <span><?= $billing["month"] ?></span>
                <span><?= $billing["year"] ?></span>
                <span><?= $billing["total_cost"] ?></span>
            </div>
<?php
    }
?>
            
        </main>
        
        <!-- Container for Canvas JS Chart -->
        <div id="chart_container"></div>
    </body>
</html>