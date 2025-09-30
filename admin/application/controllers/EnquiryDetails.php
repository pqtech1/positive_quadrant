<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EnquiryDetails extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EnquiryDetailsModel');
    }

    public function index()
    {
        $data['title'] = 'Enquiry Details';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('EnquiryDetails/enquiry_details', $data);
        // $this->load->view('Technology/technology');
    }

    
    public function fetchDatafromDatabase()
    {
        $resultList = $this->EnquiryDetailsModel->fetchAllData('*', 'enquiry', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#">Edit</a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#">Delete</a>';

            $result['data'][] = array(
                $i++,
                $value['name'],
                $value['email'],
                $value['phone'],
                $value['service'],
                $value['message'],
                $value['submission_origin'],
                $value['status'],
                $value['follow_up'],
                $value['creation_date'],
                $button
            );
            $button = '';
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->EnquiryDetailsModel->fetchSingleData('*', 'enquiry', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $follow_up = $this->input->post('follow_up');
        
        $data = array(
           'status' => $status,
           'follow_up' => $follow_up,
        );

        
        $update = $this->EnquiryDetailsModel->updateData('enquiry', $data, array('id' => $id));

      
        if ($update) {
            log_message('info', 'Record with ID ' . $id . ' successfully updated.');
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            log_message('error', 'Failed to update record with ID ' . $id);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
        }
    }
    public function deleteSingleData()
    {
        $id = $this->input->post('id');
        $dataDelete = $this->EnquiryDetailsModel->deleteData('enquiry', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}