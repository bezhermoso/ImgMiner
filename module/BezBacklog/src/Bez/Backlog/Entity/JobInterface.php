<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Entity;


interface JobInterface
{
    /**
     * @return id
     */
    public function getId();

    /**
     * @return string
     */
    public function getType();
}