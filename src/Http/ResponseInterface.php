<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 21-Oct-17
 * Time: 11:50
 */

namespace Smith\Http;


interface ResponseInterface {

    /**
     * Sets the HTTP status code and message to be sent to the client.
     * @param int $status
     * @param string $httpVersion
     */
    public function setStatus(int $status, string $httpVersion);

    /**
     * Sets a response header.
     * @param string $key
     * @param string $value
     */
    public function setHeader(string $key, string $value);

    /**
     * Writes / Overwrites the contents of the response body.
     * @param string $content
     */
    public function setBody(string $content);

    /**
     * Appends content to the reponse body.
     * @param string $content
     */
    public function append(string $content);

    /**
     * Prepends content to the response body.
     * @param string $content
     */
    public function prepend(string $content);

    /**
     * Sends only the headers for this response.
     * Once sent they cannot be re-sent and modifications will be ignored.
     */
    public function sendHeaders();

    /**
     * Sends the response. If headers have already been sent, only sends the body.
     * Once sent it cannot be resent and modifications will be ignored.
     */
    public function send();
}
