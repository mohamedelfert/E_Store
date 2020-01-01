<div id="container">
    <div class="container-fluid">
        <div class="text-center">
            <form class="app_form" method="post" enctype="multipart/form-data">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"> <?= $text_edit_category ?> </h3>
                    <div class="row register-form">
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2" for="CatName"> <?= $text_category_name ?>  :  </label>
                            <label class="control-label col-sm-9">
                                <input type="text" class="form-control" placeholder="<?= $text_category_name ?> *" name="CatName" id="CatName" required value=""/>
                            </label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2" for="CatImage"> <?= $text_file ?>  :  </label>
                            <label class="control-label col-sm-9">
                                <input type="file" class="form-control" name="CatImage" id="CatImage" required />
                            </label>
                        </div>
                        <input type="submit" name="submit" class="btnRegister"  value="<?= $text_update ?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>