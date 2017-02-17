<?php

namespace Correios;

class Cep {

    protected $_url    = 'http://www.buscacep.correios.com.br/sistemas/buscacep/detalhaCEP.cfm';
    protected $_fields = 'CEP=';
    protected $_output = [
        'cep'          => null,
        'state'        => null,
        'city'         => null,
        'neighborhood' => null,
        'address'      => null,
    ];

    protected function getData($cep) {

        $cURL = curl_init($this->_url);

        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HEADER, false);
        curl_setopt($cURL, CURLOPT_POST, true);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $this->_fields . $cep);

        $output = curl_exec($cURL);

        curl_close($cURL);

        return $output;

    }

    public function get($cep) {

        $output = utf8_encode($this->getData($cep));

        $data = '';

        preg_match_all('#<td[^>]*>(.*?)</td>#s', $output, $data);

        $data = $data[0];

        if (is_array($data) && count($data) > 1) {

            switch (count($data)) {

                case 2:

                    $state_city = explode('/', strip_tags($data[0]));

                    $this->_output['cep']   = strip_tags($data[1]);
                    $this->_output['city']  = $state_city[0];
                    $this->_output['state'] = $state_city[1];

                    break;

                case 4:
                case 6:

                    $state_city = explode('/', strip_tags($data[2]));

                    $this->_output['cep']          = strip_tags($data[3]);
                    $this->_output['city']         = $state_city[0];
                    $this->_output['state']        = $state_city[1];
                    $this->_output['neighborhood'] = strip_tags($data[1]);
                    $this->_output['address']      = strip_tags($data[0]);

                    break;

            }

        }

        return json_encode($this->_output);

    }

}
