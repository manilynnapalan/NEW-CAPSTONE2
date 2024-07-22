<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {

    function CheckAccount($table,$where){
        $this->db->from($table.' a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where($where);
        return $this->db->get()->row();
    }
    
    function getAllEvents($where){
        $this->db->select('e.*,i.*,e.id event_id');
        $this->db->from('events e');
        $this->db->join('information i','i.account_id = e.coach_id');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function getAthletes($where){
        $this->db->from('accounts a');
        $this->db->join('information i','i.account_id = a.id');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function getAllData($table){
        $this->db->from($table);
        return $this->db->get()->result();
    }
    
    function getEventById($where){
        $this->db->from('events');
        $this->db->where($where);
        return $this->db->get()->row();
    }
    
    function getEvents($where){
        $this->db->from('events');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function getAttendancesByEventId($where){
        $this->db->from('attendances');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function getAllSurveys(){
        $this->db->from('surveys_to_answer');
        return $this->db->get()->result();
    }
    
    function checkSurvey($where){
        $this->db->from('athletes_surveys');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getDocumentation($where){
        $this->db->select('p.*,i.*,p.id post_id');
        $this->db->from('posts p');
        $this->db->join('information i','i.account_id = p.post_account_id');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function insertData($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    function update($table,$data,$where){
        $this->db->where($where);
        return $this->db->update($table,$data);
    }

    function deleteData($table,$where){
        $this->db->where($where);
        return $this->db->delete($table);
    }

}
