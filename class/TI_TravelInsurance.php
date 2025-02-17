<?php 
  
  namespace RTI;

  use RTI\TI_Template as Template;
  use RTI\TI_Strings as Strings;

  class TI_TravelInsurance {

    private $path     = null;
    private $pagehook = null;
    private $view     = null;
	  private $api = 'https://api.seguroviagem.srv.br/';
    private $domain   = 'travel-insurance';
    
    public function __construct( $path ) {
      global $post;
      $this->path = $path;
      
      $this->view = new Template();
   
      add_action( 'admin_menu', array( &$this, 'travelinsurance_admin_setup' ));
      add_action( 'admin_enqueue_scripts', array( &$this, 'include_admin_scripts_and_styles' ) );
      wp_enqueue_script('postbox');
      add_shortcode ( 'travelinsurance', array( &$this, 'process_shortcode') );    
    }
      
    public function include_admin_scripts_and_styles() {
      wp_enqueue_script( 'jquery' );
      wp_enqueue_script( 'jquery-admin', $this->path . 'assets/js/jquery-admin.js');
      wp_enqueue_style( 'preview', $this->path . 'assets/css/preview-admin.css');
    }

    public function travelinsurance_admin_setup() {
      $this->pagehook = add_menu_page( 
        __('Travel Insurance', 'travel-insurance'), 
        __('Travel Insurance', 'travel-insurance'), 
        'manage_options', 
        'travelinsurance', 
        array( &$this, 'travelinsurance_init' ), 
        $this->path . 'assets/images/icon.png', 
        25
      );       
    }

    public function travelinsurance_init() {  
      add_meta_box(
        'page_settings',
        __('Affiliates Program', 'travel-insurance'),
        array(&$this, 'page_settings'),
        $this->pagehook,
        'normal',
        'core'
      );
      
      wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );

      $this->view->title  = __('Real Travel Insurance Plugin', 'travel-insurance');
      
      echo $this->view->render('admin/content.php');
      
    } 

    public function page_settings() {
      
      // POST

      if ( !empty( $_POST['wp-travel-insurance-metas'] ) ) {
        $data['travel-insurance-token'] = sanitize_text_field( $_POST['wp-travel-insurance-metas']['travel-insurance-token'] );
        
        if(!empty($data['travel-insurance-token'])) {
          delete_option( '_travel_insurance_token' );
          $return = add_option( '_travel_insurance_token', $data );
        } else {
          $return = false;
        }

        if($return == true) {
          $this->view->message        = __('Success to enter data', 'travel-insurance');
          $this->view->class_message  = 'updated notice-success'; 
        } else {
          $this->view->message = __('Error to enter data', 'travel-insurance');
          $this->view->class_message  = 'notice-error';
        }

        $this->view->status = $return;
      }

      // GET
      $value = get_option( '_travel_insurance_token' );
      $this->view->token = maybe_unserialize( $value['travel-insurance-token'] );
      echo $this->view->render('admin/form.php');
    }

    public function process_shortcode($atts) {
      $value = get_option( '_travel_insurance_token' );
      $token = maybe_unserialize( $value['travel-insurance-token'] );       
      $this->view->token = $this->api . $token;

      if(!empty($token)) {
        echo $this->view->render('site/front.php');
      }
    }
  }