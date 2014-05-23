<?php


class HhTest extends CDbTestCase{

    function testTest()
    {
        $r = Advert::fg();
        $this->assertFalse($r);
    }
}