<?php

namespace OnlineStoreProject\App;

class View extends \stdClass
{
    private string $actionNameForViews;
    private string $classNameForViews;
    public function __get($name)
    {
        if(property_exists($this, $name)){
            return $this->{$name};
        } else {
            return "{{PROPERTY NOT FOUND!!!}}";
        }
    }
    public function render(string $pathToView, array $datToRender): string
    {
        $this->storeDateToRender($datToRender);
        $fileNameWithFullPath = __DIR__ . '/../Views/' . $this->classNameForViews . '/' . $pathToView . "php";
        if (file_exists($fileNameWithFullPath)) {
            $data = $datToRender;
            require_once $pathToView . "php";
        }
    }

    private function storeDateToRender(array $datToRender): void
    {
        foreach ($datToRender as $key => $data) {
            $this->{$key} = $data;
        }
    }

    /**
     * @return string
     */
    public function getClassNameForViews(): string
    {
        return $this->classNameForViews;
    }

    /**
     * @param string $classNameForViews
     */
    public function setClassNameForViews(string $classNameForViews): void
    {
        $this->classNameForViews = $classNameForViews;
    }

    /**
     * @return string
     */
    public function getActionNameForViews(): string
    {
        return $this->actionNameForViews;
    }

    /**
     * @param string $actionNameForViews
     */
    public function setActionNameForViews(string $actionNameForViews): void
    {
        $this->actionNameForViews = $actionNameForViews;
    }
}
