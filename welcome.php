<?php
include('index.php');

echo '<div class="page-header">
    <h1>Hi, <b>'; echo htmlspecialchars($_SESSION["username"]); echo '</b>. Welcome to our site.</h1>
</div>
<p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>';

