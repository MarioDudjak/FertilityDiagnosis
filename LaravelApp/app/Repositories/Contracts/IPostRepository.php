<?php

namespace App\Repositories\Contracts;

interface IPostRepository
{
    public function getAll();

    public function savePost($post);
    
    public function deletePost($id);

    public function updatePost($request);

    public function find($id);

    public function findBy($att, $column);
}

?>