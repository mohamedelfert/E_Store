<div id="container">
    <div class="main_div">

        <!-- Show Users Information -->
        <div class="show_info" style="width: 90%;">

            <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $title ?> </legend>

            <div class="col-md-12">
                <div class="col-sm-6 float-right margin-top">
                    <h1> <?= $text_profile_username ?> <?= $this->session->user->Username ?></h1>
                    <h1>
                        <?= $text_profile_avatar ?>
                        <img src="<?= $this->session->user->profile->Avatar ?>" width="100" height="100">
                    </h1>
                    <h1> <?= $text_profile_name ?> <?= $this->session->user->profile->FirstName . ' ' . $this->session->user->profile->LastName ?></h1>
                    <h1> <?= $text_profile_phone ?> <?= $this->session->user->PhoneNumber ?></h1>
                </div>
                <div class="col-sm-6 float-left margin-top">
                    <h1> <?= $text_profile_email ?> <?= $this->session->user->Email ?></h1>
                    <h1> <?= $text_profile_group ?> <?= $this->session->user->GroupName ?></h1>
                    <h1> <?= $text_profile_address ?> <?= $this->session->user->profile->Address ?></h1>
                    <h1> <?= $text_profile_date_of_birth ?> <?= $this->session->user->profile->DateOfBirth ?></h1>
                    <h1> <?= $text_profile_subscription_date ?> <?= $this->session->user->SubscriptionDate ?></h1>
                </div>
            </div>

        </div>

    </div>
</div>