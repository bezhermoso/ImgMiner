<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Gallery\Repository;


use Bez\Gallery\Entity\ImageInterface;

interface RepositoryInterface
{
    /**
     * @return array|ImageInterface[]
     */
    public function findAll();

    /**
     * @param ImageInterface $image
     * @return void
     */
    public function save(ImageInterface $image);

    /**
     * @param ImageInterface $image
     * @return void
     */
    public function remove(ImageInterface $image);
}