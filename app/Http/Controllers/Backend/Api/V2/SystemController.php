<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) 杭州白书科技有限公司
 */

namespace App\Http\Controllers\Backend\Api\V2;

use App\Meedu\MeEdu;
use App\Meedu\ServiceV2\Services\ConfigServiceInterface;

class SystemController extends BaseController
{
    public function config(ConfigServiceInterface $configService)
    {
        $config = [
            'video' => [
                'default_service' => $configService->getVideoDefaultService(),
            ],
            'system' => [
                //系统版本
                'version' => MeEdu::VERSION,
                //logo
                'logo' => $configService->getLogo(),
                //访问地址
                'url' => [
                    'api' => rtrim($configService->getApiUrl()),
                    'pc' => rtrim($configService->getPCUrl()),
                    'h5' => rtrim($configService->getH5Url()),
                ],
            ],
        ];

        return $this->successData($config);
    }
}
