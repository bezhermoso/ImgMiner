<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezGallery\Repository;


use BezGallery\Entity\ImageInterface;

interface RepositoryInterface
{
    public function findAll();

    public function save(ImageInterface $image);

    public function remove(ImageInterface $image);
}