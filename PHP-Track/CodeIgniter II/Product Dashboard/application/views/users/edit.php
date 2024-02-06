        <!-- 
        DOCU: Users can edit their profiles by clicking the edit profile button that redirects to /users/edit route.

        Owner: Wendell
        -->
        <div class="dashboard_title">
            <p>Edit Profile</p>
            <a href="/users/profile">Cancel Edit</a>
        </div>

        <!-- 
        DOCU: Users can edit their information and change their password

        Owner: Wendell
        -->
        <div class="edit_form_container">
            <?= form_open("/users/edit_profile_info") ?>
                <?= $validation_errors ?>
                <label for="email_address">Email Address</label>
                <input type="text" name="email_address" id="email_address" value="<?= $user["email_address"] ?>">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="<?= $user["first_name"] ?>">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="<?= $user["last_name"] ?>">
                <input type="submit" value="SAVE">
            </form>

            <?= form_open("/users/edit_password") ?>
                <?= $password_errors ?>
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password">
                <label for="new_confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="new_confirm_password">
                <input type="submit" value="SAVE">
            </form>
        </div>