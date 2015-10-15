<?php

function minibond_login($atts) {
    $minibonds_helper = new MiniBondsHelper;
    
    if( isset($_POST['login']) ) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        /* logout current logged in user */
        if ( is_user_logged_in() ) {
            wp_logout();
        }
        $logged = $minibonds_helper->loginUser( $email, md5($password) );
        if( $logged === NULL ) {
            echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened.</div>';
        } else {
            $exist_id = username_exists( $email );
            
            if( !$exist_id and email_exists( $email ) == false ) {
                /* create new user and login it in wordpress */
                $user_id = wp_create_user( $email, $password, $email );
                $user = get_user_by( 'id', $user_id ); 
                if( $user ) {
                    /*$curr_user=  new WP_User( $user_id , $user->user_login );*/
                    wp_set_current_user( $user_id, $user->user_login );
                    wp_set_auth_cookie( $user_id, true );
                    do_action( 'wp_login', $user->user_login );
                    $creds = array();
                    $creds['user_login'] = $user->user_login;
                    $creds['user_password'] = $password;
                    $creds['remember'] = true;
                    $user = wp_signon( $creds, false );
                }
            } else {
                /* login the user in wordpress */
                $user = get_user_by( 'login', $email );
                $user_id = $user->ID;
                $user = get_user_by( 'id', $user_id );
                if( $user ) {
                    /*$curr_user=  new WP_User( $user_id , $user->user_login ); */
                    wp_set_current_user( $user_id, $user->user_login );
                    wp_set_auth_cookie( $user_id, true );
                    do_action( 'wp_login', $user->user_login );
                    $creds = array();
                    $creds['user_login'] = $user->user_login;
                    $creds['user_password'] = $password;
                    $creds['remember'] = true;
                    $user = wp_signon( $creds, false );
                }
                if ( is_user_logged_in() ) {
                    return true;
                }
            }
        }
    }
    minibond_login_form();
}