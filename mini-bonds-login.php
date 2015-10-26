<?php

function minibond_login($atts) {
    global $wpdb;
    global $current_user;
    $minibonds_helper = new MiniBondsHelper;
    
    if( isset($_POST['login']) ) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        /* logout current logged in user */
        if ( is_user_logged_in() ) {
            wp_logout();
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
                    $login_data = array();
                    $login_data['user_login'] = $email;
                    $login_data['user_password'] = $password;
                    $login_data['remember'] = "true";
                 
                    $curr_user = wp_signon( $login_data, false );
                    if ( is_wp_error($curr_user) ) {
                        echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened. Please try again.</div>';
                    } else {
                        /*$curr_user=  new WP_User( $user_id , $user->user_login );*/
                        do_action( 'wp_login', $user->user_login );
                        wp_set_current_user( $user_id, $user->user_login );
                        wp_set_auth_cookie( $user_id, true );
                    }
                }
            }
        } else {
            /* login the user in wordpress */
            $user = get_user_by( 'login', $email );
            $user_id = $user->ID;
            $user = get_user_by( 'id', $user_id );
            if( $user ) {
                /*$curr_user=  new WP_User( $user_id , $user->user_login ); */
                $login_data = array();
                $login_data['user_login'] = $email;
                $login_data['user_password'] = $password;
                $login_data['remember'] = true;
             
                $user_verify = wp_signon( $login_data, false );
                if ( is_wp_error($user_verify) ) {
                    echo '<div class="col-xs-12 col-md-12 alert alert-danger">Oops! There was an error happened. Please try again.</div>';
                } else {
                    $secure_cookie = is_ssl();

                    $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, $login_data);
                    add_filter('authenticate', 'wp_authenticate_cookie', 30, 3);

                    $curr_user = wp_authenticate($login_data['user_login'], $login_data['user_password']);
                    do_action( 'wp_login', $email, $curr_user );
                    wp_set_auth_cookie($user->ID, $login_data["remember"], $secure_cookie);
                    wp_set_current_user( $user_id, $email );
                }
            }
        }
        if ( is_user_logged_in() ) {
            echo '<div class="col-xs-12 col-md-12 alert alert-success">Successful Logged in.</div>';
            var_dump($current_user);
            //$minibonds_helper->mini_bonds_redirect_url('js', home_url().'/wp-admin/' );
        } else {
            auth_redirect();
        }
    }
    minibond_login_form();
}