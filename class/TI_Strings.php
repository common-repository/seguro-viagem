<?php 
  
  namespace RTI;

  class TI_Strings { 
    use PublicVars;

    public function __construct($domain){
      $this->domain = $domain;
    }

    public function load($locale){
      $locale_file = WP_URL_PLUGIN . '/locale' . $locale . '.php';
      if(file_exists($locale_file)){
        $this->vars = include($locale_file); 
      }
    }
  }