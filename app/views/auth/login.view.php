<div id="container">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h1><?= $text_login_title ?></h1>
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="/images/non-avatar.png" width="20" height="20" id="icon" alt="User Icon" />
            </div>
            <!-- Login Form -->
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <input type="text" id="Username" class="fadeIn second" name="Username" placeholder="<?= $text_Username ?>">
                <input type="password" id="Password" class="fadeIn third" name="Password" placeholder="<?= $text_Password ?>">
                <input type="submit" name="submit" class="fadeIn fourth" value="<?= $text_button ?>">
            </form>
            <!-- Remind Password -->
            <div id="formFooter">
                <a class="underlineHover" href="#"><?= $text_forgotpassword ?></a>
            </div>
        </div>
    </div>
</div>
