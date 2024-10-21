<?php

namespace SethSharp\OddsApi\Enums;

/**
 * Based on the values provided: https://the-odds-api.com/sports-odds-data/bookmaker-apis.html
 */
enum BookmakersEnum: string
{
    // US Bookmakers
    case BETMGM = 'betmgm';
    case BETRIVERS = 'betrivers';
    case BETUS = 'betus';
    case BOVADA = 'bovada';
    case WILLIAMHILL_US = 'williamhill_us';
    case DRAFTKINGS = 'draftkings';
    case FANDUEL = 'fanduel';
    case LOWVIG = 'lowvig';
    case MYBOOKIEAG = 'mybookieag';
    case BALLYBET = 'ballybet';
    case BETPARX = 'betparx';
    case ESPNBET = 'espnbet';
    case FLIFF = 'fliff';
    case HARDROCKBET = 'hardrockbet';
    case WINDCREEK = 'windcreek';

    // UK Bookmakers
    case SPORT888 = 'sport888';
    case BETFAIR_EX_UK = 'betfair_ex_uk';
    case BETFAIR_SB_UK = 'betfair_sb_uk';
    case BETVICTOR = 'betvictor';
    case BETWAY = 'betway';
    case BOYLESPORTS = 'boylesports';
    case CASUMO = 'casumo';
    case CORAL = 'coral';
    case GROSVENOR = 'grosvenor';
    case LADBROKES_UK = 'ladbrokes_uk';
    case LEOVEGAS = 'leovegas';
    case LIVESCOREBET = 'livescorebet';
    case MRGREEN = 'mrgreen';
    case PADDYPOWER = 'paddypower';
    case SKYBET = 'skybet';
    case UNIBET_UK = 'unibet_uk';
    case VIRGINBET = 'virginbet';

    // EU Bookmakers
    case ONEXBET = 'onexbet';
    case BETCLIC = 'betclic';
    case BETANYS_SPORTS = 'betanysports';
    case BETFAIR_EX_EU = 'betfair_ex_eu';
    case BETONLINEAG = 'betonlineag';
    case BETSSON = 'betsson';
    case COOLBET = 'coolbet';
    case EVERYGAME = 'everygame';
    case GTBETS = 'gtbets';
    case LIVESCOREBET_EU = 'livescorebet_eu';
    case MARATHONBET = 'marathonbet';
    case MATCHBOOK_EU = 'matchbook';
    case NORDICBET = 'nordicbet';
    case PINNACLE = 'pinnacle';
    case SUPRABETS = 'suprabets';
    case TIPICO_DE = 'tipico_de';
    case UNIBET_EU = 'unibet_eu';
    case WILLIAMHILL_EU = 'williamhill';

    // AU Bookmakers
    case BETFAIR_EX_AU = 'betfair_ex_au';
    case BETR_AU = 'betr_au';
    case BETRIGHT = 'betright';
    case LADBROKES_AU = 'ladbrokes_au';
    case NEDS = 'neds';
    case PLAYUP = 'playup';
    case POINTSBETAU = 'pointsbetau';
    case SPORTSBET = 'sportsbet';
    case TAB = 'tab';
    case TABTOUCH = 'tabtouch';
    case TOPSPORT = 'topsport';
    case UNIBET_AU = 'unibet';

    // US Daily Fantasy Sports (DFS) Sites
    case PRIZEPICKS = 'prizepicks';
    case UNDERDOG = 'underdog';
}
