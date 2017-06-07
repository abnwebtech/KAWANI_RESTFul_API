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
class Company_model extends MY_Model {

    protected $_table = 'companies';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    protected $before_create = ['generate_date_created_status'];

    protected function generate_date_created_status($company)
    {
        $company['created'] = date('Y-m-d H:i:s');
        $company['active_status'] = 1;
        $company['created_by'] = '0';
        return $company;
    }

    public function get_company_details($param) {

        $this->db->select('
                    company.registered_name as registered_name,
                    branch.name as branch_name,
                    branch.description as branch_description
                    ')
                ->from('companies as company')
                ->join('branches as branch', 'company.id = branch.id', 'left');

        return $this->get_by($param);
    }

    public function get_companies_with_details() {

        $this->db->select('
                    company.registered_name as registered_name,
                    branch.name as branch_name,
                    branch.description as branch_description
                    ')
                ->from('companies as company')
                ->join('branches as branch', 'company.id = branch.id', 'left');

        return $this->get_all();
    }
}
