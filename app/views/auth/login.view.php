<div id="container" class="login">
    <div class="card card-container">
        <h1><?= $text_login_title ?></h1>
        <img id="profile-img" class="profile-img-card" src="/images/non-avatar.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" enctype="application/x-www-form-urlencoded">
            <input type="text" id="Username" name="Username" class="form-control" placeholder="<?= $text_Username ?>" required>
            <input type="password" id="Password" name="Password" class="form-control" placeholder="<?= $text_Password ?>" required>
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit" value="<?= $text_button ?>">
        </form>
        <a href="#" class="forgot-password">
            <?= $text_forgot_password ?>
        </a>
    </div>
</div>