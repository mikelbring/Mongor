<?php

namespace Mongor;

class Model {

   /**
    * Database instance | config
    * 
    * @var \Mongor\MangoDB|null|string
    */
   protected $_db = 'default';

   /**
    * Active collection
    *
    * @var string
    */
   protected $_collection = '';

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


   /**
    * Insert a document
    *
    * @param  $insert
    * @param bool $options
    * @return MongoDB Object
    */
   public  function insert($insert, $options =  true)
   {
      return $this->_db->insert($this->_collection, $insert, $options);
   }

   /**
    * Get a single document
    *
    * @param  $get
    * @param array $fields
    * @return Mongodb Object
    */
   public function get($get, $fields = array())
   {
      return $this->_db->find_one($this->_collection, $get, $fields);
   }

   /**
    * Update a document
    *
    * @param  $criteria
    * @param  $update
    * @return null
    */
   public  function update($criteria, $update)
   {
      return $this->_db->update($this->_collection, $criteria, $update);
   }

   /**
    * Find documents
    * 
    * @param array $query
    * @param array $fields
    * @return array | MongoDB Object
    */
   public function find($query = array(), $fields = array())
   {
      $find =  $this->_db->find($this->_collection, $query, $fields);

      if($find->count()==0)
      {
         return array();
      }

      return $find;
   }

   /**
    * Delete a document
    *
    * @param  $criteria
    * @return null
    */
   public function delete($criteria)
   {
      return $this->_db->remove($this->_collection, $criteria, false);
   }

   /**
    * Set an index for collection
    * 
    * @param  $keys
    * @return null
    */
   public function set_index($keys)
   {
      return $this->_db->ensure_index($this->_collection, $keys);
   }
   
}