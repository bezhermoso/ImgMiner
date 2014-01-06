<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezGallery\Entity;


interface ImageInterface
{
    public function getId();

    public function getTitle();

    public function getPathname();
}