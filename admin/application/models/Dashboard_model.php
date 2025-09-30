<?php
class Dashboard_model extends CI_Model
{

    public function dashboard_all()
    {
        
        
        $data[0] =  $this->today_du_order();    
        $data[1] =  $this->today_du_qty();
        $data[2] =  $this->last_month_du();
        $data[3] =  $this->last_month_du_qty();
        $data[4] =  $this->today_ref();
        $data[5] =  $this->today_refl_qty();
        $data[6] =  $this->today_chemist_enrolled();
        $data[7] =  $this->last_month_enrolled();
        $data[8] =  $this->today_chemist_data();
        $data[9] =  $this->last_month_enrolled_data();
        $data[10] = $this->frequently_refilled();
        return $data;
    }
        
    public function today_du_order()
    {
        $this->db->select('count(DISTINCT order_number) as display_order_taken_today');
        $this->db->where('order_type','DU');
        $this->db->where('oi_date',date('Y-m-d'));
        // $this->db->where('user_id',$user_id);
        $this->db->group_by('order_number');
        return $this->db->get('ordered_items')->row_array();

        
    }

    public function today_du_qty()
    {

        $this->db->select('SUM(quantity) as display_product_qty_today');
        $this->db->where('order_type','DU');
        $this->db->where('oi_date',date('Y-m-d'));
        // $this->db->where('user_id',$user_id);
        $this->db->group_by('order_number');
    return  $this->db->get('ordered_items')->row_array();       
    }

    public function last_month_du()
    {   
        $where = 'order_type = "DU"  AND   oi_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) 
  AND oi_date <= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 1 MONTH)), INTERVAL 0 DAY)';
        $this->db->select('count(DISTINCT order_number) as display_order_taken_month');
        $this->db->where($where);
        $this->db->group_by('order_number');
    return  $this->db->get('ordered_items')->row_array();       

    }
    public function last_month_du_qty()
    {   
        $where = 'order_type = "DU"  AND  oi_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) 
  AND oi_date <= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 1 MONTH)), INTERVAL 0 DAY)';
        $this->db->select('SUM(quantity) as display_product_qty_month');
        $this->db->where($where);
        $this->db->group_by('order_number');
    return  $this->db->get('ordered_items')->row_array();       

    }


    public function today_ref()
    {
        $this->db->select('count(DISTINCT order_number) as refill_order_taken_today');
        $this->db->where('order_type','REFL');
        $this->db->where('oi_date',date('Y-m-d'));
        // $this->db->where('user_id',$user_id);
        $this->db->group_by('order_number');
    return  $this->db->get('ordered_items')->row_array();
    }

    public function today_refl_qty()
    {
        $this->db->select('SUM(quantity) as refill_product_qty_today');
        $this->db->where('order_type','REFL');
        $this->db->where('oi_date',date('Y-m-d'));
        // $this->db->where('user_id',$user_id);
        $this->db->group_by('order_number');
    return  $this->db->get('ordered_items')->row_array();
    }

    public function today_chemist_enrolled()
    {
        $this->db->select('count(id) as chemists_enrolled_today');
        $this->db->where('date',date('Y-m-d'));
        $this->db->where('status',2);
        // $this->db->where('merchandiser_id',$user_id);
        return $this->db->get('chemist')->row_array();
    }


    public function last_month_enrolled()
    {

        $where = 'date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) 
  AND date <= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 1 MONTH)), INTERVAL 0 DAY)  and status = 2';
        $this->db->select('COUNT(id) as chemists_enrolled_month');
        $this->db->where($where);
    return  $this->db->get('chemist')->row_array();

    }

    public function today_chemist_data()
    {
        $this->db->select('count(id) as chemists_added_today');
        $this->db->where('date',date('Y-m-d'));
        // $this->db->where('merchandiser_id',$user_id);
        return $this->db->get('chemist')->row_array();
    }

    public function last_month_enrolled_data()
    {

            $where = 'date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) 
  AND date <= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 1 MONTH)), INTERVAL 0 DAY) ';
        $this->db->select('COUNT(id) as chemists_added_month');
        $this->db->where($where);
    return  $this->db->get('chemist')->row_array();
        # code...
    }

    public function frequently_refilled()
    {
        return $this->db->query('SELECT p.name,sum(oi.quantity) as total FROM `ordered_items` as oi
join product as p on p.id = oi.prod_id

group by oi.prod_id ')->result_array();
    }


}

?>