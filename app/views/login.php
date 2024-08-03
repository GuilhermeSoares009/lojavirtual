<h2>
    login
</h2>

<?php echo getFlash('login') ; ?>

<form action="?inc=login" method="post">
    <input type="text" name="email" id="guilherme.sousa009@hotmail.com">
    <input type="password" name="password" id="123">
    <button type="submit">Login</button>
</form>