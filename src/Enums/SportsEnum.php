<?php

namespace SethSharp\OddsApi\Enums;

enum SportsEnum: string
{
    // American Football
    case AMERICANFOOTBALL_CFL = 'americanfootball_cfl';
    case AMERICANFOOTBALL_NCAAF = 'americanfootball_ncaaf';
    case AMERICANFOOTBALL_NCAAF_CHAMPIONSHIP_WINNER = 'americanfootball_ncaaf_championship_winner';
    case AMERICANFOOTBALL_NFL = 'americanfootball_nfl';
    case AMERICANFOOTBALL_NFL_PRESEASON = 'americanfootball_nfl_preseason';
    case AMERICANFOOTBALL_NFL_SUPER_BOWL_WINNER = 'americanfootball_nfl_super_bowl_winner';
    case AMERICANFOOTBALL_UFL = 'americanfootball_ufl';

    // Aussie Rules
    case AUSSIERULES_AFL = 'aussierules_afl';

    // Baseball
    case BASEBALL_MLB = 'baseball_mlb';
    case BASEBALL_MLB_PRESEASON = 'baseball_mlb_preseason';
    case BASEBALL_MLB_WORLD_SERIES_WINNER = 'baseball_mlb_world_series_winner';
    case BASEBALL_MILB = 'baseball_milb';
    case BASEBALL_NPB = 'baseball_npb';
    case BASEBALL_KBO = 'baseball_kbo';
    case BASEBALL_NCAA = 'baseball_ncaa';

    // Basketball
    case BASKETBALL_EUROLEAGUE = 'basketball_euroleague';
    case BASKETBALL_NBA = 'basketball_nba';
    case BASKETBALL_NBA_CHAMPIONSHIP_WINNER = 'basketball_nba_championship_winner';
    case BASKETBALL_WNBA = 'basketball_wnba';
    case BASKETBALL_NCAAB = 'basketball_ncaab';
    case BASKETBALL_NCAAB_CHAMPIONSHIP_WINNER = 'basketball_ncaab_championship_winner';

    // Boxing
    case BOXING_BOXING = 'boxing_boxing';

    // Cricket
    case CRICKET_BIG_BASH = 'cricket_big_bash';
    case CRICKET_CARIBBEAN_PREMIER_LEAGUE = 'cricket_caribbean_premier_league';
    case CRICKET_ICC_WORLD_CUP = 'cricket_icc_world_cup';
    case CRICKET_INTERNATIONAL_T20 = 'cricket_international_t20';
    case CRICKET_IPL = 'cricket_ipl';
    case CRICKET_ODI = 'cricket_odi';
    case CRICKET_PSL = 'cricket_psl';
    case CRICKET_T20_BLAST = 'cricket_t20_blast';
    case CRICKET_TEST_MATCH = 'cricket_test_match';

    // Golf
    case GOLF_MASTERS_TOURNAMENT_WINNER = 'golf_masters_tournament_winner';
    case GOLF_PGA_CHAMPIONSHIP_WINNER = 'golf_pga_championship_winner';
    case GOLF_THE_OPEN_WINNER = 'golf_the_open_championship_winner';
    case GOLF_US_OPEN_WINNER = 'golf_us_open_winner';

    // Ice Hockey
    case ICEHOCKEY_NHL = 'icehockey_nhl';
    case ICEHOCKEY_NHL_CHAMPIONSHIP_WINNER = 'icehockey_nhl_championship_winner';
    case ICEHOCKEY_SHL = 'icehockey_sweden_hockey_league';
    case ICEHOCKEY_HOCKEYALLSVENSKAN = 'icehockey_sweden_allsvenskan';

    // Lacrosse
    case LACROSSE_PLL = 'lacrosse_pll';

    // MMA
    case MMA_MIXED_MARTIAL_ARTS = 'mma_mixed_martial_arts';

    // Politics
    case POLITICS_US_PRESIDENTIAL_ELECTION_WINNER = 'politics_us_presidential_election_winner';

    // Rugby League
    case RUGBYLEAGUE_NRL = 'rugbyleague_nrl';

