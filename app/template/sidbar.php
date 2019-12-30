<!-- start sidbar -->
<aside class="col-lg-3 sidbar">
    <div>
        <div class="list-group">
            <div class="list-group-item" style="text-align:center">
                <img src="/images/avatar/avatar1.jpg" style="width:30%;border-radius:50%;">
                <p><a href="/users/profile" class="list-group-item" style="padding:2px"><i class="fa fa-eye"></i> <?= $this->session->user->profile->FirstName ?> <?= $this->session->user->profile->LastName ?> </a></p>
                <p class="list-group-item" style="padding:1px"><i class="fa fa-user-circle"></i> <?= $this->session->user->GroupName ?> </p>
            </div>
        </div>
    </div>

    <hr>

    <div>
        <div class="list-group">
            <!-- Dash Board -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/">
                    <i class="fa fa-dashboard"></i>
                    <span><?= $text_general_statistics ?></span>
                </a>
            </li>
            <!-- Transactions -->
            <li class="nav-item list-group-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-credit-card"></i>
                    <span><?= $text_transactions ?></span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-header" href="/purchases"><i class="fa fa-shopping-cart"></i> <?= $text_transactions_purchases ?> </a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-header" href="/sales"><i class="fa fa-shopping-cart"></i> <?= $text_transactions_sales ?> </a>
                    </div>
                </div>
            </li>
            <!-- Expenses -->
            <li class="nav-item list-group-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-money"></i>
                    <span><?= $text_expenses ?></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-header" href="/expensescategories"><i class="fa fa-shopping-cart"></i> <?= $text_expenses_categories ?> </a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-header" href="/dailyexpenses"><i class="fa fa-shopping-cart"></i> <?= $text_expenses_daily ?> </a>
                    </div>
                </div>
            </li>
            <!-- Store -->
            <li class="nav-item list-group-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?= $text_store ?></span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-header" href="/productcategories"><i class="fa fa-shopping-cart"></i> <?= $text_store_categories ?> </a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-header" href="/products"><i class="fa fa-shopping-cart"></i> <?= $text_store_products ?> </a>
                    </div>
                </div>
            </li>
            <!-- Clients -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/clients') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/clients">
                    <i class="fa fa-id-badge"></i>
                    <span><?= $text_clients ?></span>
                </a>
            </li>
            <!-- Suppliers -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/suppliers') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/suppliers">
                    <i class="fa fa-user"></i>
                    <span><?= $text_suppliers ?></span>
                </a>
            </li>
            <!-- Users -->
            <li class="nav-item list-group-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSex" aria-expanded="true" aria-controls="collapseSex">
                    <i class="fa fa-group"></i>
                    <span><?= $text_users ?></span>
                </a>
                <div id="collapseSex" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-header" href="/users"><i class="fa fa-shopping-cart"></i> <?= $text_users_list ?> </a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-header" href="/usersgroups"><i class="fa fa-shopping-cart"></i> <?= $text_users_group ?> </a>
                        <div class="collapse-divider"></div>
                        <a class="collapse-header" href="/privileges"><i class="fa fa-shopping-cart"></i> <?= $text_users_privileges ?> </a>
                    </div>
                </div>
            </li>
            <!-- Reports -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/reports') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/reports">
                    <i class="fa fa-bar-chart"></i>
                    <span><?= $text_reports ?></span>
                </a>
            </li>
            <!-- Notifications -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/notifications') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/notifications">
                    <i class="fa fa-bell"></i>
                    <span><?= $text_notifications ?></span>
                </a>
            </li>
            <!-- Log Out -->
            <li class="nav-item list-group-item <?= ($this->matchUrl('/auth/logout') === true)  ? 'selected' : '' ?>">
                <a class="nav-link collapsed" href="/auth/logout">
                    <i class="fa fa-bell"></i>
                    <span><?= $text_log_out ?></span>
                </a>
            </li>
        </div>
    </div>
</aside>
<!-- end sidbar -->
<div class="action_view">

<?php
$messages = $this->messenger->getMessages();
//if(!empty($messages)) {
//    foreach ($messages as $message){
//        echo '<p class="message t' . $message[1] . '">' . $message[0] . '</p>';
//    }
//}

if (!empty($messages)){
    foreach ($messages as $message) {
        echo '<p class="message t' . $message[1] . '"><a href="" class="closeBtn"><i class="fa fa-times"></i> ' . $message[0] . ' </a></p>';
    }
}
?>