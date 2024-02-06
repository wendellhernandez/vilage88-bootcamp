        <!-- 
        DOCU: This is the Register Form.
        Goes to /users/add_user route when the register button is clicked.
        This validates the user inputs both with javascript and backend.
        Goes to /login route when the login button is clicked.

        Owner: Wendell
         -->
        <div class="form_container">
            <p>Register</p>
            <?= $validation_errors ?>
            <?= form_open("/users/add_user") ?>
                <label for="email_address">Email Address</label>
                <input type="text" name="email_address" id="email_address">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password">
                <input type="submit" value="REGISTER">
            </form>
            <div class="form_redirect">Already have an account? <a href="/login">Login</a></div>
        </div>