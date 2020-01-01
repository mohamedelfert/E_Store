<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_client ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="ClientName"> <?= $text_label_ClientName ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_ClientName ?> *" name="ClientName" id="ClientName" required value="<?= $this->showValue('ClientName', $client) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="ClientEmail"> <?= $text_label_ClientEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_ClientEmail ?> *" name="ClientEmail" id="ClientEmail" maxlength="40" required value="<?= $this->showValue('ClientEmail', $client) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="ClientAddress"> <?= $text_label_ClientAddress ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_ClientAddress ?> *" name="ClientAddress" id="ClientAddress" required value="<?= $this->showValue('ClientAddress', $client) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="ClientPhone"> <?= $text_label_ClientPhone ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_ClientPhone ?> *" name="ClientPhone" id="ClientPhone" maxlength="11" required value="<?= $this->showValue('ClientPhone', $client) ?>" />
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