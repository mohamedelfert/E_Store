<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_update_user ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Username"> <?= $text_label_Username ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_Username ?> *" name="Username" id="Username" required value="<?= $users->Username ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Password"> <?= $text_label_Password ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_label_Password ?> *" name="Password" id="Password" required value="<?= $users->Password ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CPassword"> <?= $text_label_CPassword ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_label_CPassword ?> *" name="CPassword" id="CPassword" required value="<?= $users->Password ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Email"> <?= $text_label_Email ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_Email ?> *" name="Email" id="Email" maxlength="40" required value="<?= $users->Email ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CEmail"> <?= $text_label_CEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_CEmail ?> *" name="CEmail" id="CEmail" maxlength="40" required value="<?= $users->Email ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="PhoneNumber"> <?= $text_label_PhoneNumber ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_PhoneNumber ?> *" name="PhoneNumber" id="PhoneNumber" maxlength="11" required value="<?= $users->PhoneNumber ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-5" for="GroupId"> <?= $text_user_group ?> : </label>
                                <label class="control-label col-sm-9">
                                    <select class="form-control" name="GroupId" id="GroupId">
                                        <option class="hidden" value=""> <?= $text_label_GroupId ?> </option>
                                        <?php
                                        /** @var TYPE_NAME $groups */
                                        if ($groups !== false) {
                                            foreach ($groups as $group) {
                                                ?>
                                                <option value="<?= $group->GroupId ?>"> <?= $group->GroupName ?> </option>
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