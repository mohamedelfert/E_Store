<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_update_privilege ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-5" for="privilege"> <?= $text_privilege_name ?> : </label>
                                <label class="control-label col-sm-9">
                                    <input type="text" class="form-control" placeholder="<?= $text_privilege_name ?> *" name="privilege" id="privilege" required value="<?= $privileges->Privilege ?>"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="privilege_title">  <?= $text_privilege_title ?> : </label>
                                <label class="control-label col-sm-9">
                                    <input type="text" class="form-control" placeholder="<?= $text_privilege_title ?> *" name="privilege_title" id="privilege_title" required value="<?= $privileges->PrivilegeTitle ?>"/>
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