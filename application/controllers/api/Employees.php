<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

/**
 * Some class description here...
 *
 * @package     KAWANI
 * @subpackage  subpackage
 * @category    category
 * @author      cristhian.kevin@systemantech.com
 * @link        http://systemantech.com
 */
class Employees extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        // test commit
    }

    /**
     * Some description here
     *
     * @param       param
     * @return      return
     */
    public function index_get()
    {
        $employee_id = $this->uri->segment(3);
        // $employee = $this->employee_model->get_by(['id' => $employee_id]);
        $employee = $this->employee_model->get_all();

        if (isset($employee['id'])) {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'data'    => $employee
            ]);
        } else {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'data'    => $employee
            ], REST_Controller::HTTP_OK);
        }
    }
  
    public function index_post() {
        $post = $this->input->post();
        $last_id = $this->employee_model->insert($post);
        var_dump($last_id);
    }
}
