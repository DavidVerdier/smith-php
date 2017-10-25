<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 21-Oct-17
 * Time: 11:50
 */

namespace Smith\Http;


interface AbstractRequest {

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return \stdClass
     */
    public function parseBody();
}