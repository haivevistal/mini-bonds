<?php
/* mini-bonds registration */
function minibond_registration($atts) {
    
    $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

    $count_segments = count($segments) - 1;

    $step = is_numeric( $segments[ $count_segments ] ) ? $segments[ $count_segments ] : '1';
    
    $minibonds_helper = new MiniBondsHelper;
    
    $pageid = get_the_ID();
    
    $register_url = get_page_link($pageid);
    
    $minibonds_helper->mini_bonds_save_session( 'register_url', $register_url );

    if( $step == '1' ) {
        if( isset($_POST['step1']) ) {
            
            $res = $minibonds_helper->mini_bonds_check_if_exist_zoho_crm($_POST['email']);
            if( $res->error->code ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">'.$res->error->message.'</div>';
            } else if( $res->result->Contacts->row->FL ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">Record with the same email already exists.</div>';
            } else {
                $minibonds_helper->mini_bonds_save_session('form1', $_POST );
                $minibonds_helper->mini_bonds_save_session( 'step1', 'success' );
                $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
            }
        }
        minibond_registration_step1();
        
    } else if( $step == '2' ) {
        
        if( isset($_POST['step2']) ) {
            $minibonds_helper->mini_bonds_save_session('form2', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step2', 'success' );
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'3/' );
        }
        
        if( $minibonds_helper->mini_bonds_get_session('step1') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url );
        }
        minibond_registration_step2();
        
    } else if( $step == '3' ) {
        
        if( isset($_POST['step3']) ) {
            $minibonds_helper->mini_bonds_save_session('form3', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step3', 'success' );
            $res = $minibonds_helper->mini_bonds_add_people_to_zoho_crm();
            if( $res->error->code ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">'.$res->error->message.'</div>';
            } else {
                echo '<div class="col-xs-12 col-md-12 alert alert-success">'.$res->error->message.'</div>';
                $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'4/' );
            }
        }
        
        if( $minibonds_helper->mini_bonds_get_session('step2') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
        }
        minibond_registration_step3();
        
    } else if( $step == '4' ) {
        if( isset($_POST['step4']) ) {
            $minibonds_helper->mini_bonds_save_session('form4', $_POST);
            $minibonds_helper->mini_bonds_save_session( 'step4', 'success' );
            $res = $minibonds_helper->loginUser($_POST['email'], $_POST['password']);
            if( $res == NULL ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">Error: Email or Password is incorrect.</div>';
            } else {
                $details = $res->Contacts->row->FL;
                $zemail = trim($details[3]->content);
                $zpass = trim($details[4]->content);
                
                if ( is_user_logged_in() ) {
                    wp_logout();
                }
                
                $exist_id = username_exists( $zemail );
                if( !$exist_id and email_exists( $zemail ) == false ) {
                    /* create new user and login it in wordpress */
                    $user_id = wp_create_user( $zemail, $zpass, $zemail );
                    $user = get_user_by( 'id', $user_id ); 
                    if( $user ) {
                        /*$curr_user=  new WP_User( $user_id , $user->user_login );*/
                        wp_set_current_user( $user_id, $user->user_login );
                        wp_set_auth_cookie( $user_id, true );
                        do_action( 'wp_login', $user->user_login );
                        $creds = array();
                        $creds['user_login'] = $user->user_login;
                        $creds['user_password'] = $zpass;
                        $creds['remember'] = true;
                        $user = wp_signon( $creds, false );
                        echo 'created and logged';
                    }
                } else {
                    /* login the user in wordpress */
                    $user = get_user_by( 'login', $zemail );
                    $user_id = $user->ID;
                    $user = get_user_by( 'id', $user_id );
                    if( $user ) {
                        /*$curr_user=  new WP_User( $user_id , $user->user_login ); */
                        wp_set_current_user( $user_id, $user->user_login );
                        wp_set_auth_cookie( $user_id, true );
                        do_action( 'wp_login', $user->user_login );
                        $creds = array();
                        $creds['user_login'] = $user->user_login;
                        $creds['user_password'] = $zpass;
                        $creds['remember'] = true;
                        $user = wp_signon( $creds, false );
                    }
                    if ( is_user_logged_in() ) {
                        echo 'user logged';
                        var_dump($user);
                    }
                }
            }
        }
        
        if( $minibonds_helper->mini_bonds_get_session('step3') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'3/' );
        }
        minibond_registration_step4();
    } else if( $step == '5' ) {
        if( isset($_POST['step5']) ) {
            $minibonds_helper->mini_bonds_save_session('form5', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step5', 'success' );
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'4/' );
        }
        minibond_registration_investment_process();
    } else if( $step == '6' ) {
        if( isset($_POST['step6']) ) {
            $minibonds_helper->mini_bonds_save_session('form6', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step6', 'success' );
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'5/' );
        }
        minibond_registration_questionnaire();
    } else {
        if( isset($_POST['step1']) ) {
            $minibonds_helper->mini_bonds_save_session('form1', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step1', 'success' );
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
        }
        minibond_registration_step1();
        
    }
}