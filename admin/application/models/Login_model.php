<?php
class Login_model extends CI_Model
{
	// Function to check email and password for login
	public function check($email, $input_password)
	{
		// Fetch user by username
		$this->db->select('*');
		$this->db->where('username', $email);
		$this->db->from('admin_login');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$user = $query->row(); // Fetch the single user row

			// Verify the input password with the hashed password
			if (password_verify($input_password, $user->password)) {
				// Set session data
				$session_data = array(
					'is_logged_in' => true,
					'username' => $user->username, // Add additional session data as needed
				);
				$this->session->set_userdata($session_data);

				return 'success';
			} else {
				return 'unsuccess'; // Password does not match
			}
		} else {
			return 'unsuccess'; // Email not found
		}
	}

	// Function to hash all existing plain-text passwords
	public function hash_all_passwords()
	{
		// Fetch all records from admin_login
		$this->db->select('id, password');
		$query = $this->db->get('admin_login');

		foreach ($query->result() as $row) {
			// Check if the password is already hashed
			if (!password_get_info($row->password)['algo']) {
				// Hash the plain-text password
				$hashed_password = password_hash($row->password, PASSWORD_BCRYPT);

				// Update the hashed password in the database
				$this->db->where('id', $row->id);
				$this->db->update('admin_login', array('password' => $hashed_password));
			}
		}

		return "All passwords hashed successfully.";
	}


	// Fetch user by username
	public function get_user_by_username($username)
	{
		return $this->db->where('username', $username)
			->get('admin_login')
			->row_array();
	}

	// Update user's password
	public function update_password($username, $hashed_password)
	{
		return $this->db->where('username', $username)
			->update('admin_login', ['password' => $hashed_password]);
	}

}
?>