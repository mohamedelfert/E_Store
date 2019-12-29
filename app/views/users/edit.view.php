<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_update_user ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="PhoneNumber"> <?= $text_label_PhoneNumber ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_PhoneNumber ?> *" name="PhoneNumber" id="PhoneNumber" maxlength="11" required value="<?= $this->showValue('PhoneNumber', $users) ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="GroupId"> <?= $text_user_group ?> : </label>
                                <label class="control-label col-sm-12">
                                    <select class="form-control" name="GroupId" id="GroupId">
                                        <option class="hidden" value=""> <?= $text_label_GroupId ?> </option>
                                        <?php
                                        /** @var TYPE_NAME $groups */
                                        if ($groups !== false) {
                                            foreach ($groups as $group) {
                                                ?>
                                                <option value="<?= $group->GroupId ?>" <?= $this->selectedGroup('GroupId',$group->GroupId,$users) ?> > <?= $group->GroupName ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
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