<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Adm_model extends CI_Model {

    function CheckAccount($table,$where){
        $this->db->from($table.' a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function getSchoolYear(){
        $this->db->from('active_school_year');
        $this->db->where('id',1);
        return $this->db->get()->row();
    }

    function getAllRowsByUsertype($where){
        $this->db->from('accounts a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getAllAthletesSurvey($table,$where){
        $this->db->from($table.' t1');
        $this->db->join('information i','i.account_id = t1.account_id');
        $this->db->join('surveys_to_answer sta','t1.survey_id = sta.id');
        $this->db->join('events e','e.id = sta.event_id','left');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getRowsBySports($sports){
        $this->db->from('accounts a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where('i.sports',$sports);
        $this->db->where('a.usertype',3);
        return $this->db->get()->result();
    }
    
    function getAttendancesByEventId($where){
        $this->db->from('attendances');
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
        $this->db->from('events e');
        $this->db->join('information i','e.coach_id = i.account_id');
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
    
    function getEventsByCoachID($where){
        $this->db->from('events');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function getDocumentation(){
        $this->db->select('p.*,i.*,p.id post_id');
        $this->db->from('posts p');
        $this->db->join('information i','i.account_id = p.post_account_id');
        return $this->db->get()->result();
    }

    function checkDuplicateData($table,$data){
        $this->db->from($table);
        $this->db->where($data);
        return $this->db->get()->result();
    }

    function getCoachInfoBySport($where){
        $this->db->from('accounts a');
        $this->db->join('information i','a.id = i.account_id');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function getAllSPorts(){
        $this->db->from('sports');
        return $this->db->get()->result();
    }

    function getAllEventsFooter(){
        $this->db->from('events e');
        $this->db->join('information i','e.coach_id = i.account_id');
        $this->db->join('sports s','s.sport_name = i.sports');
        return $this->db->get()->result();
    }

    function getAllSurveys(){
        $this->db->from('surveys_to_answer sta');
        $this->db->join('events e','e.id = sta.event_id','left');
        return $this->db->get()->result();
    }

    function insertData($table,$accounts_data){
        $this->db->insert($table,$accounts_data);
        return $this->db->insert_id();
    }

    function updateData($table,$data,$where){
        $this->db->where($where);
        return $this->db->update($table,$data);
    }

    function deleteData($table,$where){
        $this->db->where($where);
        return $this->db->delete($table);
    }
}
