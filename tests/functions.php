<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    public function testPrepareOutput_success1()
    {
        $result = prepareOutput([['id' => 'idtest', 'book_title' => 'title', 'author' => 'author', 'genre' => 'genre', 'page_count' => 'pages', 'year_released' => 'year']]);
        $this->assertisArray($result);
    }

    public function testPrepareOutput_success2()
    {
        $result = prepareOutput([['id' => 'idtest', 'book_title' => 'title', 'author' => 'author', 'genre' => 'genre', 'page_count' => 'pages', 'year_released' => 'year']]);
        $expected = [['<pre><span class="class"><h2>title</h2><p><em>author</em></p><br>Released in year. genre. pages pages.</span></pre>']];
        $this->assertEquals($result, $expected[0]);
    }

    public function testPrepareOutput_malformed1()
    {
        $this->expectException(TypeError::class);
        prepareOutput(100);
    }
}