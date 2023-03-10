<?php

use App\Enums\FeeType;
use App\Models\Company;
use function PHPUnit\Framework\assertEquals;

it('should calculate percentage fee', function () {
    $company = Company::find(5);

    assertEquals(500, $company->calculateFeeAmount(10000));
    assertEquals(300, $company->calculateFeeAmount(6000));
});

it('should return the value itself if company has fee as value', function () {
    $company = Company::find(5);

    $company->fee_type = FeeType::VALUE;

    assertEquals(500, $company->calculateFeeAmount(10000));
    assertEquals(500, $company->calculateFeeAmount(6000));
});
