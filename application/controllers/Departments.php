<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here...
 *
 * @package     KAWANI
 * @subpackage  subpackage
 * @category    category
 * @author      joseph.gono@systemantech.com
 * @link        http://systemantech.com
 */
class Departments extends CI_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'departments component';
    }

    public function add()
    {
        echo 'add new department';
    }
}