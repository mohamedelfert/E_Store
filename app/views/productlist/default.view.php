<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/productlist/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_new_product ?> </a>
                <tr>
                    <th> <?= $text_product_name ?> </th>
                    <th> <?= $text_product_cat_name ?> </th>
                    <th> <?= $text_product_quantity ?> </th>
                    <th> <?= $text_label_BuyPrice ?> </th>
                    <th> <?= $text_label_SellPrice ?> </th>
                    <th> <?= $text_product_unit ?> </th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

            <?php
            /** @var TYPE_NAME $products */
            if ($products !== false){
                foreach($products as $product){
            ?>
                <tr>
                    <td><?= $product->ProductName?></td>
                    <td><?= $product->CatName?></td>
                    <td><?= $product->Quantity?></td>
                    <td><?= $product->BuyPrice?></td>
                    <td><?= $product->SellPrice?></td>
                    <td><?= $product->Unit?></td>
                    <td>
                        <a href="/productlist/edit/<?= $product->ProductId ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/productlist/delete/<?= $product->ProductId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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