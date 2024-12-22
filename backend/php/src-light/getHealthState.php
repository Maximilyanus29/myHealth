<?php

use php\src\models\Diseas;
use php\src\models\Survey;
use php\src\models\User;

class getHealthState
{

    public function run()
    {
        $diseases = $this->getDiseases();
        $survays = $this->getSurveys();

        $struct = [
            "first_name" => "Максим",
            "last_name" => "Рябцев",
            "birthdate" => "27.09.1996",
            "chronic_diseas" => $this->getChronicDiseases($diseases),
            "timeline" => $this->getTimeline($diseases,$survays)
        ];

        return$struct ;
    }



    public function getTimeline($diseases, $surveys): array
    {
        $timeline = [];

        foreach ($diseases as $disease){
            /**@var $disease Diseas*/
            $timeline[$disease['dateStart']]['start']['diseases'][] = $disease;
            $timeline[$disease['dateEnd']]['end']['diseases'][]  = $disease;
        }

        foreach ($surveys as $survey){
            /**@var $survey Survey*/
            $timeline[$survey['dateStart']]['start']['surveys'][] = $survey;
            $timeline[$survey['dateEnd']]['end']['surveys'][] = $survey;
        }

        ksort($timeline);

        return $timeline;
    }



    private function getDiseases()
    {
        return [
            [
                "name" => "yazva",
                "dateStart" => "2024-01-01",
                "dateEnd" => "2024-01-15",
                "treatment" => [
                    "antibiotic1",
                    "antibiotic2",
                ],
                "files" => [
                    "path/to/file",
                    "path/to/file2",
                ],
                "is_chronic" => false,
            ],
            [
                "name" => "orvi",
                "dateStart" => "2024-01-01",
                "dateEnd" => "2024-01-13",
                "treatment" => [
                    "antibiotic1",
                    "antibiotic2",
                ],
                "files" => [
                    "path/to/file",
                    "path/to/file2",
                ],
                "is_chronic" => true,
            ],

        ];
    }

    private function getChronicDiseases($diseases)
    {
        return array_filter($diseases, function ($el){return $el['is_chronic'];});
    }

    private function getSurveys()
    {
        return [
            [
                "name" => "gastroskopia",
                "dateStart" => "2024-01-01",
                "dateEnd" => "2024-01-15",
                "result" => [
                    "antibiotic1",
                    "antibiotic2",
                ],
            ],
            [
                "name" => "analiz krovi",
                "dateStart" => "2024-01-01",
                "dateEnd" => "2024-01-15",
                "result" => [
                    "antibiotic1",
                    "antibiotic2",
                ],
            ],

        ];


    }
}