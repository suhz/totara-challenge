<?php

use PHPUnit\Framework\TestCase;

class WrapTest extends TestCase {
    public function testWrapAString() {
        $expecting = "testing\none two\nthree four\nfive";
        $wrap = new Wrap('testing one two three four five', 10);
        $this->assertEquals($expecting, $wrap->wrapped);
    }
}
