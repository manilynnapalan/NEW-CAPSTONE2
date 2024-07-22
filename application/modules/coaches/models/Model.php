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

    function getAllVenue(){
        $this->db->from('venue');
        return $this->db->get()->result();
    }

    function check_duplicate($where){
        $this->db->from('venue');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function check_time_conflict($where){
        $this->db->select('e.*,i.*,e.id event_id');
        $this->db->from('events e');
        $this->db->join('information i','i.account_id = e.coach_id');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function getAthletes($where){
        $this->db->from('accounts a');
        $this->db->join('information i','i.account_id = a.id');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    function getEventById($where){
        $this->db->from('events');
        $this->db->where($where);
        return $this->db->get()->row();
    }
    
    function getScuaaGames($where){
        $this->db->from('scuaa_games');
        $this->db->where($where);
        return $this->db->get()->result();
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

    function getDocumentation($where){
        $this->db->select('p.*,i.*,p.id post_id');
        $this->db->from('posts p');
        $this->db->join('information i','i.account_id = p.post_account_id');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getPlayersBySport($where){
        $this->db->from('information i');
        $this->db->join('accounts a','i.account_id = a.id');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function playerDetailsByRow($table,$where){
        $this->db->select('a.*,i.*,ms.firstname ms_fname,ms.lastname ms_lname,ms.middle_initial ms_mi,ms.address ms_license,ms.birthdate ms_validity');
        $this->db->from($table);
        $this->db->join('accounts a','i.account_id = a.id');
        $this->db->join('information ms','ms.account_id = i.medical_staff','left');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function getScuaaGamesByRow($table,$where){
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row();
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
