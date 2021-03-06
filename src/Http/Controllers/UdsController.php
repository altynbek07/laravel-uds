<?php

namespace Altynbek07\Uds\Http\Controllers;

use Altynbek07\Uds\Facades\Uds;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UdsController extends Controller
{
    /**
     * Получение информации о клиенте по ID
     * @see https://docs.uds.app/#tag/Customers/paths/~1customers~1{id}/get
     *
     * @param int $param
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function customers(int $id)
    {
        return Uds::customers($id, true);
    }

    /**
     * Поиск клиента
     * @see https://docs.uds.app/#tag/Customers/paths/~1customers~1find/get
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function customersFind(Request $request)
    {
        return Uds::customersFind($request->query(), true);
    }

    /**
     * Получение настроек компании
     * @see https://docs.uds.app/#tag/Settings/paths/~1settings/get
     *
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function settings()
    {
        return Uds::settings(true);
    }

    /**
     * Проведение операции
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations/post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|array
     */
    public function createTransaction(Request $request)
    {
        return Uds::createTransaction($request->all(), true);
    }

    /**
     * Операция возврата
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations~1{id}~1refund/post
     *
     * @param  @param int $param
     * @return \Illuminate\Http\JsonResponse|array|array
     */
    public function refundTransaction(int $id)
    {
        return Uds::refundTransaction($id, true);
    }

    /**
     * Получить информацию об операции
     * @see https://docs.uds.app/#tag/Operations/paths/~1operations~1calc/post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|array|array
     */
    public function getTransactionInformation(Request $request)
    {
        return Uds::getTransactionInformation($request->all(), true);
    }
}
