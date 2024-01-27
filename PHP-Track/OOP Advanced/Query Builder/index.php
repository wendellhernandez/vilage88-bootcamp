<?php
    require_once 'Database.php';
    require_once 'QueryBuilder.php';
    require_once 'Sites.php';
    require_once 'Clients.php';

    $Sites = new Sites();
    $Sites->select(array("client_id", $Sites->count));
    $Sites->group_by('client_id');
    $Sites->having($Sites->count, ">", 5);
    $Sites->get();

    $Clients = new Clients();
    $Clients->where(array("last_name" => "Owen"))->get();
?>