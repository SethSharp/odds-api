<?php

namespace Traits;

use PHPUnit\Framework\TestCase;
use SethSharp\OddsApi\Traits\UseValidatesParams;

class UseValidatesParamsTest extends TestCase
{
    use UseValidatesParams;

    /** @test */
    public function if_param_is_not_within_required_params_throw_exception()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->validateParams([], [
            'all'
        ]);
    }

    /** @test */
    public function will_pass_if_all_params_are_provided()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->validateParams([
            'markets',
            'regions'
        ], [
            'markets',
            'regions'
        ]);
    }
}