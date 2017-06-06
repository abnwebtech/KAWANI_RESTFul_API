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
class Branch_model extends MY_Model {

    protected $_table = 'branches';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    /**
     * Callbacks or Observers
     */
    protected $before_create = ['generate_date_created_status'];

    protected function generate_date_created_status($branch)
    {
        $branch['created'] = date('Y-m-d H:i:s');
        $branch['active_status'] = 1;
        $branch['created_by'] = '0';
        return $branch;
    }
}
