<?php
class Courses_model extends CI_Model
{

	public function viewcourses()
	{
		return $this->db->get('course')->result_array();
	}

	public function delete_course($id)
	{
		$this->db->where('c_id',$id);
		$this->db->delete('course');

		$this->db->where('c_id',$id);
		$this->db->delete('syllabus');

	
	}

	public function view_single_course($id)
	{
		$this->db->where('c_id',$id);
		return $this->db->get('course')->row_array();
	}

	public function save_course($data)
	{
		$this->db->insert('course',$data);
	}
	
	public function update_course($data)
	{
		$this->db->where('c_id',$data['c_id']);
		$this->db->update('course',$data);
	}

	public function check_course_exist($cname,$ctype,$c_id)
	{
		if($c_id == 'true')
		{

		$this->db->where('ctype',$ctype);
		$this->db->where('cname',$cname);
		$data =	$this->db->get('course')->row_array();
		
			if(count($data)>0)
			{
				return false;
			}else
			{
				return true;
			}
		}
		else{
			$this->db->where('ctype',$ctype);
			$this->db->where('cname',$cname);
			$this->db->where('c_id !=',$c_id);
			$data = $this->db->get('course')->row_array();
			if(count($data)>0)
			{
				return false;
			}else
			{
				return true;
			}
		}
	}


	public function check_syllabus_exist($course_id,$syllabus,$ctype,$s_id)
	{
		if($s_id == 'true')
		{
			$this->db->where('c_id',$course_id);
			$this->db->where('sname',$syllabus);
		 	$this->db->where('ctype',$ctype);
		 	$this->db->where('status',1);
		$data =  	$this->db->get('syllabus')->row_array();
			
			if(count($data)>0)
			{
				return false;
			}else{
				return true;
			}

		}else{

			$this->db->where('c_id',$course_id);
			$this->db->where('sname',$syllabus);
			$this->db->where('s_id != ',$s_id);
			$this->db->where('ctype',$ctype);
			$this->db->where('status',1);
		$data =	$this->db->get('syllabus')->row_array();

			if(count($data)>0)
			{
				return false;
			}else
			{
				return true;
			}
		}
	}

	public function viewsyllabus($course_id)
	{
			$this->db->where('c_id',$course_id);
			$this->db->where('status',1);
		return $this->db->get('syllabus')->result_array();
	}

	public function save_syllabusss($data)
	{
		$this->db->insert('syllabus',$data);
	}

	public function delete_syllabus($s_id)
	{
		$this->db->where('s_id',$s_id);
		$this->db->delete('syllabus');
	}

	public function view_single_syllabus($s_id)
	{
		$this->db->where('s_id',$s_id);
		$this->db->where('status',1);
	return	$this->db->get('syllabus')->row_array();

	}
		
	public function update_syllabusss($data)
	{
		$this->db->where('s_id',$data['s_id']);
		$this->db->update('syllabus',$data);
	}	
}

?>