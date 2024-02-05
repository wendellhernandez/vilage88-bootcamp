        <!-- 
        DOCU: This is the Register Form.
        Transfers to the /register route when the register button is clicked.
        Transfers to the /login route when the login button is clicked.

        Owner: Wendell
         -->
        <div class="form_container">
            <p>Register</p>
            <?= form_open("/register") ?>
                <label for="email_address">Email Address</label>
                <input required type="text" name="email_address" id="email_address">
                <label for="first_name">First Name</label>
                <input required type="text" name="first_name" id="first_name">
                <label for="last_name">Last Name</label>
                <input required type="text" name="last_name" id="last_name">
                <label for="password">Password</label>
                <input required type="password" name="password" id="password">
                <label for="confirm_password">Confirm Password</label>
                <input required type="password" name="confirm_password" id="confirm_password">
                <input type="submit" value="REGISTER">
            </form>
            <div class="form_redirect">Already have an account? <a href="/login">Login</a></div>
        </div>