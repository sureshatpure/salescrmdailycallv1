<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_DB_active_record extends CI_DB_active_record
{
	public function foo()
	{
		echo 'foobar';
	}




public function where_in_int_array($key, $values)
 {
  return $this->_where_in_int($key, $values);
 }
 
// This is a copy of the _where_in() fuction in system/database/DB_active_rec.php
// With the $this->ar_wherein[] value changed
protected function _where_in_int($key = NULL, $values = NULL, $not = FALSE, $type = 'AND ')
 {
  if ($key === NULL OR $values === NULL)
  {
   return;
  }

  if ( ! is_array($values))
  {
   $values = array($values);
  }

  $not = ($not) ? ' NOT' : '';

  foreach ($values as $value)
  {
   //$this->ar_wherein[] = $this->escape($value); //this is where the problem comes from
   $this->ar_wherein[] = $value; //this is our fix
  }

  $prefix = (count($this->ar_where) == 0) ? '' : $type;

  $where_in = $prefix . $this->_protect_identifiers($key) . $not . " IN (" . implode(", ", $this->ar_wherein) . ") ";

  $this->ar_where[] = $where_in;
  if ($this->ar_caching === TRUE)
  {
   $this->ar_cache_where[] = $where_in;
   $this->ar_cache_exists[] = 'where';
  }

  // reset the array for multiple calls
  $this->ar_wherein = array();
  return $this;
 } 
 

}
/* End of file MY_DB_active_rec.php */
/* Location: ./application/core/MY_DB_active_rec.php */
