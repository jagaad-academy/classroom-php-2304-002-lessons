<?php
/**
 * PaymnetsController.php
 * hennadii.shvedko
 * 04.10.2023
 */

namespace PaymentApi\Controller;

use Doctrine\ORM\Exception\NotSupported;
use Laminas\Diactoros\Response\JsonResponse;
use PaymentApi\Model\Basket;
use PaymentApi\Repository\BasketRepository;
use PaymentApi\Repository\CustomersRepository;
use PaymentApi\Repository\CustomersRepositoryDoctrine;
use PaymentApi\Routes;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BasketController extends A_Controller
{
    private CustomersRepositoryDoctrine $customersRepository;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->routeEnum = Routes::Basket;
        $this->routeValue = Routes::Basket->value;
        $this->repository = $container->get(BasketRepository::class);
        $this->customersRepository = $container->get(CustomersRepository::class);
    }

    /**
     * @OA\Get(
     *     path="/v1/basket",
     *     description="Returns all baskets",
     *     @OA\Response(
     *          response=200,
     *          description="basket response",
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
     * @OA\Get(
     *     path="/v1/basket/{id}",
     *     description="Returns particular basket record",
     *     @OA\Response(
     *          response=200,
     *          description="basket response",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *      ),
     *   )
     * )
     * @return \Laminas\Diactoros\Response
     */
    public function getAction(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $basketId = $args['id'];
        /** @var Basket $basket */
        $basket = $this->repository->findById($basketId);
        return new JsonResponse([
            'type' => '',
            'title' => 'List of ' . $this->routeValue,
            'status' => 200,
            'detail' => [
                'product name' => $basket->getProductName(),
                'product GTIN' => $basket->getProductGTIN(),
                'product qnt' => $basket->getQuantity(),
                'product amount' => $basket->getAmount(),
                'customer name' => $basket->getCustomer()->getName(),
                'customer address' => $basket->getCustomer()->getAddress(),
            ],
            'instance' => '/v1/' . $this->routeValue
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/v1/basket",
     *     description="Creates a payment",
     *     @OA\RequestBody(
     *          description="Input data format",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="product_name",
     *                      description="Name of the product",
     *                      type="string",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="product_gtin",
     *                      description="GTIN of the product",
     *                      type="string",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="quantity",
     *                      description="Quantity of product",
     *                      type="integer",
     *                  ),
     *              ),
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="amount",
     *                      description="Basket product amount",
     *                      type="float",
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
     *          ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="basket records has been created successfully",
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
     * @throws NotSupported
     */
    public function createAction(Request $request, ResponseInterface $response): ResponseInterface
    {
        $requestBody = json_decode($request->getBody()->getContents(), true);
        $productName = filter_var($requestBody['product_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $productGtin = filter_var($requestBody['product_gtin'], FILTER_SANITIZE_SPECIAL_CHARS);
        $qnt = filter_var($requestBody['qnt'], FILTER_SANITIZE_NUMBER_INT);
        $amount = filter_var($requestBody['amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $customerId = filter_var($requestBody['customer_id'], FILTER_SANITIZE_NUMBER_INT);

        $customer = $this->customersRepository->findById($customerId);
        if (is_null($customer)) {
            $context = [
                'type' => '/errors/no_customers_found_upon_basket_creat',
                'title' => 'Customer not found',
                'status' => 404,
                'detail' => $customerId,
                'instance' => '/v1/basket'
            ];
            $this->logger->info('No customers found', $context);
            return new JsonResponse($context, 404);
        }

        $this->model = new Basket();
        $this->model->setProductName($productName);
        $this->model->setProductGTIN($productGtin);
        $this->model->setQuantity($qnt);
        $this->model->setAmount($amount);
        $this->model->setCustomer($customer);

        return parent::createAction($request, $response);
    }


    public function updateAction(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //@TODO: add documentation
        //@TODO: add logic
    }

    //@TODO: add documentation
    public function deactivateAction(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return parent::deactivateAction($request, $response, $args);
    }

//@TODO: add documentation
    public function reactivateAction(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return parent::reactivateAction($request, $response, $args);
    }

//@TODO: add documentation
    public function removeAction(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return parent::removeAction($request, $response, $args);
    }
}
