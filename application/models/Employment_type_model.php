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
class Employment_type_model extends MY_Model {

    protected $_table = 'employment_types';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    /**
     * Callbacks or Observers
     */
    protected $before_create = ['generate_date_created_status'];

    protected function generate_date_created_status($employment_type)
    {
        $employment_type['active_status'] = 1;
        //$employment_type['created'] = date('Y-m-d H:i:s');
        //$employment_type['created_by'] = '0';
        return $employment_type;
    }
}
