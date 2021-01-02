<?php


namespace App;


use Carbon\Carbon;

class Item
{
    private string $name;
    private string $content;
    private Carbon $create_at;

    public function __construct(string $name, string $content, Carbon $create_at)
    {
        $this->name = $name;
        $this->content = $content;
        $this->create_at = $create_at;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return Carbon
     */
    public function getCreateAt(): Carbon
    {
        return $this->create_at;
    }

    /**
     * @param Carbon $create_at
     */
    public function setCreateAt(Carbon $create_at): void
    {
        $this->create_at = $create_at;
    }



}