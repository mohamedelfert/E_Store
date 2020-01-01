<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Users Information -->
    <div class="show_info" style="width: 90%;">

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>
                <a href="/suppliers/add" class="btn btn-primary btn-xs pull-right"><b>&plus;</b> <?= $text_add_supplier ?> </a>
                <tr>
                    <th> <?= $text_supplier_name ?> </th>
                    <th> <?= $text_supplier_phone ?> </th>
                    <th> <?= $text_supplier_email ?> </th>
                    <th> <?= $text_supplier_address ?> </th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

            <?php
            /** @var TYPE_NAME $suppliers */
            if ($suppliers !== false){
                foreach($suppliers as $supplier){
            ?>
                <tr>
                    <td><?= $supplier->SupplierName?></td>
                    <td><?= $supplier->SupplierPhone?></td>
                    <td><?= $supplier->SupplierEmail?></td>
                    <td><?= $supplier->SupplierAddress?></td>
                    <td>
                        <a href="/suppliers/edit/<?= $supplier->SupplierId ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                        <a href="/suppliers/delete/<?= $supplier->SupplierId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
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