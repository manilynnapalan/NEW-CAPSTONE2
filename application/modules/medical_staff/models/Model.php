<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {

    function CheckAccount($table,$where){
        $this->db->from($table.' a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function getAthletes($where){
        $this->db->from('accounts a');
        $this->db->join('information i','i.account_id = a.id');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getDataResult($table,$where,$order_name,$order_by){
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_name,$order_by);
        return $this->db->get()->result();
    }

    function update($table,$data,$where){
        $this->db->where($where);
        return $this->db->update($table,$data);
    }

}
