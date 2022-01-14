<?php

require_once('base/BaseModels.php');

class Orders extends BaseModels
{
    public function countItems()
    {
        global $databaseConnect;
        $sql = "SELECT COUNT(*) AS count FROM `items` WHERE `order_id` = $this->id;";
        $result = $databaseConnect->get($sql);
        return $result['count'];
    }

    public function showItems()
    {
        global $databaseConnect;
        $sql = "SELECT items.* , products.title AS productName FROM `items` LEFT JOIN `products` ON items.product_id = products.id WHERE `order_id` = $this->id;";
        $results = $databaseConnect->fetch($sql);
        return parent::createModel($results, "Items");
    }

    public function findUser()
    {
        $user = Users::find($this->user_id);
        return $user;
    }

    public function persianDate()
    {
        $time_stamp = strtotime($this->date);
        $persian_date = gregorian_to_jalali(date('Y', $time_stamp), date('m', $time_stamp), date('d', $time_stamp), "/");
        return $persian_date;
    }
}
