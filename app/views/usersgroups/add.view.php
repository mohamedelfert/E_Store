<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_new_group ?> </h3>
                    <div class="row register-form">
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2" for="groupName"> <?= $text_group_name ?>  :  </label>
                            <label class="control-label col-sm-9">
                                <input type="text" class="form-control" placeholder="<?= $text_group_name ?> *" name="groupName" id="groupName" required />
                            </label>
                        </div>
                        <div class="container">
                            <div class="headbox"> <?= $text_group_privileges ?> : </div>
                            <?php
                            /** @var TYPE_NAME $privileges */
                            if ($privileges !== false){
                                foreach($privileges as $privilege){
                            ?>
                                <div class="input-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="privilege[]" id="privilege[]" value="<?= $privilege->PrivilegeId ?>">
                                            <span><?= $privilege->Privilege ?></span>
                                        </label>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <input type="submit" name="submit" class="btnRegister"  value="<?= $text_add ?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>