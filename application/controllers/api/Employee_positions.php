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
class Employee_positions extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_position_model');
    }

    public function index_get()
    {
        $employee_position_id = $this->uri->segment(3);

        if ( ! empty($employee_position_id) ) {
            $employee_position = $this->employee_position_model->get_by(['id' => $employee_position_id]);
        } else {
            $employee_position = $this->employee_position_model->get_all();
        }

        if (isset($employee_position['id']))
        {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $employee_position
            ]);
        }
        else
        {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $employee_position
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        $post = $this->input->post();
        $last_id = $this->employee_position_model->insert($post);
        var_dump($last_id);
    }
}
