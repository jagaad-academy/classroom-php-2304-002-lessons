<?php

namespace OnlineStoreProject\Controllers;

class MainController extends A_Controller
{
    protected function indexAction(): void
    {
        echo $this->view->render('index', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement addAction() method.
    }

    protected function deleteAction(int $id): void
    {
        // TODO: Implement addAction() method.
    }

    protected function addAction(): void
    {
        // TODO: Implement addAction() method.
    }

    protected function pageNotFoundAction(): void
    {
        $this->dataToRender["pageTitle"] = 'Page not found!';
        echo $this->view->render('404', $this->dataToRender);
    }
}
