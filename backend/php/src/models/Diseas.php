<?php
declare(strict_types=1);

namespace php\src\models;

class Diseas
{
    private string $name;
    private string $dateStart;
    private string $dateEnd;
    private array $treatment;
    private array $files;
    private bool $is_chronic;

    /**
     * @param string $name
     * @param string $dateStart
     * @param string $dateEnd
     * @param array $treatment
     * @param array $files
     * @param bool $is_chronic
     */
    public function __construct(string $name, string $dateStart, string $dateEnd, array $treatment, array $files, bool $is_chronic)
    {
        $this->name = $name;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->treatment = $treatment;
        $this->files = $files;
        $this->is_chronic = $is_chronic;
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
    public function getTreatment(): array
    {
        return $this->treatment;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @return bool
     */
    public function isIsChronic(): bool
    {
        return $this->is_chronic;
    }
}