<?php

namespace Altynbek07\Uds\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\JsonResponse|array customers(int $id, bool $asJson = false)
 * @method static \Illuminate\Http\JsonResponse|array customersFind(array $requestData, bool $asJson = false)
 * @method static \Illuminate\Http\JsonResponse|array settings(bool $asJson = false)
 * @method static \Illuminate\Http\JsonResponse|array createTransaction(array $requestData, bool $asJson = false)
 * @method static \Illuminate\Http\JsonResponse|array refundTransaction(int $id, bool $asJson = false)
 * @method static \Illuminate\Http\JsonResponse|array getTransactionInformation(array $requestData, bool $asJson = false)
 *
 * @see \Altynbek07\Uds\Uds
 */
class Uds extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-uds';
    }
}
