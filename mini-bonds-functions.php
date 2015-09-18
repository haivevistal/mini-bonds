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
    
     /* 
        @mini_bonds_savepost
    */
    function mini_bonds_savepost($name, $post) {
        if( isset($post) ) {
            $this->mini_bonds_save_session($name, $post);
        }
    }
    
    /* add new people in capsulecrm via PHP API library */
    function mini_bonds_add_people_to_crm2() {
        
        require_once( plugin_dir_path( __FILE__ ).'lib/api/Services_Capsule/Services/Capsule.php' );
        include_once( plugin_dir_path( __FILE__ ).'lib/config.php' );
        
        try {
            $capsule = new Services_Capsule($config['appName'], $config['token']);
            
            $people  = $capsule->party->people->getAll($config['partyId']);
            
            
        } catch (Services_Capsule_Exception $e) {
            print_r($e);
            die();
        }
        var_dump($people);
    }
    
    /* add new people in capsulecrm via custom curl */
    function mini_bonds_add_people_to_crm() {
        
        include_once( plugin_dir_path( __FILE__ ).'lib/config.php' );
        
        /* get session post variables */
        $form1 = $this->mini_bonds_get_session('form1');
        $form2 = $this->mini_bonds_get_session('form2');
        $form3 = $this->mini_bonds_get_session('form3');
        
        $myxml="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
        <person>\n
            <title>".$form1['settitle']."</title>\n
            <firstName>".$form1['firstname']."</firstName>\n
            <lastName>".$form1['surname']."</lastName>\n
            <jobTitle>Customer</jobTitle>\n
            <organisationName>".$config['organizationName']."</organisationName>\n
            <contacts>
                <email>
                    <type>Home</type>
                    <emailAddress>".$form1['email']."</emailAddress>
                </email>
                <phone>
                    <type>Home</type>
                    <phoneNumber>".$form1['homephone']."</phoneNumber>
                </phone>
                <phone>
                    <type>Mobile</type>
                    <phoneNumber>".$form1['mobilephone']."</phoneNumber>
                </phone>
                <address>
                    <type>Home</type>
                    <street>".$form2['street']."</street>\n
                    <city>".$form2['city']."</city>\n
                    <state>".$form2['country']."</state>\n
                    <zip>".$form2['postcode']."</zip>\n
                    <country>".$form2['country']."</country>\n
                </address>
            </contacts>
            <about></about>\n
        </person>";

        $capsulepage =  'https://'.$config['appName'].'.capsulecrm.com/api/person';

        $ch = curl_init($capsulepage);

        $options = array(CURLOPT_USERPWD => $config['token'].':x',
                    CURLOPT_HTTPHEADER => array('Content-Type: application/xml'),
                    CURLOPT_HEADER => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $myxml
                        );
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $responseInfo = curl_getinfo($ch);
        curl_close($ch);
    }
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
