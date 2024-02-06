        <!-- 
        DOCU: Users can edit their profiles by clicking the edit profile button that redirects to /users/edit route.

        Owner: Wendell
        -->
        <div class="dashboard_title">
            <p>Profile</p>
            <a href="/users/edit">Edit Profile</a>
        </div>

        <!-- 
        DOCU: Shows all user info

        Owner: Wendell
        -->
        <div class="profile_info">
            <i class="fa-solid fa-user-astronaut"></i>
            <p><span>Email Address: </span><?= $user["email_address"] ?></p>
            <p><span>First Name: </span><?= $user["first_name"] ?></p>
            <p><span>Last Name: </span><?= $user["last_name"] ?></p>
        </div>