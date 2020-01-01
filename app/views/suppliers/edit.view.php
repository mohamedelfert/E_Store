<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_supplier ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierEmail"> <?= $text_label_SupplierEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_SupplierEmail ?> *" name="SupplierEmail" id="SupplierEmail" maxlength="40" required value="<?= $this->showValue('SupplierEmail', $supplier) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierCEmail"> <?= $text_label_SupplierCEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_SupplierCEmail ?> *" name="SupplierCEmail" id="SupplierCEmail" maxlength="40" required value="<?= $this->showValue('SupplierEmail', $supplier) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierPhone"> <?= $text_label_SupplierPhone ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_SupplierPhone ?> *" name="SupplierPhone" id="SupplierPhone" maxlength="11" required value="<?= $this->showValue('SupplierPhone', $supplier) ?>" />
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btnRegister"  value="<?= $text_update ?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>