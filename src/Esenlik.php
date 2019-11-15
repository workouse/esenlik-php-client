<?php

declare(strict_types=1);

namespace Workouse;

use GuzzleHttp\ClientInterface;

class Esenlik
{

    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(MailSchedule $mailSchedule): MailSchedule
    {
        return $this->send("POST", "mail_schedules", $mailSchedule->toArray());
    }

    public function canceled(int $id): MailSchedule
    {
        return $this->send("PATCH", "mail_schedules/$id", ['canceled' => true], [
            'Content-Type' => 'application/merge-patch+json'
        ]);
    }

    public function update(MailSchedule $mailSchedule): MailSchedule
    {
        return $this->send("PUT", "mail_schedules/" . $mailSchedule->getId(), $mailSchedule->toArray());
    }

    private function send(string $method, string $url, array $params, array $headers = [])
    {
        $response = $this->httpClient->request($method, $url, [
            'headers' => $headers,
            'json' => $params
        ]);

        $mailSchedule = MailSchedule::fromJson($response->getBody()->getContents());

        return $mailSchedule;
    }

}
