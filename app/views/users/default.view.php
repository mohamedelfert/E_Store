<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/users/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_user ?> </a>
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
            /** @var TYPE_NAME $users */
            if ($users !== false){
                foreach($users as $user){
            ?>
                <tr>
                    <td><?= $user->Username?></td>
                    <td><?= $user->GroupId?></td>
                    <td><?= $user->Email?></td>
                    <td><?= $user->SubscriptionDate?></td>
                    <td><?= $user->LastLogin?></td>
                    <td>
                        <a href="/users/edit/<?= $user->UserID ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/users/delete/<?= $user->UserID ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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