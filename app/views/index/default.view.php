<div id="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-2" style="border: 1px solid #ddd;padding: 10px;margin: 1% 4%"> <!-- الديف دا خاص بعرض بيانات المستخدم -->
                <div class="panel panel-primary">
                    <div class="panel-heading"><?= $text_welcome ?> <?= $this->session->user->Username ?></div>
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="/images/avatar/avatar1.jpg" width="40%" max-width="150px" class="img-thumbnail">
                            <hr>
                        </div>
                        <div class="text-right">
                            <p><b>البريد : </b><?= $this->session->user->Email ?></p>
                            <p><b>الصلاحيه : </b><?= $this->session->user->GroupName ?></p>
                            <p class="text-left"><a href="#" class="btn btn-danger btn-xs"><b>تعديل البيانات</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="border: 1px solid #ddd;padding: 10px;margin: 1% 4%"> <!-- الديف دا خاص بعرض عدد المقالات -->
                <div class="panel panel-info">
                    <div class="panel-heading"><b>المقالات</b></div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <i class="fa fa-list-alt fa-5x" style="color: #31708F"></i>
                        </div>
                        <div class="col-md-4">
                            <p><b><?= $this->session->user->Email ?></b></p>
                        </div>
                    </div>
                    <div class="panel-footer text-center"><i class="fa fa-eye"></i> <a href="posts.php"><b>مشاهده</b></a></div>
                </div>
            </div>
            <div class="col-md-2" style="border: 1px solid #ddd;padding: 10px;margin: 1% 4%"> <!-- الديف دا خاص بعرض عدد التعليقات -->
                <div class="panel panel-danger">
                    <div class="panel-heading"><b>التعليقات</b></div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <i class="fa fa-comments-o fa-5x" style="color: #A94442"></i>
                        </div>
                        <div class="col-md-4">
                            <p><b><?= $this->session->user->Email ?></b></p>
                        </div>
                    </div>
                    <div class="panel-footer text-center"><i class="fa fa-eye"></i> <a href="comments.php"><b>مشاهده</b></a></div>
                </div>
            </div>
            <div class="col-md-2" style="border: 1px solid #ddd;padding: 10px;margin: 1% 4%"> <!-- الديف دا خاص بعرض عدد الأعضاء -->
                <div class="panel panel-success">
                    <div class="panel-heading"><b>الأعضاء</b></div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <i class="fa fa-users fa-5x" style="color: #3C763D"></i>
                        </div>
                        <div class="col-md-4">
                            <p><b><?= $this->session->user->Email ?></b></p>
                        </div>
                    </div>
                    <div class="panel-footer text-center"><i class="fa fa-eye"></i> <a href="users.php"><b>مشاهده</b></a></div>
                </div>
            </div>
        </div>
        <!-- The main Div contain Add Form And Show Information -->
        <div class="main_div">

            <!-- Show Users Information -->
            <div class="show_info" style="width: 90%;">

                <table class="table table-striped custab data">
                    <thead>
                    <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                    <tr>
                        <th> <?= $text_username ?> </th>
                        <th> <?= $text_user_group ?> </th>
                        <th> <?= $text_user_email ?> </th>
                        <th> <?= $text_subscription_date ?> </th>
                        <th> <?= $text_last_login ?></th>
                        <th> <?= $text_options ?> </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    /** @var TYPE_NAME $user */
                    if ($user !== false){
                        foreach($user as $user){
                            ?>
                            <tr>
                                <td><?= $user->Username?></td>
                                <td><?= $user->GroupName?></td>
                                <td><?= $user->Email?></td>
                                <td><?= $user->SubscriptionDate?></td>
                                <td><?= $user->LastLogin?></td>
                                <td>
                                    <a href="/users/default"><i class="fa fa-home" style="font-size:20px"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <td colsapan="6"><p> <?= $text_no_data ?> </p></td>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>