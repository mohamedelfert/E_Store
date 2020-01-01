<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/clients/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_client ?> </a>
                <tr>
                    <th> <?= $text_client_name ?> </th>
                    <th> <?= $text_client_phone ?> </th>
                    <th> <?= $text_client_email ?> </th>
                    <th> <?= $text_client_address ?> </th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

            <?php
            /** @var TYPE_NAME $clients */
            if ($clients !== false){
                foreach($clients as $client){
            ?>
                <tr>
                    <td><?= $client->ClientName?></td>
                    <td><?= $client->ClientPhone?></td>
                    <td><?= $client->ClientEmail?></td>
                    <td><?= $client->ClientAddress?></td>
                    <td>
                        <a href="/clients/edit/<?= $client->ClientId ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/clients/delete/<?= $client->ClientId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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