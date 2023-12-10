<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    public function makeAuditNewValues($model): string
    {
        $newValues = [];
        foreach ($model->getAttributes() as $key => $value) {
            $newValues[$key] = $value;
        }
        return json_encode($newValues);
    }
}
