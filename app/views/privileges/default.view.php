<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/privileges/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_new_privilege ?> </a>
                <tr>
                    <th> <?= $text_privilege_name ?> </th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

            <?php
            /** @var TYPE_NAME $privileges */
            if ($privileges !== false){
                foreach($privileges as $privilege){
            ?>
                <tr>
                    <td><?= $privilege->Privilege?></td>
                    <td>
                        <a href="/privileges/edit/<?= $privilege->PrivilegeId ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/privileges/delete/<?= $privilege->PrivilegeId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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