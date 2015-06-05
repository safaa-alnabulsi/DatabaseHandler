<?php

/**
 * This interface is for functions with database
 *
 * @author Safaa AlNabulsi
 */
interface Database
{

    /**
     * connect to database
     */
    public function connect();

    /**
     * Close the connection with database 
     */
    public function close();

    /**
     * Select from mysql database
     * @param string $table name of the table
     * @param string $columns names of the columns we want to query
     * @param string $where condition
     * @param string $order order by
     * @return boolean|array holds the result of the excuted query
     */
    public function select($table, $columns = '*', $where = null, $order = null);

    /**
     * insert given values to the given table
     * @param string $table name of the table
     * @param array $rows array holds the values 
     * @param string $columns names of the columns we want to insert the value to
     * @return boolean
     */
    public function insert($table, $rows, $columns = null);

    /**
     * Delete from a table in the database
     * @param string $table name of the table 
     * @param string $where condition
     * @return boolean
     */
    public function delete($table, $where = null);

    /**
     * Update a row in the database
     * @param string $table name of the table
     * @param string $values names of the columns we want to update its values
     * @param string|array $where condition
     * @return boolean
     */
    public function update($table, $values, $where);
}

?>
