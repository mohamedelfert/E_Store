<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_add_user ?> </h3>
                    <div class="row register-form">
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Username"> <?= $text_username ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_username ?> *" name="Username" id="Username" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Password"> <?= $text_user_password ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_user_password ?> *" name="Password" id="Password" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CPassword"> <?= $text_user_confirm_password ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="password" class="form-control" placeholder="<?= $text_user_confirm_password ?> *" name="CPassword" id="CPassword" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="Email"> <?= $text_user_email ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_user_email ?> *" name="Email" id="Email" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="CEmail"> <?= $text_user_confirm_email ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="email" class="form-control" placeholder="<?= $text_user_confirm_email ?> *" name="CEmail" id="CEmail" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-12" for="PhoneNumber"> <?= $text_user_phone_number ?> : </label>
                                <label class="control-label col-sm-12">
                                    <input type="text" class="form-control" placeholder="<?= $text_user_phone_number ?> *" name="PhoneNumber" id="PhoneNumber" maxlength="11" required />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label col-sm-5" for="GroupId"> <?= $text_user_group ?> : </label>
                                <label class="control-label col-sm-9">
                                    <select class="form-control" name="GroupId" id="GroupId">
                                        <option class="hidden" value=""> <?= $text_group_select ?> </option>
                                        <option value="1"> <?= $text_group_1 ?> </option>
                                        <option value="2"> <?= $text_group_2 ?> </option>
                                        <option value="2"> <?= $text_group_3 ?> </option>
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