<?php


namespace Workouse;

class MailSchedule
{
    const PROVIDER_SWIFT = 1;
    const PROVIDER_MAILGUN = 2;
    const CONTENT_TYPE_HTML = 1;
    const CONTENT_TYPE_JSON = 2;
    const CONTENT_TYPE_PHP = 3;

    /** @var integer */
    private $id;

    /** @var string */
    private $subject;

    /** @var string */
    private $receiverEmail;

    /** @var integer */
    private $provider;

    /** @var string */
    private $content;

    /** @var integer */
    private $contentType;

    /** @var \DateTime */
    private $createdAt;

    /** @var ?\DateTime */
    private $sendAt;

    /** @var boolean */
    private $processed = false;

    /** @var boolean */
    private $canceled = false;

    /**
     * @param int $id
     * @return MailSchedule
     */
    public function setId(int $id): MailSchedule
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return MailSchedule
     */
    public function setSubject(string $subject): MailSchedule
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverEmail(): string
    {
        return $this->receiverEmail;
    }

    /**
     * @param string $receiverEmail
     * @return MailSchedule
     */
    public function setReceiverEmail(string $receiverEmail): MailSchedule
    {
        $this->receiverEmail = $receiverEmail;
        return $this;
    }

    /**
     * @return int
     */
    public function getProvider(): int
    {
        return $this->provider;
    }

    /**
     * @param int $provider
     * @return MailSchedule
     */
    public function setProvider(int $provider): MailSchedule
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return MailSchedule
     */
    public function setContent(string $content): MailSchedule
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getContentType(): int
    {
        return $this->contentType;
    }

    /**
     * @param int $contentType
     * @return MailSchedule
     */
    public function setContentType(int $contentType): MailSchedule
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return MailSchedule
     */
    public function setCreatedAt(\DateTime $createdAt): MailSchedule
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSendAt()
    {
        return $this->sendAt;
    }

    /**
     * @param mixed $sendAt
     * @return MailSchedule
     */
    public function setSendAt($sendAt)
    {
        $this->sendAt = $sendAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProcessed(): bool
    {
        return $this->processed;
    }

    /**
     * @param bool $processed
     * @return MailSchedule
     */
    public function setProcessed(bool $processed): MailSchedule
    {
        $this->processed = $processed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanceled(): bool
    {
        return $this->canceled;
    }

    /**
     * @param bool $canceled
     * @return MailSchedule
     */
    public function setCanceled(bool $canceled): MailSchedule
    {
        $this->canceled = $canceled;
        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId() ?? null,
            'subject' => $this->getSubject() ?? null,
            'receiverEmail' => $this->getReceiverEmail() ?? null,
            'provider' => $this->getProvider() ?? null,
            'content' => $this->getContent() ?? null,
            'contentType' => $this->getContentType() ?? null,
            'createdAt' => $this->getCreatedAt() ? $this->getCreatedAt()->format(\DateTime::ISO8601) : null,
            'sendAt' => $this->getSendAt() ? $this->getSendAt()->format(\DateTime::ISO8601) : null,
            'processed' => $this->isProcessed() ?? false,
            'canceled' => $this->isCanceled() ?? false,
        ];
    }

    public function fromJson(string $json)
    {
        $array = json_decode($json, true);
        $mailSchedule = new self();

        isset($array['id']) && $mailSchedule->setId($array['id']);
        isset($array['subject']) && $mailSchedule->setSubject($array['subject']);
        isset($array['receiverEmail']) && $mailSchedule->setReceiverEmail($array['receiverEmail']);
        isset($array['provider']) && $mailSchedule->setProvider($array['provider']);
        isset($array['content']) && $mailSchedule->setContent($array['content']);
        isset($array['contentType']) && $mailSchedule->setContentType($array['contentType']);
        isset($array['createdAt']) && $mailSchedule->createdAt($array['createdAt']);
        isset($array['sendAt']) && $mailSchedule->setSendAt($array['sendAt']);
        isset($array['processed']) && $mailSchedule->setProcessed($array['processed']);
        isset($array['canceled']) && $mailSchedule->setCanceled($array['canceled']);

        return $mailSchedule;
    }
}
