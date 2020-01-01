<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/productcategories/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_new_category ?> </a>
                <tr>
                    <th> <?= $text_category_name ?> </th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

            <?php
            /** @var TYPE_NAME $categories */
            if ($categories !== false){
                foreach($categories as $category){
            ?>
                <tr>
                    <td><?= $category->CatName?></td>
                    <td>
                        <a href="/productcategories/edit/<?= $category->CatId ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/productcategories/delete/<?= $category->CatId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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