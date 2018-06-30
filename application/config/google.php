<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '944697158785-pams5lla6du2pbs66p4abe5240fnp4c0.apps.googleusercontent.com';
$config['google']['client_secret']    = 'fi4V0qpINLNOnSSjIFIXO7Wu';
$config['google']['redirect_uri']     = base_url('').'user_authentication/';
$config['google']['application_name'] = 'Login to Apple Shop';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();