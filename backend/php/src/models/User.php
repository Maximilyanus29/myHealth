<?php
declare(strict_types=1);

namespace php\src\models;

class User
{
    private string $lastName;
    private string $firstName;
    private string $birthdate;
    private string $photoPath;
    private array $diseases;
    private array $surveys;

    /**
     * @param string $lastName
     * @param string $firstName
     * @param string $birthdate
     * @param string $photoPath
     * @param array $diseases
     * @param array $surveys
     */
    public function __construct(string $lastName, string $firstName, string $birthdate, string $photoPath, array $diseases, array $surveys)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthdate = $birthdate;
        $this->photoPath = $photoPath;
        $this->diseases = $diseases;
        $this->surveys = $surveys;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getPhotoPath(): string
    {
        return $this->photoPath;
    }

    /**
     * @return array
     */
    public function getDiseases(): array
    {
        return $this->diseases;
    }

    /**
     * @return array
     */
    public function getSurveys(): array
    {
        return $this->surveys;
    }

    public function getTimeline(): array
    {
        $timeline = [];

        foreach ($this->diseases as $disease){
            /**@var $disease Diseas*/
            $timeline[$disease->getDateStart()]['start'][] = $disease;
            $timeline[$disease->getDateEnd()]['end'][] = $disease;
        }

        foreach ($this->surveys as $survey){
            /**@var $survey Survey*/
            $timeline[$survey->getDateStart()]['start'][] = $survey;
            $timeline[$survey->getDateEnd()]['end'][] = $survey;
        }

        ksort($timeline);

        return $timeline;
    }
}