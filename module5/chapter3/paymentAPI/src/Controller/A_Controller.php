<?php
/**
 * A_Controller.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Monolog\Logger;
use PaymentApi\Model\A_Model;
use PaymentApi\Repository\A_Repository;
use PaymentApi\Routes;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class A_Controller
{
    protected A_Repository $repository;
    protected Logger $logger;

    protected Routes $routeEnum;
    protected string $routeValue;

    protected A_Model $model;

    public function __construct(protected ContainerInterface $container)
    {
        $this->logger = $container->get(Logger::class);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    protected function indexAction(Request $request, Response $response): ResponseInterface
    {
        $records = $this->repository->findAll();

        if (count($records) > 0) {
            return new JsonResponse([
                'type' => '',
                'title' => 'List of ' . $this->routeValue,
                'status' => 200,
                'detail' => $records,
                'instance' => '/v1/' . $this->routeValue
            ], 200);
        } else {
            $context = [
                'type' => '/errors/no_' . $this->routeValue . '_found',
                'title' => 'List of ' . $this->routeValue,
                'status' => 404,
                'detail' => $records,
                'instance' => '/v1/' . $this->routeValue
            ];
            $this->logger->info('No ' . $this->routeValue . ' found', $context);
            return new JsonResponse($context, 404);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    protected function deactivateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $records = $this->repository->findById($args['id']);
        if (is_null($records)) {
            $context = [
                'type' => '/errors/no_' . $this->routeValue . '_found_upon_deactivation',
                'title' => 'Deactivation of ' . $this->routeEnum->toSingular(),
                'status' => 404,
                'detail' => $args['id'],
                'instance' => '/v1/' . $this->routeValue . '/deactivate/{id}'
            ];
            $this->logger->info('No ' . $this->routeValue . ' found', $context);
            return new JsonResponse($context, 404);
        }
        $records->setIsActive(false);
        try {
            $this->repository->update($records);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
            return new JsonResponse([
                'type' => '/errors/internal_server_error_upon_deactivate_' . $this->routeValue,
                'title' => 'Internal server error',
                'status' => 500,
                'detail' => '',
                'instance' => '/v1/' . $this->routeValue . '/deactivate/{id}'
            ], 500);
        }

        return new JsonResponse([
            'type' => '',
            'title' => $this->routeEnum->toSingular() . ' has been deactivated',
            'status' => 200,
            'detail' => '',
            'instance' => '/v1/' . $this->routeValue . '/deactivate/{id}'
        ], 200);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    protected function reactivateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $method = $this->repository->findById($args['id']);
        if (is_null($method)) {
            $context = [
                'type' => '/errors/no_' . $this->routeValue . '_found_upon_reactivation',
                'title' => 'Reactivation of ' . $this->routeEnum->toSingular(),
                'status' => 404,
                'detail' => $args['id'],
                'instance' => '/v1/' . $this->routeValue . '/reactivate/{id}'
            ];
            $this->logger->info('No ' . $this->routeValue . ' found', $context);
            return new JsonResponse($context, 404);
        }
        $method->setIsActive(true);
        try {
            $this->repository->update($method);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
            return new JsonResponse([
                'type' => '/errors/internal_server_error_upon_reactivate_' . $this->routeValue,
                'title' => 'Internal server error',
                'status' => 500,
                'detail' => '',
                'instance' => '/v1/' . $this->routeValue . '/reactivate/{id}'
            ], 500);
        }

        return new JsonResponse([
            'type' => '',
            'title' => $this->routeEnum->toSingular() . ' has been reactivated',
            'status' => 200,
            'detail' => '',
            'instance' => '/v1/' . $this->routeValue . '/reactivate/{id}'
        ], 200);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    protected function removeAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $records = $this->repository->findById($args['id']);
        if (is_null($records)) {
            $context = [
                'type' => '/errors/no_'.$this->routeValue.'_found_upon_removing',
                'title' => 'Removing ' . $this->routeEnum->toSingular(),
                'status' => 404,
                'detail' => $args['id'],
                'instance' => '/v1/'.$this->routeValue.'/{id}'
            ];
            $this->logger->info('No '.$this->routeValue.' found', $context);
            return new JsonResponse($context, 404);
        }

        try {
            $this->repository->remove($records);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
            return new JsonResponse([
                'type' => '/errors/internal_server_error_upon_remove_' . $this->routeValue,
                'title' => 'Internal server error',
                'status' => 500,
                'detail' => '',
                'instance' => '/v1/'.$this->routeValue.'/{id}'
            ], 500);
        }

        return new JsonResponse([
            'type' => '',
            'title' => $this->routeEnum->toSingular() . ' has been removed',
            'status' => 200,
            'detail' => '',
            'instance' => '/v1/'.$this->routeValue.'/{id}'
        ], 200);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    protected function createAction(Request $request, Response $response): ResponseInterface
    {
        try {
            $this->repository->store($this->model);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
            return new JsonResponse([
                'type' => '/errors/internal_server_error_upon_create_' .$this->routeValue,
                'title' => 'Internal server error',
                'status' => 500,
                'detail' => $this->model,
                'instance' => '/v1/' . $this->routeValue
            ], 500);
        }

        return new JsonResponse([
            'type' => '',
            'title' => $this->routeEnum->toSingular() . ' has been created',
            'status' => 200,
            'detail' => $this->model->getId(),
            'instance' => '/v1/' . $this->routeValue
        ], 200);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    protected function updateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        try {
            $this->repository->update($this->model);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
            return new JsonResponse([
                'type' => '/errors/internal_server_error_upon_update_' . $this->routeValue,
                'title' => 'Internal server error',
                'status' => 500,
                'detail' => '',
                'instance' => '/v1/'.$this->routeValue.'/{id}'
            ], 500);
        }

        return new JsonResponse([
            'type' => '',
            'title' => $this->routeEnum->toSingular() . ' has been updated',
            'status' => 200,
            'detail' => '',
            'instance' => '/v1/'.$this->routeValue.'/{id}'
        ], 200);
    }
}
