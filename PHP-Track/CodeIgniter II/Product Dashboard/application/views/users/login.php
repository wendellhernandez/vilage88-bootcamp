        <!-- 
        DOCU: This is the Login Form.
        Transfers to the /login route when the login button is clicked.
        Transfers to the /register route when the Register button is clicked.

        Owner: Wendell
         -->
        <div class="form_container">
            <p>Login</p>
            <?= form_open("/login") ?>
                <label for="email_address">Email Address</label>
                <input required type="text" name="email_address" id="email_address">
                <label for="password">Password</label>
                <input required type="password" name="password" id="password">
                <input type="submit" value="LOGIN">
            </form>
            <div class="form_redirect">New to Clickshop? <a href="/register">Register</a></div>
        </div>