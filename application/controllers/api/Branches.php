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
class Branches extends REST_Controller {

    /**
    * Some description here
    *
    * @param       param
    * @return      return
    */

    function __construct()
    {
        parent::__construct();
        $this->load->model('branch_model');
    }

    public function index_get()
    {
        $branch_id = $this->uri->segment(3);

        if ( ! empty($branch_id) ) {
            $branch = $this->branch_model->get_by(['id' => $branch_id]);
        } else {
            $branch = $this->branch_model->get_all();
        }

        if (isset($branch['id'])) {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $branch
            ]);
        } else {
            $this->response([
                'status'  => 'success',
                'message' => 'Successfully get data!',
                'result'    => $branch
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post() {
        $post = $this->input->post();
        $last_id = $this->branch_model->insert($post);
        var_dump($last_id);
    }
}
