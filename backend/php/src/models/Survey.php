<?php
declare(strict_types=1);

namespace php\src\models;

class Survey
{
    private string $name;
    private string $dateStart;
    private string $dateEnd;
    private array $result;

    /**
     * @param string $name
     * @param string $dateStart
     * @param string $dateEnd
     * @param array $result
     */
    public function __construct(string $name, string $dateStart, string $dateEnd, array $result)
    {
        $this->name = $name;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->result = $result;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDateStart(): string
    {
        return $this->dateStart;
    }

    /**
     * @return string
     */
    public function getDateEnd(): string
    {
        return $this->dateEnd;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }
}