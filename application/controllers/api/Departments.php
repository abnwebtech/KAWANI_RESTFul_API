<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

/**
 * Some class description here...
 *
 * @package     KAWANI
 * @subpackage  subpackage
 * @category    category
 * @author      joseph.gono@systemantech.com
 * @link        http://systemantech.com
 */
class Departments extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('department_model');
    }

    public function index_get()
    {
        $department_id = $this->uri->segment(3);

        if ( ! empty($department_id) ) {
            $department = $this->department_model->get_by(['id' => $department_id]);
        } else {
            $department = $this->department_model->get_all();
        }

        if (isset($department['id']))
        {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $department
            ]);
        }
        else
        {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $department
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        $post = $this->input->post();
        $last_id = $this->department_model->insert($post);
        var_dump($last_id);
    }
}