    // Soccer
    case SOCCER_AFRICA_CUP_OF_NATIONS = 'soccer_africa_cup_of_nations';
    case SOCCER_ARGENTINA_PRIMERA_DIVISION = 'soccer_argentina_primera_division';
    case SOCCER_AUSTRALIA_ALEAGUE = 'soccer_australia_aleague';
    case SOCCER_AUSTRIA_BUNDESLIGA = 'soccer_austria_bundesliga';
    case SOCCER_BELGIUM_FIRST_DIV = 'soccer_belgium_first_div';
    case SOCCER_BRAZIL_CAMPEONATO = 'soccer_brazil_campeonato';
    case SOCCER_BRAZIL_SERIE_B = 'soccer_brazil_serie_b';
    case SOCCER_CHILE_CAMPEONATO = 'soccer_chile_campeonato';
    case SOCCER_CHINA_SUPERLEAGUE = 'soccer_china_superleague';
    case SOCCER_DENMARK_SUPERLIGA = 'soccer_denmark_superliga';
    case SOCCER_EFL_CHAMP = 'soccer_efl_champ';
    case SOCCER_ENGLAND_EFL_CUP = 'soccer_england_efl_cup';
    case SOCCER_ENGLAND_LEAGUE1 = 'soccer_england_league1';
    case SOCCER_ENGLAND_LEAGUE2 = 'soccer_england_league2';
    case SOCCER_EPL = 'soccer_epl';
    case SOCCER_FA_CUP = 'soccer_fa_cup';
    case SOCCER_FIFA_WORLD_CUP = 'soccer_fifa_world_cup';
    case SOCCER_FIFA_WORLD_CUP_WOMENS = 'soccer_fifa_world_cup_womens';
    case SOCCER_FINLAND_VEIKKAUSLIIGA = 'soccer_finland_veikkausliiga';
    case SOCCER_FRANCE_LIGUE_ONE = 'soccer_france_ligue_one';
    case SOCCER_FRANCE_LIGUE_TWO = 'soccer_france_ligue_two';
    case SOCCER_GERMANY_BUNDESLIGA = 'soccer_germany_bundesliga';
    case SOCCER_GERMANY_BUNDESLIGA2 = 'soccer_germany_bundesliga2';
    case SOCCER_GERMANY_LIGA3 = 'soccer_germany_liga3';
    case SOCCER_GREECE_SUPER_LEAGUE = 'soccer_greece_super_league';
    case SOCCER_ITALY_SERIE_A = 'soccer_italy_serie_a';
    case SOCCER_ITALY_SERIE_B = 'soccer_italy_serie_b';
    case SOCCER_JAPAN_J_LEAGUE = 'soccer_japan_j_league';
    case SOCCER_KOREA_KLEAGUE1 = 'soccer_korea_kleague1';
    case SOCCER_LEAGUE_OF_IRELAND = 'soccer_league_of_ireland';
    case SOCCER_MEXICO_LIGAMX = 'soccer_mexico_ligamx';
    case SOCCER_NETHERLANDS_EREDIVISIE = 'soccer_netherlands_eredivisie';
    case SOCCER_NORWAY_ELITESERIEN = 'soccer_norway_eliteserien';
    case SOCCER_POLAND_EKSTRAKLASA = 'soccer_poland_ekstraklasa';
    case SOCCER_PORTUGAL_PRIMEIRA_LIGA = 'soccer_portugal_primeira_liga';
    case SOCCER_SPAIN_LA_LIGA = 'soccer_spain_la_liga';
    case SOCCER_SPAIN_SEGUNDA_DIVISION = 'soccer_spain_segunda_division';
    case SOCCER_SCOTLAND_PREMIERSHIP = 'soccer_spl';
    case SOCCER_SWEDEN_ALLSVENSKAN = 'soccer_sweden_allsvenskan';
    case SOCCER_SWEDEN_SUPERETTAN = 'soccer_sweden_superettan';
    case SOCCER_SWITZERLAND_SUPERLEAGUE = 'soccer_switzerland_superleague';
    case SOCCER_TURKEY_SUPER_LEAGUE = 'soccer_turkey_super_league';
    case SOCCER_UEFA_EUROPA_CONFERENCE_LEAGUE = 'soccer_uefa_europa_conference_league';
    case SOCCER_UEFA_CHAMPS_LEAGUE = 'soccer_uefa_champs_league';
    case SOCCER_UEFA_CHAMPS_LEAGUE_QUALIFICATION = 'soccer_uefa_champs_league_qualification';
    case SOCCER_UEFA_EUROPA_LEAGUE = 'soccer_uefa_europa_league';
    case SOCCER_UEFA_EUROPEAN_CHAMPIONSHIP = 'soccer_uefa_european_championship';
    case SOCCER_UEFA_EURO_QUALIFICATION = 'soccer_uefa_euro_qualification';
    case SOCCER_UEFA_NATIONS_LEAGUE = 'soccer_uefa_nations_league';
    case SOCCER_CONMEBOL_LIBERTADORES = 'soccer_conmebol_libertadores';
    case SOCCER_CONMEBOL_SUDAMERICANA = 'soccer_conmebol_sudamericana';
    case SOCCER_USL = 'soccer_usl';
    case SOCCER_MLS = 'soccer_usa_mls';

    // Table Tennis
    case TABLETENNIS_WTT = 'tabletennis_wtt';
}
