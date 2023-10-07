<?php
/**
 * PaymnetsController.php
 * hennadii.shvedko
 * 04.10.2023
 */

namespace PaymentApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use PaymentApi\Model\Payments;
use PaymentApi\Repository\PaymentsRepository;
use PaymentApi\Routes;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PaymentsController extends A_Controller
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->routeEnum = Routes::Payments;
        $this->routeValue = Routes::Payments->value;
        $this->repository = $container->get(PaymentsRepository::class);
    }

    /**
     * @OA\Get(
     *     path="/v1/payments",
     *     description="Returns all payments",
     *     @OA\Response(
     *          response=200,
     *          description="paymnets response",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *      ),
     *   )
     * )
     * @return \Laminas\Diactoros\Response
     */
    public function indexAction(Request $request, ResponseInterface $response): ResponseInterface
    {
        return parent::indexAction($request, $response);
    }

    /**
     * @OA\Post(
     *     path="/v1/payments",
     *     description="Creates a payment",
     *     @OA\RequestBody(
     *          description="Input data format",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="method_id",
     *                      description="ID of paymnet method",
     *                      type="integer",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="customer_id",
     *                      description="ID of customer",
     *                      type="integer",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="basket_id",
     *                      description="ID of basket",
     *                      type="integer",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="sum",
     *                      description="Paymnet amount",
     *                      type="float",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="is_finalized",
     *                      description="If paymnet is finalized",
     *                      type="integer",
     *                  ),
     *              ),
     *          ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="payment has been created successfully",
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="bad request",
     *      ),
     *      @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *   ),
     * )
     * @param \Slim\Psr7\Request $request
     * @param \Slim\Psr7\Response $response
     * @return ResponseInterface
     */
    public function createAction(Request $request, Response $response): ResponseInterface
    {
        $requestBody = json_decode($request->getBody()->getContents(), true);
        $methodId = filter_var($requestBody['method_id'], FILTER_SANITIZE_NUMBER_INT);
        $customerId = filter_var($requestBody['customer_id'], FILTER_SANITIZE_NUMBER_INT);
        $basketId = filter_var($requestBody['basket_id'], FILTER_SANITIZE_NUMBER_INT);
        $isFinalized = filter_var($requestBody['is_finalized'], FILTER_SANITIZE_NUMBER_INT);
        $sum = filter_var($requestBody['sum'], FILTER_SANITIZE_NUMBER_FLOAT);

        //@TODO: check the relations OneToMany in Doctrine
        $this->model = new Payments();
        $this->model->setMethodId((int)$methodId);
        $this->model->setCustomerId((int)$customerId);
        $this->model->setBasketId((int)$basketId);
        $this->model->setIsFinalized((bool)$isFinalized);
        $this->model->setSum((float)$sum);

        return parent::createAction($request, $response);
    }


    /**
     * @OA\Put(
     *     path="/v1/payments/{id}",
     *     description="update a single paymnet based on payment ID",
     *     @OA\Parameter(
     *          description="ID of a payment to update",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              format="int64",
     *              type="integer"
     *          )
     *      ),
    @OA\RequestBody(
     *           description="Input data format",
     *           @OA\MediaType(
     *               mediaType="multipart/form-data",
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="method_id",
     *                       description="ID of paymnet method",
     *                       type="integer",
     *                   ),
     *               ),
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="customer_id",
     *                       description="ID of customer",
     *                       type="integer",
     *                   ),
     *               ),
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="basket_id",
     *                       description="ID of basket",
     *                       type="integer",
     *                   ),
     *               ),
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="sum",
     *                       description="Paymnet amount",
     *                       type="float",
     *                   ),
     *               ),
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="is_finalized",
     *                       description="If paymnet is finalized",
     *                       type="integer",
     *                   ),
     *               ),
     *           ),
     *       ),
     * @OA\Response(
     *           response=200,
     *           description="paymnet has been created successfully",
     *       ),
     * @OA\Response(
     *           response=400,
     *           description="bad request",
     *       ),
     *     @OA\Response(
     *                response=404,
     *            description="Paymnet not found",
     *        ),
     *     @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *  )
     * @param \Slim\Psr7\Request $request
     * @param \Slim\Psr7\Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function updateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $requestBody = json_decode($request->getBody()->getContents(), true);
        $methodId = filter_var($requestBody['method_id'], FILTER_SANITIZE_NUMBER_INT);
        $customerId = filter_var($requestBody['customer_id'], FILTER_SANITIZE_NUMBER_INT);
        $basketId = filter_var($requestBody['basket_id'], FILTER_SANITIZE_NUMBER_INT);
        $isFinalized = filter_var($requestBody['is_finalized'], FILTER_SANITIZE_NUMBER_INT);
        $sum = filter_var($requestBody['sum'], FILTER_SANITIZE_NUMBER_FLOAT);

        $payment = $this->repository->findById($args['id']);
        if (is_null($payment)) {
            $context = [
                'type' => '/errors/no_payment_found_upon_update',
                'title' => 'List of methods',
                'status' => 404,
                'detail' => $args['id'],
                'instance' => '/v1/payments/{id}'
            ];
            $this->logger->info('No payments found', $context);
            return new JsonResponse($context, 404);
        }


        //@TODO: check the relations OneToMany in Doctrine
        $this->model = $payment;

        $this->model->setMethodId((int)$methodId);
        $this->model->setCustomerId((int)$customerId);
        $this->model->setBasketId((int)$basketId);
        $this->model->setIsFinalized((bool)$isFinalized);
        $this->model->setSum((float)$sum);

        return parent::updateAction($request, $response, $args);
    }

    /**
     * @OA\Get(
     *     path="/v1/paymnets/deactivate/{id}",
     *     description="Deactivates a single paymnet based on payment ID",
     *     @OA\Parameter(
     *          description="ID of a payment to update",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              format="int64",
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     *           response=200,
     *           description="paymnet has been deactivated successfully",
     *       ),
     * @OA\Response(
     *           response=400,
     *           description="bad request",
     *       ),
     *     @OA\Response(
     *                response=404,
     *            description="Payment not found",
     *        ),
     *     @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *  )
     * @param \Slim\Psr7\Request $request
     * @param \Slim\Psr7\Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function deactivateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        return parent::deactivateAction($request, $response, $args);
    }

    /**
     * @OA\Get(
     *     path="/v1/payment/reactivate/{id}",
     *     description="Reactivates a single paymnet based on payment ID",
     *     @OA\Parameter(
     *          description="ID of a payment to update",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              format="int64",
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     *           response=200,
     *           description="paymnet has been reactivated successfully",
     *       ),
     * @OA\Response(
     *           response=400,
     *           description="bad request",
     *       ),
     *     @OA\Response(
     *                response=404,
     *            description="Payment not found",
     *        ),
     *     @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *  )
     * @param \Slim\Psr7\Request $request
     * @param \Slim\Psr7\Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function reactivateAction(Request $request, Response $response, array $args): ResponseInterface
    {
        return parent::reactivateAction($request, $response, $args);
    }

    /**
     * @OA\Delete(
     *     path="/v1/payment/{id}",
     *     description="deletes a single paymnet based on payment ID",
     *     @OA\Parameter(
     *         description="ID of payment to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="paymnet has been deleted"
     *     ),
     * @OA\Response(
     *            response=400,
     *            description="bad request",
     *        ),
     * @OA\Response(
     *                 response=404,
     *             description="Payment not found",
     *         ),
     * @OA\Response(
     *             response=500,
     *             description="Internal server error",
     *         ),
     *   )
     */
    public function removeAction(Request $request, Response $response, array $args): ResponseInterface
    {
        return parent::removeAction($request, $response, $args);
    }
}
