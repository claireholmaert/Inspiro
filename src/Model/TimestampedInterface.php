<?php

namespace App\Model;

interface TimestampedInterface
{
    public function getCreateAt(): ?\DateTimeInterface;


    public function setCreateAt(\DateTimeInterface $createAt);

    public function getUpdateAt(): ?\DateTimeInterface;

    public function setUpdateAt(?\DateTimeInterface $updateAt);
}