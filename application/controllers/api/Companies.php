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
class Companies extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
    }

    public function index_get()
    {
        $company_id = $this->uri->segment(3);
        // $employee = $this->employee_model->get_by(['id' => $employee_id]);
        // $company = $this->company_model->get_all();
        $company = $this->response($this->db->get('companies')->result());

        if (isset($company['id'])) {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $company
            ]);
        } else {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $company
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post() {
        $post = $this->input->post();
        $last_id = $this->company_model->insert($post);
        var_dump($last_id);
    }
}
