<?php
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model'); // Load the Login model
    }

    // Display the login form
    public function index()
    {
        $data['title'] = 'Login';
        $data['mast_load'] = 'MLOAD';
        $data['message'] = '';

        $this->load->view('Login/login', $data);
    }

    // Handle form submission for login
    public function submit()
    {
        $this->form_validation->set_rules('empl_email', 'Email-id', 'required', [
            'required' => 'Email-id is required.',
        ]);
        $this->form_validation->set_rules('empl_password', 'Password', 'required', [
            'required' => 'Password field is required.',
        ]);

        if ($this->form_validation->run() == false) {
            $this->index(); // Reload the login form with validation errors
        } else {
            $email = $this->input->post('empl_email');
            $password = $this->input->post('empl_password');

            // Check credentials using the model
            $check = $this->Login_model->check($email, $password);

            if ($check === 'success') {
                // Redirect to the dashboard on successful login
                redirect('Dashboard');
            } else {
                // Show error message on login failure
                $data['title'] = 'Login';
                $data['mast_load'] = 'MLOAD';
                $data['message'] = 'Invalid Email-id or password.';
                $this->load->view('Login/login', $data);
            }
        }
    }

    // Show the Change Password form
    public function change_password()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('Login'); // If not logged in, go back to login
        }

        $data['title'] = 'Change Password';
        $data['mast_load'] = 'MLOAD';
        $data['message'] = '';
        $this->load->view('Login/change_password', $data);
    }

    // Handle password update
    public function update_password()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('Login');
        }

        // Validate current password
$this->form_validation->set_rules('current_password', 'Current Password', 'required', [
    'required' => 'Current password is required.',
]);

// Validate new password
$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[18]|regex_match[/^(?=.*[0-9])(?=.*[\W]).+$/]', [
    'required' => 'New password is required.',
    'min_length' => 'New password must be at least 6 characters.',
    'max_length' => 'New password cannot be more than 18 characters.',
    'regex_match' => 'New password must have at least one number and one special character.',
]);

// Validate confirm password
$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]', [
    'required' => 'Confirm password is required.',
    'matches' => 'Confirm password must match new password.',
]);


        if ($this->form_validation->run() == FALSE) {
            $this->change_password();
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            $username = $this->session->userdata('username'); // Get username from session

            // Verify current password
            $user = $this->Login_model->get_user_by_username($username);

            if ($user && password_verify($current_password, $user['password'])) {
                // Password matches, update it
                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
                $this->Login_model->update_password($username, $hashed_new_password);

                $this->session->set_flashdata('success', 'Password changed successfully.');
                redirect('Login/change_password');
            } else {
                // Current password incorrect
                $data['title'] = 'Change Password';
                $data['mast_load'] = 'MLOAD';
                $data['message'] = 'Current password is incorrect.';
                $this->load->view('Login/change_password', $data);
            }
        }
    }


    // Logout and destroy session
    public function logout()
    {
        $this->session->unset_userdata('is_logged_in');
        $this->session->sess_destroy(); // <- Correct in CodeIgniter
        redirect('Login');
    }


    // One-time function to hash all existing passwords
    // public function hash_passwords()
    // {
    //     $this->load->model('Login_model');
    //     echo $this->Login_model->hash_all_passwords();
    // }
}
?>