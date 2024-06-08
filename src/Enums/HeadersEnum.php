<?php

namespace SethSharp\OddsApi\Enums;

enum HeadersEnum: string
{
    case REQUESTS_USED = 'x-requests-used';
    case REQUESTS_REMAINING_HEADER = 'x-requests-remaining';
}
