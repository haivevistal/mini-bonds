<?php
ini_set("max_execution_time", 0);

function minibond_admin_setting() {
    if( isset($_POST['save_mini_bond_setting'])) {
        $mini_bond_zoho_details = array( 'owner' => $_POST['owner'], 'group' =>  $_POST['group'], 'token' =>  $_POST['token'] );
        if( get_option( 'mini_bond_zoho_details', '' ) == '' ) {
            add_option( 'mini_bond_zoho_details', serialize($mini_bond_zoho_details) );
           $updates = '<span class="alert alert-success alert-message">&emsp;Successfully Saved</span></h2>';
        } else {
            update_option( 'mini_bond_zoho_details', serialize($mini_bond_zoho_details) );
            $updates = '<span class="alert alert-success">&emsp;Successfully Updated</span></h2>';
        }
    }
    ?>
    <link href="<?php echo plugins_url( 'assets/bootstrap/css/bootstrap.min.css', __FILE__ ); ?>" type="text/css" rel="stylesheet" />
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="setting-title">MINI BOND SETTINGS</h1>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="mini-bonds-setting">
                <?php  $zoho = unserialize(get_option( 'mini_bond_zoho_details', '' )); ?>
                <div class="col-xs-12 col-md-11">
                    <div class="form-group">
                        <label for="owner">Mini-Bond Company: <span class="red">*</span>
                        <br /><small style="color:red;">This is the zoho user. To view the list of users, login as super admin in zoho, follow the instructions for confirming the user and then come back here and <a href="https://crm.zoho.com/crm/ShowSetup.do?tab=usersPermi&subTab=users" target="_blank">click this link</a>. After you see put the user name in the below input field.</small>
                        </label>
                        <input type="text" class="form-control" id="owner" name="owner" data-parsley-required="true" data-parsley-error-message="This is a required field" value="<?php echo $zoho['owner']; ?>" placeholder="Berkely Holmes" required />
                    </div>
                    <div class="form-group">
                        <label for="group">Mini-bond Name: <br /><small style="color:red;">This is the zoho account name that represent for departments of a company. To view the list of accounts, login to your new user in zoho and come back here and <a href="https://crm.zoho.com/crm/ShowTab.do?module=Accounts" target="_blank">copy this link</a>, and open it in a browser where your new standard user logged in. Create New Account and add the Account Name in the input field below.</small></label>
                        <input type="text" class="form-control" id="group" name="group" data-parsley-required="true" data-parsley-error-message="This is a required field" value="<?php echo $zoho['group']; ?>" placeholder="My Account 1" required />
                    </div>
                    <div class="form-group">
                        <label for="token">Token: <br /><small style="color:red;">To generate token, login into your new standard zoho account and come back on this page and <a target="_blank" href="https://accounts.zoho.com/apiauthtoken/create?SCOPE=ZohoCRM/crmapi">copy this link</a> and open it in a browser where your new standard user logged in. Then copy the AUTHTOKEN and paste it on below input field.</small></label>
                        <input type="text" class="form-control" id="token" name="token" data-parsley-required="true" data-parsley-error-message="This is a required field" value="<?php echo $zoho['token']; ?>" placeholder="f5c2c439e4c1e2d7ded53aa2b8fc3a77" required />
                    </div>
                </div>
                <div class="col-xs-12 col-md-11 pull-left">
                    <input type="submit" name="save_mini_bond_setting" class="btn btn-primary continue" value="Save" />
                </div>
            </form>
        </div>
    </div>
    <?php
}