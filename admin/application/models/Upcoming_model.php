<?php 

class Upcoming_model extends CI_Model
{
	public function viewbatches()
	{

		$this->db->select('course.*,syllabus.*,ub.*');
		$this->db->from('upcoming_batches as ub');
		$this->db->join('course','course.c_id = ub.c_id');
		$this->db->join('syllabus','syllabus.s_id = ub.s_id');
		return $this->db->get()->result_array();
	}

	public function viewcourses($ctype)
	{

		$this->db->where('ctype',$ctype);
	return	$this->db->get('course')->result_array();
	}

	public function viewsyllabus($cid)
	{
		$this->db->where('c_id',$cid);
		$this->db->where('status',1);
	return	$this->db->get('syllabus')->result_array();
	}

	public function save_batches_data($data)
	{
		$this->db->insert('upcoming_batches',$data);
	}

	public function getWeekendName($w1,$w2)
	{

		 		$this->db->where('w_id',$w1);
		$week1 = $this->db->get('weeks')->row_array();

		if($w2!=0)
		{
				 $this->db->where('w_id',$w2);
		$week2 = $this->db->get('weeks')->row_array();

		}else
		{
			$week2['wname']='';
		}

		 	$d = ($week2['wname'] !='') ? 'To'.$week2['wname'] : '';
		return $week1['wname'].$d;
	}

	public function get12ZoneTime($time)
	{
		$time_in_12_hour_format  = date("g:i a", strtotime("13:30"));
		return $time_in_12_hour_format;
	}
	public function deleteBatches($b_id)
	{
		$this->db->where('b_id',$b_id);
		$this->db->delete('upcoming_batches');
		
	}

	public function getSingleBatch($b_id)
	{
		$this->db->select('course.*,syllabus.*,ub.*');
		$this->db->from('upcoming_batches as ub');
		$this->db->join('course','course.c_id = ub.c_id');
		$this->db->join('syllabus','syllabus.s_id = ub.s_id');		
		$this->db->where('b_id',$b_id);
	return 	$this->db->get()->row_array();
	}

	public function updateBatches($data)
	{
		$this->db->where('b_id',$data['b_id']);
		$this->db->update('upcoming_batches',$data);
	}

	public function checkBatcheExist($c_id,$s_id,$b_id)
	{

		if($b_id=='')
		{
			$this->db->where('c_id',$c_id);
			$this->db->where('s_id',$s_id);
			$data =	$this->db->get('upcoming_batches')->row_array();
			if(count($data)>0)
			{
				return false;
			}else
			{
				return true;
			}
		}else
		{

			$this->db->where('c_id',$c_id);
			$this->db->where('s_id',$s_id);
			$this->db->where('b_id !=',$b_id);
			
			$data =	$this->db->get('upcoming_batches')->row_array();
			if(count($data)>0)
			{
				return false;
			}else
			{
				return true;
			}
		}
	}
}

?>