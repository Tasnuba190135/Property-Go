<?php
include_once 'DbConnector.php'; // Ensure database connection is included

class UserDetails
{
    public $conn;

    // Class properties with default values
    public $user_details_id = 0;
    public $status = 0;
    public $user_id = 0;
    public $full_name = "";
    public $contact_no = "";
    public $division = "";
    public $district = "";
    public $address = "";
    public $gender = "";
    public $nid_number = "";
    public $profile_picture_id = 0;
    public $nid_file_id = 0;
    public $other_document_file_id = 0;

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
            $db = new DatabaseConnector();
            $db->connect();
            $this->conn = $db->getConnection();
        }
    }

    /**
     * Create minimal tbl_user_details with only the user_details_id column if it does not exist.
     *
     * @return void
     */
    public function createTableMinimal()
    {
        $this->ensureConnection();
        $sql = "CREATE TABLE IF NOT EXISTS tbl_user_details (
                    user_details_id INT AUTO_INCREMENT PRIMARY KEY
                ) ENGINE=InnoDB";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "Minimal table 'tbl_user_details' created successfully.<br>";
        } else {
            echo "Error creating minimal table 'tbl_user_details': " . mysqli_error($this->conn) . "<br>";
        }
    }

    /**
     * Alter table tbl_user_details to add additional columns.
     *
     * @return void
     */
    public function alterTableAddColumns()
    {
        $this->ensureConnection();
        $table = "tbl_user_details";

        // Define queries as a map: key => [column name, SQL query]
        $alterQueries = [
            1  => ['status',                  "ALTER TABLE $table ADD COLUMN status VARCHAR(50) DEFAULT '$this->status'"],
            2  => ['user_id',                 "ALTER TABLE $table ADD COLUMN user_id INT DEFAULT $this->user_id"],
            3  => ['full_name',               "ALTER TABLE $table ADD COLUMN full_name VARCHAR(255) DEFAULT '$this->full_name'"],
            4  => ['contact_no',              "ALTER TABLE $table ADD COLUMN contact_no VARCHAR(50) DEFAULT '$this->contact_no'"],
            5  => ['district',                "ALTER TABLE $table ADD COLUMN district VARCHAR(100) DEFAULT '$this->district'"],
            6  => ['division',                "ALTER TABLE $table ADD COLUMN division VARCHAR(100) DEFAULT '$this->division'"],
            7  => ['address',                 "ALTER TABLE $table ADD COLUMN address VARCHAR(255) DEFAULT '$this->address'"],
            8  => ['gender',                  "ALTER TABLE $table ADD COLUMN gender VARCHAR(10) DEFAULT '$this->gender'"],
            9  => ['nid_number',              "ALTER TABLE $table ADD COLUMN nid_number VARCHAR(50) DEFAULT '$this->nid_number'"],
            10 => ['profile_picture_id',      "ALTER TABLE $table ADD COLUMN profile_picture_id INT DEFAULT $this->profile_picture_id"],
            11 => ['nid_file_id',             "ALTER TABLE $table ADD COLUMN nid_file_id INT DEFAULT $this->nid_file_id"],
            12 => ['other_document_file_id',  "ALTER TABLE $table ADD COLUMN other_document_file_id INT DEFAULT $this->other_document_file_id"]
        ];

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
     * Insert a new user details record.
     *
     * @return int|false Returns inserted user_details_id or false on failure.
     */
    public function insert()
    {
        $sql = "INSERT INTO tbl_user_details (status, user_id, full_name, contact_no, district, division, address, gender, nid_number, profile_picture_id, nid_file_id, other_document_file_id)
                VALUES (
                    '$this->status',
                    $this->user_id,
                    '$this->full_name',
                    '$this->contact_no',
                    '$this->district',
                    '$this->division',
                    '$this->address',
                    '$this->gender',
                    '$this->nid_number',
                    $this->profile_picture_id,
                    $this->nid_file_id,
                    $this->other_document_file_id
                )";
        if (mysqli_query($this->conn, $sql)) {
            $this->user_details_id = mysqli_insert_id($this->conn);
            return $this->user_details_id;
        } else {
            echo "Insert failed: " . mysqli_error($this->conn) . "<br>";
            return false;
        }
    }

    /**
     * Update user details record based on user_details_id.
     *
     * @return bool Returns true if update is successful, false otherwise.
     */
    public function update()
    {
        if ($this->user_details_id == 0) return false; // Ensure user_details_id is set

        $sql = "UPDATE tbl_user_details SET
                    status = '$this->status',
                    user_id = $this->user_id,
                    full_name = '$this->full_name',
                    contact_no = '$this->contact_no',
                    district = '$this->district',
                    division = '$this->division',
                    address = '$this->address',
                    gender = '$this->gender',
                    nid_number = '$this->nid_number',
                    profile_picture_id = $this->profile_picture_id,
                    nid_file_id = $this->nid_file_id,
                    other_document_file_id = $this->other_document_file_id
                WHERE user_details_id = $this->user_details_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "User details record updated successfully.<br>";
        } else {
            echo "Update failed: " . mysqli_error($this->conn) . "<br>";
        }
        return $result;
    }
}
?>
