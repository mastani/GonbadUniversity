<?php

$login = false;
$error = false;

if ( isset($_POST['submit']) ) {
    if (isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) ) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        if(isset($_POST['$remember'])) $remember = true;

        $stmt = $conn->prepare('SELECT * FROM auth WHERE username = ? AND password = ?');
        $password = sha1($password);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();

        if( $stmt->num_rows == 1 ) {
            $login = true;
            $_SESSION['username'] = $username;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

?>

<?php
if ($login) {
?>

<script>location.reload();</script>

<?php
} else
?>

<div class="card card-container">
    <img id="profile-img" class="profile-img-card" src="images/no-profile.png" />
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post">
        <p style="text-align: center; font-size: 16px;">ورود به ناحیه کاربری</p>
        <?php if($error){ ?><p style="text-align: center; color: #ff4719">نام کاربری یا کلمه عبور اشتباه است</p><?php } ?>
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="نام کاربری" required autofocus>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="کلمه عبور" required>
        <div id="remember" class="checkbox">
            <label><input type="checkbox" name="remember" value="remember-me">یادآوری</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block btn-signin" name="submit" type="submit">ورود</button>
    </form>
    <a href="#" class="forgot-password">
    کلمه عبور را فراموش کرده ام
    </a>
</div>
