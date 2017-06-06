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
class Educational_attainments extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('educational_attainment_model');
    }

    public function index_get()
    {
        $educational_attainment_id = $this->uri->segment(3);
        // $employee = $this->employee_model->get_by(['id' => $employee_id]);
        $educational_attainment = $this->educational_attainment_model->get_all();

        if (isset($educational_attainment['id'])) {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $educational_attainment
            ]);
        } else {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $educational_attainment
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post() {
        $post = $this->input->post();
        $last_id = $this->educational_attainment_model->insert($post);
        var_dump($last_id);
    }
}
