<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_user ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="FirstName"> <?= $text_label_FirstName ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_FirstName ?> *" name="FirstName" id="FirstName" required value="<?= $this->showValue('FirstName') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="LastName"> <?= $text_label_LastName ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_LastName ?> *" name="LastName" id="LastName" required value="<?= $this->showValue('LastName') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Username"> <?= $text_label_Username ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_Username ?> *" name="Username" id="Username" required value="<?= $this->showValue('Username') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Password"> <?= $text_label_Password ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_label_Password ?> *" name="Password" id="Password" required value="<?= $this->showValue('Password') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CPassword"> <?= $text_label_CPassword ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_label_CPassword ?> *" name="CPassword" id="CPassword" required value="<?= $this->showValue('CPassword') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Email"> <?= $text_label_Email ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_Email ?> *" name="Email" id="Email" maxlength="40" required value="<?= $this->showValue('Email') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CEmail"> <?= $text_label_CEmail ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_label_CEmail ?> *" name="CEmail" id="CEmail" maxlength="40" required value="<?= $this->showValue('CEmail') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Address"> <?= $text_label_Address ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_Address ?> *" name="Address" id="Address" required value="<?= $this->showValue('Address') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="DateOfBirth"> <?= $text_label_DateOfBirth ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="date" class="form-control" name="DateOfBirth" id="DateOfBirth" required value="<?= $this->showValue('DateOfBirth') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="PhoneNumber"> <?= $text_label_PhoneNumber ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_label_PhoneNumber ?> *" name="PhoneNumber" id="PhoneNumber" maxlength="11" required value="<?= $this->showValue('PhoneNumber') ?>" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                            <option value="<?= $group->GroupId ?>"> <?= $group->GroupName ?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
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