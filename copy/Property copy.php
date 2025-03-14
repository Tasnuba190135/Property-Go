<?php
include_once 'DbConnector.php'; // Ensure database connection is included

class Property
{
    public $conn;

    // Class properties with default values corresponding to tbl_property columns.
    public $property_id = 0;
    public $status = 0;
    public $user_id = 0;
    public $note_ids = "";
    public $sold_to = 0;
    public $property_type = "";
    public $created = "";
    public $updated = "";

    /**
     * Constructor: Initializes the database connection.
     */
    public function __construct()
    {
        $this->ensureConnection();
    }

    /**
     * Ensures that a database connection is established.
     */
    public function ensureConnection()
    {
        if (!$this->conn) {
            $db = new DbConnector();
            $db->connect();
            $this->conn = $db->getConnection();
        } else {
            return 0;
        }
    }

    /**
     * Create minimal tbl_property with only the property_id column if it does not exist.
     *
     * @return void
     */
    public function createTableMinimal()
    {
        $this->ensureConnection();
        $sql = "CREATE TABLE IF NOT EXISTS tbl_property (
                    property_id INT AUTO_INCREMENT PRIMARY KEY
                ) ENGINE=InnoDB";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "Minimal table 'tbl_property' created successfully.<br>";
        } else {
            echo "Error creating minimal table 'tbl_property': " . mysqli_error($this->conn) . "<br>";
        }
    }

    /**
     * Alter table tbl_property to add additional columns.
     *
     * Each query is defined as a map entry where the key is a number and the value is an array:
     * [column name, SQL query].
     * 
     * @param array|null $selectedNums Optional array of keys. If provided, only those queries run.
     * @return void
     */
    public function alterTableAddColumns($selectedNums = null)
    {
        $this->ensureConnection();
        $table = "tbl_property";
        $alterQueries = [
            1 => ['status',         "ALTER TABLE $table ADD COLUMN status INT NOT NULL"],
            2 => ['user_id',        "ALTER TABLE $table ADD COLUMN user_id INT"],
            3 => ['note_ids',        "ALTER TABLE $table ADD COLUMN note_ids TEXT"],
            4 => ['sold_to',        "ALTER TABLE $table ADD COLUMN sold_to INT"],
            5 => ['property_type',  "ALTER TABLE $table ADD COLUMN property_type VARCHAR(50)"],
            6 => ['created',        "ALTER TABLE $table ADD COLUMN created TIMESTAMP DEFAULT CURRENT_TIMESTAMP"],
            7 => ['updated',        "ALTER TABLE $table ADD COLUMN updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"]
        ];
        
        // If a subset of queries is provided, filter the map.
        if ($selectedNums !== null && is_array($selectedNums)) {
            $filteredQueries = [];
            foreach ($selectedNums as $num) {
                if (isset($alterQueries[$num])) {
                    $filteredQueries[$num] = $alterQueries[$num];
                }
            }
            $alterQueries = $filteredQueries;
        }
        // Execute each query.
        foreach ($alterQueries as $num => $queryInfo) {
            list($colName, $sql) = $queryInfo;
            $result = mysqli_query($this->conn, $sql);
            if ($result) {
                echo "Column '$colName' added successfully to table '$table' (Key: $num).<br>";
            } else {
                echo "Error adding column '$colName' to table '$table' (Key: $num): " . mysqli_error($this->conn) . "<br>";
            }
        }
    }

    /**
     * Insert a new property record.
     * The 'created' and 'updated' columns are auto-generated by the database.
     *
     * @return int|false Returns inserted property_id on success, false on failure.
     */
    public function insert()
    {
        $this->ensureConnection();
        $sql = "INSERT INTO tbl_property (status, user_id, note_id, sold_to, property_type)
                VALUES (
                    $this->status,
                    $this->user_id,
                    '$this->note_ids',
                    $this->sold_to,
                    '$this->property_type'
                )";
        if (mysqli_query($this->conn, $sql)) {
            $this->property_id = mysqli_insert_id($this->conn);
            return $this->property_id;
        } else {
            echo "Insert failed: " . mysqli_error($this->conn) . "<br>";
            return false;
        }
    }
        /**
     * SetValue a property record by property_id.
     * 
     * @return bool|string Returns true if the property is found, or an error message otherwise.
     */
    public function setValue()
    {
        $property_id = $this->property_id;
        $sql = "SELECT * FROM tbl_property WHERE property_id = $property_id LIMIT 1";
        $result = mysqli_query($this->conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $this->status = $row['status'];
            $this->user_id = $row['user_id'];
            $this->note_ids = $row['note_ids'];
            $this->sold_to = $row['sold_to'];
            $this->property_type = $row['property_type'];
            $this->created = $row['created'];
            $this->updated = $row['updated'];
            return true;
        } else {
            return "No record found for property_id: $property_id";
        }
    }


    /**
     * Update an existing property record based on property_id.
     *
     * @return bool|string|integer Returns true if update is successful, or an error message.
     */
    public function update()
    {
        if ($this->property_id == 0) {
            return "Property ID is not set. Cannot update.";
        }
        $sql = "UPDATE tbl_property SET
                    status = $this->status,
                    user_id = $this->user_id,
                    note_ids = '$this->note_ids',
                    sold_to = $this->sold_to,
                    property_type = '$this->property_type'
                WHERE property_id = $this->property_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "Property record updated successfully.<br>";
            return true;
        } else {
            return "Error updating record: " . mysqli_error($this->conn);
        }
    }
}
?>
