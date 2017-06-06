<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here...
 *
 * @package     KAWANI
 * @subpackage  subpackage
 * @category    category
 * @author      cristhian.kevin@systemantech.com
 * @link        http://systemantech.com
 */
class Company_model extends MY_Model {

    protected $_table = 'companies';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    /**
     * Callbacks or Observers
     */
    protected $before_create = ['generate_date_created_status'];

    protected function generate_date_created_status($company)
    {
        $company['created'] = date('Y-m-d H:i:s');
        $company['active_status'] = 1;
        $company['created_by'] = '0';
        return $company;
    }
}
