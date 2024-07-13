<?php

namespace SethSharp\OddsApi\Enums;

enum SportsEnum: string
{
    // todo: https://the-odds-api.com/sports-odds-data/sports-apis.html
    // Benefits are that you don't need to remember the exact naming, just start typing the sport in the enum
    case RUGBYLEAGUE_NRL = 'rugbyleague_nrl';
    case AUSSIERULES_AFL = 'aussierules_afl';
}
