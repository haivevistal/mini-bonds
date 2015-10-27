<?php

function minibond_login($atts) {
    global $wpdb;
    global $current_user;
    $minibonds_helper = new MiniBondsHelper;
    
    if( isset($_POST['login']) ) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $minibonds_helper->mini_bonds_save_session( 'login_username', $email );
        $minibonds_helper->mini_bonds_save_session( 'login_password', $password );
        /* logout current logged in user */
        if ( is_user_logged_in() ) {
            //wp_logout();
        }
        $exist_id = username_exists( $email );
        
        if( !$exist_id and email_exists( $email ) == false ) {
            $logged = $minibonds_helper->loginUser( $email, md5($password) );
            if( $logged === NULL ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened.</div>';
            } else {
                /* create new user and login it in wordpress */
                $user_id = wp_create_user( $email, $password, $email );
                $user = get_user_by( 'id', $user_id ); 
                if( $user ) {
                    $creds  = array();
                    $creds ['user_login'] = $email;
                    $creds ['user_password'] = $password;
                    $creds ['remember'] = true;
                 
                    $curr_user = wp_signon( $creds , true );
                    if ( is_wp_error($curr_user) ) {
                        echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened. Please try again.</div>';
                    } else {
                        /*$curr_user=  new WP_User( $user_id , $user->user_login );*/
                        wp_set_auth_cookie($user_id);
                        wp_set_current_user( $user_id, $user->user_login );
                        do_action( 'wp_login', $user->user_login );
                    }
                }
            }
        } else {
            if ( !is_user_logged_in() ) {
                /* login the user in wordpress */
                $user = get_user_by( 'login', $email );
                $user_id = $user->ID;
                if( $user ) {
                    /*$curr_user=  new WP_User( $user_id , $user->user_login ); */
                    $creds  = array();
                    $creds ['user_login'] = $email;
                    $creds ['user_password'] = $password;
                    $creds ['remember'] = true;
                 
                    $curr_user = wp_signon( $creds , true );
                    if ( is_wp_error($curr_user) ) {
                        echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened. Please try again.</div>';
                    } else {
                        wp_authenticate($email, $password);
                        wp_set_auth_cookie($user_id);
                        wp_set_current_user( $user_id, $user->user_login );
                        do_action( 'wp_login', $user->user_login );
                    }
                }
            } 
        }
    }
    if ( is_user_logged_in() ) {
        echo '<div class="col-xs-12 col-md-12 alert alert-success">Successful Logged in.</div>';
        //var_dump($current_user);
        //$minibonds_helper->mini_bonds_redirect_url('js', home_url().'/wp-admin/' );
    } else {
        $username = $minibonds_helper->mini_bonds_get_session( 'login_username' );
        $password = $minibonds_helper->mini_bonds_get_session( 'login_password' );
        
        $creds  = array();
        $creds['user_login'] = $username;
        $creds['user_password'] = $password;
        $creds['remember'] = true;
        $autologin_user = wp_signon( $creds, true );

        if ( is_wp_error($autologin_user) ) {
            echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened. Please try again.</div>';
        } else {
            header('Location: /wp-admin/');
        }
    }
    //wp_login_form();
    minibond_login_form();
}