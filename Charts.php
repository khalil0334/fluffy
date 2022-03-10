<?php
require_once '../config/config.php';

require_once "../koolreport/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class Charts extends \koolreport\KoolReport
{

public  $db_sql;
    public function settings()
    {
        $db = new Connection();
        return array(
            "dataSources"=>array(
                "dao"=>array(
                    "connectionString"=>"mysql:host=". $db->host .";dbname=".$db->db,
                    "username"=>$db->user,
                    "password"=>$db->pass,
                    "charset"=>"utf8"
                )
            )
        );
    }


    public function setup()
    {
        $this->src('dao')
            ->query($this->params["sql"])
            ->pipe($this->dataStore('charts_data_source'));
    }

//    public function setup()
//    {
//        $this->src('dao')
//            ->query("SELECT c.`title` AS Title, ROUND(( j.`last_ptr`/j.`max_ptr` * 100 ),2) AS Completed FROM job j INNER JOIN campaign c ON c.`id` = j.`campaign_id` WHERE j.`status` = 20 AND c.`country` = 'png' ")
//            ->pipe($this->dataStore('charts_data_source'));
//    }
}
