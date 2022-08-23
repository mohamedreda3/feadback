<?php

class Response
{
    public function getResponse(?int $success, ?string $message, ?string $token = null, ?array $data = [])
    {
        if (($token == null) && (empty($data))) {
            return json_encode($this->response = array('Response' => array('success' => $success, 'message' => $message)));
        } elseif (!empty($data)) {
            return json_encode($this->response = array('Response' => array('success' => $success, 'message' => $message, 'Token' => $token), 'data' => $data));
        } else {
            return json_encode($this->response = array('Response' => array('success' => $success, 'message' => $message, 'Token' => $token)));
        }
    }
}
