<?php
namespace App\Utilities;

class FertilityDiagnosis
{
    
    public static function getFertilityTestResult($season,$age,$disease,$trauma,$surgery,$fevers,$alcohol,$smoking,$sitting)
    {

        $url = 'https://ussouthcentral.services.azureml.net/workspaces/ef984246fc0c427d90efd81b94fdda01/services/44a4519ba263461fa3756ee543174cce/execute?api-version=2.0&details=true';
        $api_key = 'wSH1w+R8fkVYb/Hvsu4/cq4VS1MatD0iLQgrsbXuvWBc5pw/SpfdRCeC0NCDFrbnxwYjgsKW6U3JY8R7GjfinQ==';
    
        $data = array(
        'Inputs' => array(
          'input1' => array(
              'ColumnNames' => array(
                  "Col1",
                  "Col2",
                  "Col3",
                  "Col4",
                  "Col5",
                  "Col6",
                  "Col7",
                  "Col8",
                  "Col9",
                  "Col10"
              ),
              'Values' => array(array(
                  $season,
                  $age,
                  $disease,
                  $trauma,
                  $surgery,
                  $fevers,
                  $alcohol,
                  $smoking,
                  $sitting,
                  ""
              ))
          ),
        ),
        'GlobalParameters' => null
        );
        $body = json_encode($data);
        $headers = array('Content-Type: application/json', 'Authorization:Bearer ' . $api_key, 'Content-Length: ' . strlen($body));
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);
        $result = json_decode($result, true);
        return $result;
    }
}
