        <!-- 
        DOCU: This is the Login Form.
        Transfers to the /login route when the login button is clicked.
        Transfers to the /register route when the Register button is clicked.

        Owner: Wendell
         -->
        <div class="form_container">
            <p>Login</p>
            <?= $validation_errors ?>
            <?= form_open("/users/login_user") ?>
                <label for="login_email_address">Email Address</label>
                <input type="text" name="email_address" id="login_email_address">
                <label for="login_password">Password</label>
                <input type="password" name="password" id="login_password">
                <input type="submit" value="LOGIN">
            </form>
            <div class="form_redirect">New to Clickshop? <a href="/register">Register</a></div>
        </div>