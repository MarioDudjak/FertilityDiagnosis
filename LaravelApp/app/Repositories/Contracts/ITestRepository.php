<?php

namespace App\Repositories\Contracts;

interface ITestRepository
{
    public function getAll();

    public function saveTest($season,$age,$disease,$trauma,$surgery,$fevers,$alcohol,$smoking,$sitting,$testresult,$user_id,$post_id);
    
    public function deleteTest($id);

    public function updateTest($request);

    public function find($id);

    public function findBy($att, $column);
}

?>