<h2>
    login
</h2>

<?php echo getFlash('login') ; ?>

<form action="?inc=login" method="post">
    <input type="text" name="email" value="guilherme.sousa009@hotmail.com">
    <input type="password" name="password" value="123">
    <button type="submit">Login</button>
</form>