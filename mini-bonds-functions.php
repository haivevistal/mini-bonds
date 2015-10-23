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

        $zoho = unserialize(get_option( 'mini_bond_zoho_details', '' ));
        $owner = $zoho['owner'] == '' ? 'BSEDGE' : $zoho['owner'];
        $group = $zoho['group'] == '' ? 'Home' : $zoho['group'];
        $token = $zoho['token'] == '' ? $config['zoho_token'] : $zoho['token'];
        /* get session post variables */
        $form1 = $this->mini_bonds_get_session('form1');
        $form2 = $this->mini_bonds_get_session('form2');
        $form3 = $this->mini_bonds_get_session('form3');
        $investment = $this->mini_bonds_get_session('investment_details');
        //$form5 = $this->mini_bonds_get_session('form5');
        $myxml='<Contacts>
            <row no="1">
                <FL val="Contact Owner">'.$owner.'</FL>
                <FL val="Salutation">'.$form1['settitle'].'</FL>
                <FL val="Account Name">'.$group.'</FL>
                <FL val="First Name">'.$form1['firstname'].'</FL>
                <FL val="Last Name">'.$form1['surname'].'</FL>
                <FL val="Email">'.$form1['email'].'</FL>
                <FL val="Title">Customer</FL>
                <FL val="Department"></FL>
                <FL val="Phone">'.$form1['homephone'].'</FL>
                <FL val="Home Phone">'.$form1['homephone'].'</FL>
                <FL val="Mobile">'.$form1['mobilephone'].'</FL>
                <FL val="Date of Birth">'.$form1['setmonth'].'/'.$form1['birthdayday'].'/'.$form1['birthdayyear'].'</FL>
                <FL val="Mailing House Number">'.$form2['housenumber'].'</FL>
                <FL val="Mailing City">'.$form2['city'].'</FL>
                <FL val="Mailing Street">'.$form2['street'].'</FL>
                <FL val="Mailing Zip">'.$form2['postcode'].'</FL>
                <FL val="Mailing Country">'.$form2['addresscountry'].'</FL>
                <FL val="Username">'.$form1['email'].'</FL>
                <FL val="Password">'.md5($form3['password']).'</FL>
                <FL val="Security Question">'.$form3['securityquestion'].'</FL>
                <FL val="Security Answer">'.$form3['securityanswer'].'</FL>
                <FL val="Net Worth">'.$form3['networth'].'</FL>
                <FL val="Fund Source">'.$form3['fundsource'].'</FL>
                <FL val="Other Fund Source"></FL>
                <FL val="Investment Details">'.$investment.'</FL>
            </row>
            </Contacts>';
            
            /*$myxml2='<Contacts>
            <row no="1">
                <FL val="Contact Owner">'.$owner.'</FL>
                <FL val="Salutation">'.$form1['settitle'].'</FL>
                <FL val="Account Name">'.$group.'</FL>
                <FL val="First Name">'.$form1['firstname'].'</FL>
                <FL val="Last Name">'.$form1['surname'].'</FL>
                <FL val="Email">'.$form1['email'].'</FL>
                <FL val="Title">Customer</FL>
                <FL val="Department"></FL>
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
                <FL val="Password">'.md5($form3['password']).'</FL>
                <FL val="Security Question">'.$form3['securityquestion'].'</FL>
                <FL val="Security Answer">'.$form3['securityanswer'].'</FL>
                <FL val="Net Worth">'.$form3['networth'].'</FL>
                <FL val="Fund Source">'.$form3['fundsource'].'</FL>
                <FL val="Other Fund Source">'.$form3['otherfundsource'].'</FL>
                <FL val="Investment Details">'.$investment.'</FL>
                <FL val="Total Amount">'.$form5['total_amount'].'</FL>
                <FL val="Payment Method">'.$form5['payment_method'].'</FL>
                <FL val="Payment Currency">'.$form5['payment_currency'].'</FL>
                <FL val="Card Charge">'.$form5['card_charge'].'</FL>
                <FL val="Type of Card">'.$form5['card_type'].'</FL>
                <FL val="Card Holder Name">'.$form5['card_holder_name'].'</FL>
                <FL val="Card Number">'.$form5['card_number'].'</FL>
                <FL val="Expiry Date">'.$form5['expirymonth'].'/'.$form5['expiryyear'].'</FL>
                <FL val="Card Security Code">'.$form5['security_code'].'</FL>
            </row>
            </Contacts>';*/
        
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
        
        $zoho = unserialize(get_option( 'mini_bond_zoho_details', '' ));
        $token = $zoho['token'] == '' ? $config['zoho_token'] : $zoho['token'];
        
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
        $zoho = unserialize(get_option( 'mini_bond_zoho_details', '' ));
        $token = $zoho['token'] == '' ? $config['zoho_token'] : $zoho['token'];
        
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
    
    function createLoginPage() {
        $the_page_title = 'Mini Bond Login';
        $the_page_name = 'mini-bond-login';
        $the_page = get_page_by_title( $the_page_title );
        
        if ( ! $the_page ) {
            $_p = array();
            $_p['post_title'] = $the_page_title;
            $_p['post_content'] = "[mini-bond-login]";
            $_p['post_status'] = 'publish';
            $_p['post_type'] = 'page';
            $_p['comment_status'] = 'closed';
            $_p['ping_status'] = 'closed';
            $_p['post_category'] = array(1);
            $the_page_id = wp_insert_post( $_p );
        } else {
            $the_page_id = $the_page->ID;
            $the_page->post_status = 'publish';
            $the_page_id = wp_update_post( $the_page );
        }
    }
    
    function sendPayment() {
        $register_url = $this->mini_bonds_get_session('register_url');
        $form1 = $this->mini_bonds_get_session('form1');
        $form2 = $this->mini_bonds_get_session('form2');
        $form3 = $this->mini_bonds_get_session('form3');
        $form4 = $this->mini_bonds_get_session('form4');
        $form5 = $this->mini_bonds_get_session('form5');
        $agent_id = '10034';
        $secret_in_key = 'SECRET_IN_KEY_25OwnQasw7z9Xh7V5qLA6s2RV0S6885Qix2nHrPx';
        /*$string = 'agent_name='.$form5['card_holder_name'].''.$secret_in_key.'agentid=10034'.$secret_in_key.'amount='.$form5['total_amount'].''.$secret_in_key.'buy_currency='.$form5['payment_currency'].''.$secret_in_key.'title='.$form1['settitle'].''.$secret_in_key.'name='.$form1['firstname'].' '.$form1['surname'].''.$secret_in_key.'';
        $hash_values = strtoupper( hash("sha512", $string ) );*/
        
        $address = ''; $address2 = '';
        if( !empty($form2['housenumber']) ) {
            $address .= $form2['housenumber'];
            $address2 .= $form2['housenumber'];
        }
        if( !empty($form2['street']) ) {
            $address .= ', '.$form2['street'];
        }
        if( !empty($form2['street2']) ) {
            $address2 .= ', '.$form2['street2'];
        }
        if( !empty($form2['city']) ) {
            $address .= ', '.$form2['city'];
            $address2 .= ', '.$form2['city'];
        }
        
        $url = 'https://gcen.i-dash.co.uk/Public/Payment';
        
        $param_string = 'PaymentType='.$form5['card_type'].'&Name='.$form5['card_holder_name'].'&Address1='.$address.'&Address2='.$address2.'&PostCode='.$form2['postcode'].'&CountryCode=UK';
        
        $param = array('ClientId' => 100, 'Currency' => $form5['payment_currency'], 'Amount' => $form5['total_amount'], 'ReturnUrl' => $register_url.'5/', 'PaymentType' => $form5['card_type'], 'Name' => $form5['card_holder_name'], 'Address1' => $address, 'Address2' => $address2, 'PostCode' => $form2['postcode'], 'CountryCode' => 'UK' );

        $postData = json_encode($param);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param_string );
        $result = curl_exec($ch);
        curl_close($ch);
        $array = json_decode($result);
        //echo json_encode($param);
        var_dump($array);
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
