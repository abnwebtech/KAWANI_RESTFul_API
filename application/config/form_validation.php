<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'company_put' => array(
        array(
            'field' => 'registered_name',
            'label' => 'Company Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'code',
            'label' => 'Company Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'description',
            'label' => 'Company Description',
            'rules' => 'trim|required'
        )
    ),

    'company_post' => array(
        array(
            'field' => 'registered_name',
            'label' => 'Company Name',
            'rules' => 'trim'
        ),
        array(
            'field' => 'code',
            'label' => 'Company Code',
            'rules' => 'trim'
        ),
        array(
            'field' => 'description',
            'label' => 'Company Description',
            'rules' => 'trim'
        )
    ),

    'branch_put' => array(
        array(
            'field' => 'name',
            'label' => 'Branch Name',
            'rules' => 'trim|required'
        )
    ),
);
