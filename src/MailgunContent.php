<?php


namespace Workouse;

class MailgunContent
{
    /** @var ?string */
    private $html;

    /** @var ?string */
    private $template;

    /** @var ?array */
    private $variables;

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     * @return MailgunContent
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return MailgunContent
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param mixed $variables
     * @return MailgunContent
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
        return $this;
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        if (!empty($this->getHtml())) {
            return [$this->getHtml()];
        }
        return [
            'template' => $this->getTemplate(),
            'variables' => $this->getVariables()
        ];
    }
}
