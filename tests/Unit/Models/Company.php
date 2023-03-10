<?php

use App\Models\Company;
use function PHPUnit\Framework\assertEquals;

it('should calculate percentage fee', function () {
    $company = Company::find(5);

    assertEquals(500, $company->calculateFeeAmount(100));
    assertEquals(300, $company->calculateFeeAmount(60));
});
