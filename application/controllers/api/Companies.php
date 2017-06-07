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
        $this->load->library('form_validation');
    }

    public function index_get()
    {
        $company_id = $this->uri->segment(3);

        $response = [
            'status'  => 'failed',
            'result'  => null,
            'message' => lang('not_found')
        ];

        $http_code = REST_Controller::HTTP_NOT_FOUND;

        $company = ( ! empty($company_id)) ? $this->company_model->get_company_by(['companies.id' => $company_id]) : $this->company_model->get_company_all();

        if ( ! empty($company))
        {
            $response = [
                'status'  => 'success',
                'result'  => $company,
                'message' => lang('success_retrieve')
            ];

            $http_code = REST_Controller::HTTP_OK;
        }

        $this->response($response, $http_code);
    }

    public function index_put()
    {
        $data = remove_unknown_field($this->put(), $this->form_validation->get_field_names('company_put'));
        $this->form_validation->set_data($data);

        if ($this->form_validation->run('company_put') != false)
        {
            $company_id = $this->company_model->insert($data);

            if ( ! $company_id)
            {
                $response = [
                    'status'  => 'failed',
                    'result'  => NULL,
                    'message' => lang('unabled_to_create')
                ];

                $http_code = REST_Controller::HTTP_INTERNAL_SERVER_ERROR;
            }

            $response = [
                'status'  => 'success',
                'result'  => $company_id,
                'message' => lang('success_create')
            ];

            $http_code = REST_Controller::HTTP_OK;
        }
        else
        {
            $response = [
                'status'  => 'failed',
                'result'  => $this->form_validation->get_errors_as_array(),
                'message' => lang('form_input_incomplete')
            ];

            $http_code = REST_Controller::HTTP_BAD_REQUEST;
        }

        $this->response($response, $http_code);
    }

    public function index_post()
    {
        $company_id = $this->uri->segment(3);
        $company = $this->company_model->get_by(['id' => $company_id]);

        if (isset($company['id']))
        {
            $data = remove_unknown_field($this->post(), $this->form_validation->get_field_names('company_post'));

            dump($data);
            
            $this->form_validation->set_data($data);

            if ($this->form_validation->run('company_post') != FALSE)
            {
                $updated = $this->company_model->update($company_id, $data);

                if ( ! $updated)
                {
                    $this->response([
                        'status'  => 'failed',
                        'message' => 'An unexpected error occurred while trying to update the company.',
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                else
                {
                    $this->response([
                        'status'  => 'success',
                        'message' => 'Successfully updated company.',
                    ], REST_Controller::HTTP_OK);
                }

            }
            else
            {
                $this->response([
                    'status'  => 'failed',
                    'message' => $this->form_validation->get_errors_as_array()
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        // else
        // {
        //     $this->response([
        //         'status'  => 'failed',
        //         'message' => 'The specified company could not be found.'
        //     ], REST_Controller::HTTP_NOT_FOUND);
        // }
    }
}
