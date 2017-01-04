<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_payment_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    public function insert($data){
        $this->db->insert('user_payment',array('user_id'=>$data['username'],'book_id'=>$data['bookname'],'issue_date'=>  date('Y-m-d',  strtotime($data['issue_date'])),'renew_date'=>  date('Y-m-d',  strtotime($data['renew_date'])),'payment_date'=>  date('Y-m-d',  strtotime($data['payment_date'])),'amount'=>$data['amount']));    
    }
    
    public function select(){
        $this->db->select('*');
        $this->db->from('user_payment');
        $this->db->join('user','user_payment.user_id=user.user_id');
        $this->db->join('book', 'user_payment.book_id=book.book_id');
        return $this->db->get()->result_array();
    }
    
    public function select_id($user_payment_id){
        $this->db->select('*');
        $this->db->from('user_payment');
        $this->db->where('user_payment_id',$user_payment_id);
        return $this->db->get()->row_array();
    }
    
    public function update($data,$user_payment_id){
        $this->db->update('user_payment',array('user_id'=>$data['username'],'book_id'=>$data['bookname'],'issue_date'=>$data['issue_date'],'renew_date'=>$data['renew_date'],'payment_date'=>$data['payment_date'],'amount'=>$data['amount']),array('user_payment_id'=>$user_payment_id));
    }
    
    public function delete($user_payment_id){
        $this->db->delete('user_payment',array('user_payment_id'=>$user_payment_id));   
    }
}
?>

