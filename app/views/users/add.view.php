<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">
    <!-- Add Employees Information -->
    <div class="container register">
        <div class="row">
            <div class="col-md-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading"><?= $text_add_employee ?></h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-sm-2" for="name"><?= $text_employee_name ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="address"><?= $text_employee_address ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Address *" name="address" id="address" required />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="age"><?= $text_employee_age ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="age" id="age" min="23" max="45" required />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="control-label col-sm-3" for="gender"><?= $text_employee_gender ?></label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" id="gender" value="1" checked>
                                                <span> <?= $text_employee_gender_male ?> </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" id="gender" value="2">
                                                <span><?= $text_employee_gender_female ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="salary"><?= $text_employee_salary ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="salary" id="salary" step="0.01" min="1500" max="7000" required />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="tax"><?= $text_employee_tax ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="tax" id="tax" step="0.01" min="1" max="5" required />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="shift"><?= $text_shift ?></label>
                                        <label class="control-label col-sm-9">
                                            <select class="form-control" name="shift" id="shift">
                                                <option class="hidden" value="">  <?= $text_shift_select ?></option>
                                                <option value="1"><?= $text_shift_full ?></option>
                                                <option value="2"><?= $text_shift_part ?></option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="notes" for="notes" class="col-sm-3 control-label"><?= $text_notes ?></label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="notes" id="notes" for="notes"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btnRegister"  value="<?= $text_button_add ?>"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>