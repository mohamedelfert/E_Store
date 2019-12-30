<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/"><?= $text_logo ?></a>
        <h6 style="color: #fff3cd">
            <?php if(isset($title)) :  ?>
                <?= ' > ' . $title ?>
            <?php endif; ?>
        </h6>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/messages" class="language_switch nav-link"><i class="fa fa-envelope"></i></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="language_switch notifications nav-link"><i class="fa fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/language" class="language_switch nav-link"><span><?= $_SESSION['lang'] == 'ar' ? 'En' : 'عربي' ?></span> <i class="fa fa-globe"></i></a>
                </li>
            </ul>

            <div class="dropdown">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><?= $text_welcome ?> <?= $this->session->user->Username ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="/" class="dropdown-item"><i class="fa fa-user"></i> <?= $text_profile ?></a>
                    <a href="/" class="dropdown-item"><i class="fa fa-key"></i> <?= $text_change_password ?></a>
                    <a href="/" class="dropdown-item"><i class="fa fa-gear"></i> <?= $text_account_settings ?></a>
                    <a href="/auth/logout" class="dropdown-item"><i class="fa fa-sign-out"></i> <?= $text_log_out ?></a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navigation end -->