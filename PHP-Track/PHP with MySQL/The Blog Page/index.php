<?php
    require_once 'includes/new-connection.php';
    session_start();

    //get name if logged in
    if(isset($_SESSION['id'])){
        $sql = "SELECT *, date_format(created_at, '%m/%d/%Y %h:%i:%s%p') AS date_created FROM users WHERE id = '{$_SESSION['id']}'";

        $name = fetch_record($sql);
    }

    //get reviews
    $sql = "SELECT *, date_format(reviews.created_at, '%M-%d-%Y %h:%i:%s%p') AS review_date, reviews.id AS review_id FROM users INNER JOIN reviews ON users.id = reviews.user_id ORDER BY reviews.created_at DESC";

    $reviews = fetch_all($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Space Blog | The Blog Page</title>
        <link rel="shortcut icon" href="assets/logo/logo_image.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav>
                <ul class="login_signup">
<?php
    if(isset($_SESSION['id'])){
?>
                    <li><a href="#" class="nav_username">Welcome <?= $name['first_name'] . ' ' . $name['last_name'] ?>!</a></li>
                    <li><a href="includes/logout_process.php">Sign Out</a></li>
<?php }else{
?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
<?php }
?>
                    
                </ul>
                <div>
                    <a href="index.php"><img src="assets/logo.png" alt="social"></a>
                    <form action="#" method="get">
                        <input type="text" name="search" placeholder="Search for notifications">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="#"><i class="fa-solid fa-bell"></i><span>2</span></a>
                </div>
            </nav>
        </header>

        <main class="blog_container">
            <img src="assets/logo.png">
            <h1>An outer-space inspired blog</h1>
            <p>Spaceflight will never tolerate carelessness, incapacity, and neglect. Somewhere, somehow, we screwed up. It could have been in design, build, or test. Whatever it was, we should have caught it. We were too gung ho about the schedule and we locked out all of the problems we saw each day in our work.</p>
            <p>“Every element of the program was in trouble and so were we. The simulators were not working, Mission Control was behind in virtually every area, and the flight and test procedures changed daily. Nothing we did had any shelf life. Not one of us stood up and said, 'Dammit, stop!' I don't know what Thompson's committee will find as the cause, but I know what I find. We are the cause! We were not ready! We did not do our job. We were rolling the dice, hoping that things would come together by launch day, when in our hearts we knew it would take a miracle. We were pushing the schedule and betting that the Cape would slip before we did.</p>
            <p>“From this day forward, Flight Control will be known by two words: 'Tough' and 'Competent.' Tough means we are forever accountable for what we do or what we fail to do. We will never again compromise our responsibilities. Every time we walk into Mission Control we will know what we stand for. Competent means we will never take anything for granted. We will never be found short in our knowledge and in our skills. Mission Control will be perfect.</p>
            <h2>Reviews</h2>
<?php
    if(isset($_SESSION['id'])){
?>
            <h3>Leave a Review</h3>
            <form action="includes/review_process.php" method="post">
                <textarea name="content"></textarea>
                <input type="submit" value="Post a review">
            </form>
            <h3>Comments</h3>
<?php 
    }

    foreach($reviews as $review){
        $review_date = $review['review_date'];
        $first_name = $review['first_name'];
        $last_name = $review['last_name'];
        $review_full_name = $first_name . ' ' . $last_name;
        $review_content = $review['content'];
        $review_id = $review['review_id'];
?>
            <div>
                <span><?= $review_full_name ?> (<?= $review_date ?>)</span>
                <p><?= $review_content ?></p>
                <div class="reply_container">
<?php 
        $sql = "SELECT *, date_format(replies.created_at, '%M-%d-%Y %h:%i:%s%p') AS reply_date
        FROM users
        INNER JOIN replies ON replies.user_id = users.id
        WHERE replies.review_id = $review_id";
        
        $replies = fetch_all($sql);
        
        foreach($replies as $reply){
            $reply_date = $reply['reply_date'];
            $first_name = $reply['first_name'];
            $last_name = $reply['last_name'];
            $reply_full_name = $first_name . ' ' . $last_name;
            $reply_content = $reply['content'];
?>
                    <span><?= $reply_full_name ?> (<?= $reply_date ?>)</span>
                    <p><?= $reply_content ?></p>
<?php   }
        if(isset($_SESSION['id'])){
?>
                    <form action="includes/reply_process.php" method="post">
                        <input type="hidden" name="review_id" value="<?= $review_id ?>">
                        <textarea name="content"></textarea>
                        <input type="submit" value="Reply">
                    </form>
<?php   }
?>
                </div>
            </div>
            
<?php }
?>
        </main>

        <footer>
            <span>&copy; 2024 Wendell Hernandez. All Rights Reserved</span>
            <ul>
                <li>Country &amp; Region: </li>
                <li><a href="">Philippines</a></li>
                <li><a href="">Singapore</a></li>
                <li><a href="">Indonesia</a></li>
                <li><a href="">Thailand</a></li>
                <li><a href="">Malaysia</a></li>
            </ul>
        </footer>
    </body>
</html>