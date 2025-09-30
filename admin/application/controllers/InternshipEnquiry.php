<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InternshipEnquiry extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InternshipEnquiryModel');
    }

    public function index()
    {
        $data['title'] = 'Internship Enquiry';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('InternshipEnquiry/internship_enquiry', $data);
        // $this->load->view('Technology/technology');
    }


    public function fetchDatafromDatabase()
    {
        $resultList = $this->InternshipEnquiryModel->fetchAllData('*', 'internship_enquiry_details', array(), 'id', 'DESC');

        $result = array();
        $button = '';
        $i = 1;
        foreach ($resultList as $key => $value) {
            $button .= '<a class="btn-sm btn-success text-light" onclick="editFun(' . $value['id'] . ')" href="#"><i class="fas fa-edit"></i></a> ';
            $button .= '<a class="btn-sm btn-danger text-light" onclick="deleteFun(' . $value['id'] . ')" href="#"><i class="fas fa-trash"></></a>';

            $result['data'][] = array(
                $i++,
                $value['name'],
                $value['email'],
                $value['mobile'],
                $value['whatsapp'],
                $value['location'],
                $value['subject'],
                $value['date'],
                $value['status'],
                $value['enquiry_revert'],
                $button
            );
            $button = '';
        }
        echo json_encode($result);
    }


    public function getEditData()
    {
        $id = $this->input->post('id');
        $resultData = $this->InternshipEnquiryModel->fetchSingleData('*', 'internship_enquiry_details', array('id' => $id));
        echo json_encode($resultData);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $revert_response = $this->input->post('revert_response');
        $data = array(
            'status' => $status,
            'enquiry_revert' => $revert_response
        );

       

       
        $update = $this->InternshipEnquiryModel->updateData('internship_enquiry_details', $data, array('id' => $id));

        
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
        $dataDelete = $this->InternshipEnquiryModel->deleteData('internship_enquiry_details', array('id' => $id));
        echo json_encode($dataDelete ? 1 : 2);
    }


}