<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Entity;


use Bez\Backlog\Entity\JobInterface;

class Job implements JobInterface
{

    protected $id;

    protected $type;

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }
}