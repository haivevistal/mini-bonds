<?php
ob_clean();
ini_set("max_execution_time", 0);

function minibond_admin_setting() {
    if( isset($_POST['save_mini_bond_setting'])) {
        $mini_bond_zoho_details = array( 'owner' => $_POST['owner'], 'group' =>  $_POST['group'] );
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
                        <label for="owner">Zoho User/Owner: <span class="red">*</span></label>
                        <input type="text" class="form-control" id="owner" name="owner" data-parsley-required="true" data-parsley-error-message="This is a required field" value="<?php echo $zoho['owner']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="group">Zoho Group: <span class="red">*</span></label>
                        <input type="text" class="form-control" id="group" name="group" data-parsley-required="true" data-parsley-error-message="This is a required field" value="<?php echo $zoho['group']; ?>" />
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