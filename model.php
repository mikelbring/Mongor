<?php

namespace Mongor;

class Model {
   
   protected $_db = 'default';
   protected $_collection = '';

   public static $instance;

   public function __construct($db = NULL)
   {
      if ($db !== NULL)
      {
         $this->_db = $db;
      }

      if (is_string($this->_db))
      {
         $this->_db = MongoDB::instance($this->_db);
      }

   }


   public  function insert($insert, $options =  true)
   {
      return $this->_db->insert($this->_collection, $insert, $options);
   }

   public function get($get, $fields = array())
   {
      return $this->_db->find_one($this->_collection, $get, $fields);
   }

   public  function update($criteria, $update)
   {
      return $this->_db->update($this->_collection, $criteria, $update);
   }

   public function find($query = array(), $fields = array())
   {
      $find =  $this->_db->find($this->_collection, $query, $fields);

      if($find->count()==0)
      {
         return array();
      }

      return $find;
   }

   public function delete($criteria)
   {
      return $this->_db->remove($this->_collection, $criteria, false);
   }

   public function set_index($keys)
   {
      return $this->_db->ensure_index($this->_collection, $keys);
   }

   public function generate_code($length = 6)
   {
      $code = strtolower(Text::random('alnum', $length));

      $check = $this->get(array('code' => $code), array('code'));

      if(!$check)
      {
         return $code;
      }

      return $this->generate_code();
   }


}