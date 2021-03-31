<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    public function testPrepareOutput_success1()
    {
        $result = prepareOutput([['id' => 'idtest', 'book_title' => 'title', 'author' => 'author', 'genre' => 'genre', 'page_count' => 'pages', 'year_released' => 'year']]);
        $expected = [['<span class="gallery_item"><h2>title</h2><p><em>author</em></p><br>Released in year. genre. pages pages. <em>ID: idtest</em></span>']];
        $this->assertEquals($result, $expected[0]);
        $this->assertisArray($result);
    }

    public function testPrepareOutput_malformed1()
    {
        $this->expectException(TypeError::class);
        prepareOutput(100);
    }

    public function testCreateUpdateQuery_success1()
    {
        $result = createUpdateQuery('book_title', 'test', 100);
        $expected = ['UPDATE `books` SET `book_title` = :val WHERE `id` = :id;', 'test', 100];
        $this->assertisArray($result);
        $this->assertEquals($result, $expected);
    }

    public function testCreateUpdateQuery_malformed1()
    {
        $this->expectException(TypeError::class);
        createUpdateQuery([], 'test', 100);
    }

    public function testCreateUpdateQuery_malformed2()
    {
        $this->expectException(TypeError::class);
        createUpdateQuery('book_title', [], 100);
    }

    public function testCreateUpdateQuery_malformed3()
    {
        $this->expectException(TypeError::class);
        createUpdateQuery('book_title', 'test', []);
    }
}