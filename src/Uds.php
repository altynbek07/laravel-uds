<?php

namespace Altynbek07\Uds;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Uds
{
    /** @var string */
    protected $baseUrl =
    'https://api.uds.app/partner/v2';

    /**
     * Получение информации о клиенте по ID
     * @see https://docs.uds.app/#tag/Customers/paths/~1customers~1{id}/get
     *
     * @param int $id
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function customers(int $id, bool $asJson = false)
    {
        $response = $this->getHttpClient()->get($this->baseUrl . '/customers/' . $id);

        return $this->handleResponse($response, $asJson);
    }

    /**
     * Поиск клиента
     * @see https://docs.uds.app/#tag/Customers/paths/~1customers~1find/get
     *
     * @param array $requestData
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function customersFind(array $requestData, bool $asJson = false)
    {
        $response = $this->getHttpClient()->get($this->baseUrl . '/customers/find', $requestData);

        return $this->handleResponse($response, $asJson);
    }

    /**
     * Получение настроек компании
     * @see https://docs.uds.app/#tag/Settings/paths/~1settings/get
     *
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function settings(bool $asJson = false)
    {
        $response = $this->getHttpClient()->get($this->baseUrl . '/settings');

        return $this->handleResponse($response, $asJson);
    }

    /**
     * Проведение операции
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations/post
     *
     * @param array $requestData
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function createTransaction(array $requestData, bool $asJson = false)
    {
        $response = $this->getHttpClient()->post($this->baseUrl . '/operations', $requestData);

        return $this->handleResponse($response, $asJson);
    }

    /**
     * Операция возврата
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations~1{id}~1refund/post
     *
     * @param int $id
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function refundTransaction(int $id, bool $asJson = false)
    {
        $response = $this->getHttpClient()->post($this->baseUrl . '/operations/' . $id . '/refund');

        return $this->handleResponse($response, $asJson);
    }

    /**
     * Получить информацию об операции
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations~1calc/post
     *
     * @param array $requestData
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function getTransactionInformation(array $requestData, bool $asJson = false)
    {
        $response = $this->getHttpClient()->post($this->baseUrl . '/operations/calc', $requestData);

        return $this->handleResponse($response, $asJson);
    }

    /**
     * HTTP Client
     *
     * @return PendingRequest
     */
    protected function getHttpClient(): PendingRequest
    {
        return Http::withBasicAuth(config('uds.id'), config('uds.key'))->acceptJson();
    }

    /**
     * Handling response
     *
     * @param \Illuminate\Http\Client\Response $response
     * @param bool $asJson
     * @return \Illuminate\Http\JsonResponse|array
     */
    protected function handleResponse(Response $response, bool $asJson)
    {
        try {
            $response->throw();
        } catch (RequestException $error) {
            return $asJson ? response()->json($error->response->json(), $error->response->status()) : $error->response->json();
        }

        return $asJson ? response()->json($response->json(), $response->status()) : $response->json();
    }
}
