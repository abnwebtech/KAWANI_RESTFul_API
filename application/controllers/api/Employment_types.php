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
class Employment_types extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('employment_type_model');
    }

    public function index_get()
    {
        $employment_type_id = $this->uri->segment(3);
        // $employee = $this->employee_model->get_by(['id' => $employee_id]);
        $employment_type = $this->employment_type_model->get_all();

        if (isset($employment_type['id'])) {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $employment_type
            ]);
        } else {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $employment_type
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post() {
        $post = $this->input->post();
        $last_id = $this->employment_type_model->insert($post);
        var_dump($last_id);
    }
}
