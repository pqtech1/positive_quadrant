<?php

class IndustriesModel extends CI_Model
{
    /**
     * Inserts data into the 'industries' table.
     *
     * @param array $data Array of data to be inserted.
     * @return bool TRUE if the query was successful, FALSE otherwise.
     */
    public function createData($data)
    {
        return $this->db->insert('industries', $data);
    }

    /**
     * Fetches all data from a table with optional where conditions and ordering.
     *
     * @param string $data Columns to select.
     * @param string $tablename Name of the table to query.
     * @param array $where Array of where conditions.
     * @param string $orderBy Column to order by.
     * @param string $orderType Order direction ('ASC' or 'DESC').
     * @return array Result set as an array of associative arrays.
     */
    public function fetchAllData($data, $tablename, $where, $orderBy = '', $orderType = 'ASC')
    {
        $this->db->select($data)
            ->from($tablename)
            ->where($where);

        // Add ordering if specified
        if (!empty($orderBy)) {
            $this->db->order_by($orderBy, $orderType);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetches a single row of data based on the where conditions.
     *
     * @param string $data Columns to select.
     * @param string $tablename Name of the table to query.
     * @param array $where Array of where conditions.
     * @return array Single row of data as an associative array.
     */
    public function fetchSingleData($data, $tablename, $where)
    {
        $query = $this->db->select($data)
            ->from($tablename)
            ->where($where)
            ->get();
        return $query->row_array();
    }

    /**
     * Updates data in the specified table based on where conditions.
     *
     * @param string $tablename Name of the table to update.
     * @param array $data Array of data to be updated.
     * @param array $where Array of where conditions.
     * @return bool TRUE if the update was successful, FALSE otherwise.
     */
    public function updateData($tablename, $data, $where)
    {
        return $this->db->update($tablename, $data, $where);
    }

    /**
     * Deletes data from the specified table based on where conditions.
     *
     * @param string $tablename Name of the table to delete from.
     * @param array $where Array of where conditions.
     * @return bool TRUE if the delete was successful, FALSE otherwise.
     */
    public function deleteData($tablename, $where)
    {
        return $this->db->delete($tablename, $where);
    }

    /**
     * Inserts dynamic data into a specified table.
     *
     * @param string $tablename Name of the table to insert into.
     * @param array $data Array of data to be inserted.
     * @return bool TRUE if the insert was successful, FALSE otherwise.
     */
    public function insertDynamicData($tablename, $data)
    {
        return $this->db->insert($tablename, $data);
    }
}
