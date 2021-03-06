<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_supplier ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierName"> <?= $text_label_SupplierName ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_SupplierName ?> *" name="SupplierName" id="SupplierName" required value="<?= $this->showValue('SupplierName') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierEmail"> <?= $text_label_SupplierEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_SupplierEmail ?> *" name="SupplierEmail" id="SupplierEmail" maxlength="40" required value="<?= $this->showValue('SupplierEmail') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierAddress"> <?= $text_label_SupplierAddress ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_SupplierAddress ?> *" name="SupplierAddress" id="SupplierAddress" required value="<?= $this->showValue('SupplierAddress') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="SupplierPhone"> <?= $text_label_SupplierPhone ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_SupplierPhone ?> *" name="SupplierPhone" id="SupplierPhone" maxlength="11" required value="<?= $this->showValue('SupplierPhone') ?>" />
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btnRegister"  value="<?= $text_add ?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>