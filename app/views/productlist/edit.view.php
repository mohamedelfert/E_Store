<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="multipart/form-data">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_new_product ?> </h3>
                    <div class="row register-form">
                        <div class="form-group col-md-6">
                            <label class="control-label col-sm-12" for="ProductName"> <?= $text_label_ProductName ?>  :  </label>
                            <label class="control-label col-sm-12">
                                <input type="text" class="form-control" placeholder="<?= $text_label_ProductName ?> *" name="ProductName" id="ProductName" required value="<?= $this->showValue('ProductName',$product) ?>"/>
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CatName"> <?= $text_label_CatName ?> : </label>
                                <label class="control-label col-sm-12">
                                    <select class="form-control" name="CatName" id="CatName">
                                        <option class="hidden" value=""> <?= $text_label_CatName ?> </option>
                                        <?php
                                        /** @var TYPE_NAME $product_category */
                                        if ($product_category !== false) {
                                            foreach ($product_category as $P_category) {
                                                ?>
                                                <option value="<?= $P_category->CatId ?>" <?= $this->selectedGroup('CatId',$P_category->CatId,$product) ?>> <?= $P_category->CatName ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label col-sm-12" for="Quantity"> <?= $text_label_Quantity ?>  :  </label>
                            <label class="control-label col-sm-12">
                                <input type="number" class="form-control" min="1" step="1" name="Quantity" id="Quantity" required value="<?= $this->showValue('Quantity',$product) ?>"/>
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label col-sm-12" for="BuyPrice"> <?= $text_label_BuyPrice ?>  :  </label>
                            <label class="control-label col-sm-12">
                                <input type="number" class="form-control" min="1" step="0.01" name="BuyPrice" id="BuyPrice" required value="<?= $this->showValue('BuyPrice',$product) ?>"/>
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label col-sm-12" for="SellPrice"> <?= $text_label_SellPrice ?>  :  </label>
                            <label class="control-label col-sm-12">
                                <input type="number" class="form-control" min="1" step="0.01" name="SellPrice" id="SellPrice" required value="<?= $this->showValue('SellPrice',$product) ?>"/>
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Unit"> <?= $text_label_Unit ?> : </label>
                                <label class="control-label col-sm-12">
                                    <select class="form-control" name="Unit" id="Unit">
                                        <option class="hidden" value=""> <?= $text_label_Unit ?> </option>
                                        <option  value="1" <?= $this->selectedGroup('Unit',1,$product) ?>> <?= $text_unit_1 ?> </option>
                                        <option  value="2" <?= $this->selectedGroup('Unit',2,$product) ?>> <?= $text_unit_2 ?> </option>
                                        <option  value="3" <?= $this->selectedGroup('Unit',3,$product) ?>> <?= $text_unit_3 ?> </option>
                                        <option  value="4" <?= $this->selectedGroup('Unit',4,$product) ?>> <?= $text_unit_4 ?> </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label col-sm-12" for="ProductImage"> <?= $text_file ?>  :  </label>
                            <label class="control-label col-sm-12">
                                <input type="file" class="form-control" name="ProductImage" id="ProductImage" />
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label col-sm-12">
                                <img class="form-control" src="/uploads/images/<?= $product->ProductImage ?>" height="250"/>
                            </label>
                        </div>
                        <input type="submit" name="submit" class="btnRegister"  value="<?= $text_update ?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>