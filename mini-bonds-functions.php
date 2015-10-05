<?php
/*
    @class MiniBondsHelper
    @date 09/17/2015
    @author Coapperative
    Description: Helper class and functions for mini-bonds plugin.
*/
class MiniBondsHelper {
    
    /* 
        @mini_bonds_save_session 
    */
    function mini_bonds_save_session( $name, $value ) {
        /* global $wp_session;
        $wp_session[$name] = $value; */
        $_SESSION[$name] = $value;
    }
    
    /* 
        @mini_bonds_get_session 
        return @_SESSION[$name]
    */
    function mini_bonds_get_session($name) {
        /* global $wp_session; */
        return $_SESSION[$name];
    }
    
    /* 
        @mini_bonds_remove_session 
    */
    function mini_bonds_remove_session($name) {
        /* global $wp_session; */
        $_SESSION[$name] = '';
        unset($_SESSION[$name]);
    }
    
    /* function redirect url via js or php */
    function mini_bonds_redirect_url($type, $loc ) {
        if( $type == 'js') {
            echo '<script type="text/javascript">window.location.href="'.$loc.'";</script>';
        } else {
            wp_redirect( $loc, 301  ); exit;
        }
    }
    
    /* a helper function to add selected for selected option */
    function mini_bonds_is_selected($v1, $v2) {
        if( $v1 == $v2 ) {
            return 'selected="selected"';
        } else {
            return '';
        }
    }
    
    /* save details to Zoho CRM */
    function mini_bonds_add_people_to_zoho_crm() {
        include_once( plugin_dir_path( __FILE__ ).'lib/config.php' );
        $token = $config['zoho_token'];
        
        /* get session post variables */
        $form1 = $this->mini_bonds_get_session('form1');
        $form2 = $this->mini_bonds_get_session('form2');
        $form3 = $this->mini_bonds_get_session('form3');
        $myxml='<Contacts>
            <row no="1">
                <FL val="Contact Owner">BSEDGE</FL>
                <FL val="Salutation">'.$form1['settitle'].'</FL>
                <FL val="First Name">'.$form1['firstname'].'</FL>
                <FL val="Last Name">'.$form1['surname'].'</FL>
                <FL val="Email">'.$form1['email'].'</FL>
                <FL val="Title">Customer</FL>
                <FL val="Department">Home</FL>
                <FL val="Phone">'.$form1['homephone'].'</FL>
                <FL val="Home Phone">'.$form1['homephone'].'</FL>
                <FL val="Mobile">'.$form1['mobilephone'].'</FL>
                <FL val="Date of Birth">'.$form1['setmonth'].'/'.$form1['birthdayday'].'/'.$form1['birthdayyear'].'</FL>
                <FL val="Mailing House Number">'.$form2['housenumber'].'</FL>
                <FL val="Mailing City">'.$form2['city'].'</FL>
                <FL val="Mailing Street">'.$form2['street'].'</FL>
                <FL val="Mailing Zip">'.$form2['postcode'].'</FL>
                <FL val="Mailing Country">'.$form2['county'].'</FL>
                <FL val="Username">'.$form1['email'].'</FL>
                <FL val="Password">'.$form3['password'].'</FL>
                <FL val="Security Question">'.$form3['securityquestion'].'</FL>
                <FL val="Security Answer">'.$form3['securityanswer'].'</FL>
                <FL val="Net Worth">'.$form3['networth'].'</FL>
                <FL val="Fund Source">'.$form3['fundsource'].'</FL>
                <FL val="Other Fund Source">'.$form3['otherfundsource'].'</FL>
            </row>
            </Contacts>';
        
        $url = "https://crm.zoho.com/crm/private/xml/Contacts/insertRecords";
        $param= "authtoken=".$token."&scope=crmapi&newFormat=1&xmlData=".$myxml;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $xml = simplexml_load_string($result);
        return $xml;
    }
    
    function mini_bonds_check_if_exist_zoho_crm($email) {
        include_once( plugin_dir_path( __FILE__ ).'lib/config.php' );
        $token = $config['zoho_token'];
        
        $url = "https://crm.zoho.com/crm/private/xml/Contacts/getSearchRecordsByPDC";
        $param= "authtoken=".$token."&scope=crmapi&newFormat=1&selectColumns=Email&searchColumn=email&searchValue=".$email;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $xml = simplexml_load_string($result);
        return $xml;
    }
    
    function loginUser($user, $pass) {
        include_once( plugin_dir_path( __FILE__ ).'lib/config.php' );
        $token = $config['zoho_token'];
        
        $url = "https://crm.zoho.com/crm/private/json/Contacts/searchRecords";
        $param= "authtoken=".$token."&scope=crmapi&version=1&selectColumns=Contacts(Username,Password,First Name,Last Name)&criteria=((Email:".$user.")AND(Password:".$pass."))";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $array = json_decode($result);
        return $array->response->result;
    }

}

function programmatic_login($login_user, $login_pass) {
    $username   = $login_user;
    /* log in automatically */
    if ( is_user_logged_in() ) {
        wp_logout();
    }
    
    add_filter( 'authenticate', 'allow_programmatic_login', 10, 3 );
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] = $login_pass;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    remove_filter( 'authenticate', 'allow_programmatic_login', 10, 3 );
    
    if ( is_a( $user, 'WP_User' ) ) {
        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        if ( is_user_logged_in() ) {
            return true;
        }
    }

    return false;
}

function allow_programmatic_login( $user, $username, $password ) {
    return get_user_by( 'login', $username );
}

/* other scripts for ajax of postcodes */
add_action("wp_ajax_getaddress", "mini_bonds_getaddress");
add_action("wp_ajax_nopriv_getaddress", "mini_bonds_getaddress");

function mini_bonds_getaddress() {
    ob_end_clean();
    if( !wp_verify_nonce( $_REQUEST['nonce'], 'getukaddress' ) ) {
        echo json_encode( array('wrong_nonce', $_REQUEST['nonce'] ) );
        die();
    }
    $postcode = $_REQUEST['postcode'];
    $csv = file(  plugins_url( 'csv/uk_postcodes.csv', __FILE__ ) );
    $line_number = false;
    $foundline = array('address'=>'', 'city' => '', 'county' => '' );

    while (list($key, $line) = each($csv) and !$line_number) {
       $line_number = (strpos($line, $postcode) !== FALSE);
       $foundline = explode(',', str_replace('"', '', $line) );
    }
    if($line_number){
        echo json_encode( array('address'=>$foundline[5], 'city' => $foundline[6], 'county' => $foundline[8] ) );
    } else{
        echo json_encode( array('address'=>'', 'city' => '', 'county' => '' ) );
    }
    die();
}
