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
            
            //$res = $minibonds_helper->mini_bonds_check_if_exist_zoho_crm($_POST['email']);
            //if( $res->error->code ) {
            //    echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">'.$res->error->message.'</div>';
           // } else if( $res->result->Contacts->row->FL ) {
            //    echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">Record with the same email already exists.</div>';
           // } else {
                $minibonds_helper->mini_bonds_save_session('form1', $_POST );
                $minibonds_helper->mini_bonds_save_session( 'step1', 'success' );
                $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
           // }
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
            
            $f1 = $minibonds_helper->mini_bonds_get_session('form1');
            $f3 = $minibonds_helper->mini_bonds_get_session('form3');
            $zemail = trim($f1['email']);
            $zpass = trim($f3['password']);
            
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
                    return true;
                }
            }
            
            echo '<div class="col-xs-12 col-md-12 alert alert-success">'.$res->error->message.'</div>';
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'4/' );
            
        }
        
        if( $minibonds_helper->mini_bonds_get_session('step2') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
        }
        minibond_registration_step3();
        
    } else if( $step == '4' ) {
        if( isset($_POST['step4_a']) ) {
            $minibonds_helper->mini_bonds_save_session('form4_a', $_POST);
            $minibonds_helper->mini_bonds_save_session( 'step4', 'success' );
            
            $form4 = $minibonds_helper->mini_bonds_get_session( 'form4_a' );
            $d = 'Investor Type: '.$form4['investor_type'].', Accept Investment: '.$form4['accept_investment'].', How easily can you sell your bonds: '.$form4['how_easily_sell_bonds'].', Expected Return from Providence Bonds: '.$form4['return_providence_bond'].', Is your capital secure: '.$form4['capital_secure'].', Medium or Long-term Investment: '.$form4['short_or_long_term'];
            $minibonds_helper->mini_bonds_save_session('investment_details', $d);
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'5/' );
        }
        
        if( isset($_POST['step4_b']) ) {
            $minibonds_helper->mini_bonds_save_session('form4_b', $_POST);
            $minibonds_helper->mini_bonds_save_session( 'step4', 'success' );
            
            $form4 = $minibonds_helper->mini_bonds_get_session( 'form4_b' );
            $d = 'Investor Type: '.$form4['investor_type'].', Accept Investment: '.$form4['advised_investor'];
            $minibonds_helper->mini_bonds_save_session('investment_details', $d);
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'5/' );
        }
        
        if( isset($_POST['step4_c']) ) {
            $minibonds_helper->mini_bonds_save_session('form4_c', $_POST);
            $minibonds_helper->mini_bonds_save_session( 'step4', 'success' );
            
            $form4 = $minibonds_helper->mini_bonds_get_session( 'form4_c' );
            $d = 'Investor Type: '.$form4['investor_type'].', Accept Investment: '.$form4['self_certified_investor'];
            $minibonds_helper->mini_bonds_save_session('investment_details', $d);
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'5/' );
        }
        
        if( isset($_POST['step4_d']) ) {
            $minibonds_helper->mini_bonds_save_session('form4_d', $_POST);
            $minibonds_helper->mini_bonds_save_session( 'step4', 'success' );
            
            $form4 = $minibonds_helper->mini_bonds_get_session( 'form4_c' );
            $d = 'Investor Type: '.$form4['investor_type'].', Accept Investment: '.$form4['accept_high_net_investor_promotions'].', How easily can you sell your bonds: '.$form4['high_net_investor_how_easily_sell_bonds'].', Expected Return from Providence Bonds: '.$form4['high_net_investor_return_providence_bond'].', Is your capital secure: '.$form4['high_net_investor_capital_secure'].', Medium or Long-term Investment: '.$form4['high_net_investor_short_or_long_term'];
            $minibonds_helper->mini_bonds_save_session('investment_details', $d);
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'5/' );
        }
        
        if( $minibonds_helper->mini_bonds_get_session('step3') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'3/' );
        }
        minibond_registration_step4();
    } else if( $step == '5' ) {
        if( isset($_POST['step5']) ) {
            $minibonds_helper->mini_bonds_save_session('form5', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step5', 'success' );
            $res = $minibonds_helper->mini_bonds_add_people_to_zoho_crm();
            if( $res->error->code ) {
                echo '<div class="col-xs-12 col-md-12 alert alert-danger dismissable" style="margin-top:10px;">'.$res->error->message.'</div>';
            } else {
                echo '<div class="col-xs-12 col-md-12 alert alert-success dismissable" style="margin-top:10px;">Successful Creation.</div>';
            }
        }
        if( $minibonds_helper->mini_bonds_get_session('step4') !='success' ) {
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'4/' );
        }
        minibond_payment();
    } else {
        if( isset($_POST['step1']) ) {
            $minibonds_helper->mini_bonds_save_session('form1', $_POST );
            $minibonds_helper->mini_bonds_save_session( 'step1', 'success' );
            $minibonds_helper->mini_bonds_redirect_url('js', $register_url.'2/' );
        }
        minibond_registration_step1();
        
    }
}