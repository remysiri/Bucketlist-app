<form action="index.php?page=login" method="POST">
<input type="hidden" name="action" value="login"/> 
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" />
        <span class="username_error"></span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <span class="password_error"></span>
    </div>
    <div class="form-group">
        <button type="submit">Login</button>
    </div>
    <p>No account yet?<a href="index.php?page=register">Sign Up</a></p>
</form>