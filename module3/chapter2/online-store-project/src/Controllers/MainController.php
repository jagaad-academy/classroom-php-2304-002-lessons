<?php

namespace OnlineStoreProject\Controllers;

class MainController extends A_Controller
{
    public function indexAction(): string
    {
        $dataToRender = [];
        $this->view->render('index', $dataToRender);
    }

    public function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    public function deleteAction(int $id): void
    {
        // TODO: Implement deleteAction() method.
    }

    public function addAction(): void
    {
        // TODO: Implement addAction() method.
    }

    public function pageNotFoundAction()
    {

    }

    public function prepare(): I_Controller
    {
        $this->classNameForViews = str_replace('Controller', '', __CLASS__);
        $this->actionNameForViews = str_replace('Action', '', __METHOD__);
    }
}
