<?php
use Dotenv\Repository\RepositoryBuilder;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Dotenv;

require ('./vendor/autoload.php');

/**
 * Inserting email id, password, otp, first name and last name.
 * 
 * @method getConnection().
 *   Checking If the connecting is set or not.
 * 
 * @property string $serverName
 *   Stores server name.
 * @property string $username
 *   Stores user name.
 * @property string $password
 *   Stores password.
 * @property string $database
 *   Stores database name.
 * @property string $conn
 *   Establishing connection between php an MySql.
 * 
 * @author Deepak Pandey <deepak.pandey@innoraft.com>
 */
class SqlConnection
{
    /**
     * Stores server name.
     * @var $serverName
     */
    private $serverName;

    /**
     * Stores user name.
     * @var $username
     */
    private $username;

    /**
     * Stores password.
     * @var $password
     */
    private $password;

    /**
     * Stores database name.
     * @var $database
     */
    private $database;

    /**
     * Establishing connection between php an MySql.
     * @var $conn
     */
    private $conn;

    /**
     * Taking values from environment variable and connecting with 
     * database using mysqli.
     * 
     * @param string $serverName.
     *   Stores server name.
     * @param string $username
     *   Stores username.
     * @param string $password
     *   Stores password.
     * @param string $database
     *   Stores database.
     */
    public function __construct()
    {
        $repository = RepositoryBuilder::createWithNoAdapters()
        ->addAdapter(EnvConstAdapter::class)
        ->addWriter(PutenvAdapter::class)
        ->immutable()
        ->make();

        $dotenv = Dotenv::create($repository, __DIR__);
        $dotenv->load();

        $this->serverName = $_ENV['serverName'];
        $this->username = $_ENV['username'];
        $this->password = $_ENV['password'];
        $this->database = $_ENV['database'];

        // Connecting with database.
        $this->conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->database);
    }

    /**
     * Checking If the connecting is set or not.
     * 
     * @return mixed
     *   Returns connection between database and server.
     */
    public function getConnection()
    {
        if ($this->conn) {
            return $this->conn;
        }
    }
}
?>