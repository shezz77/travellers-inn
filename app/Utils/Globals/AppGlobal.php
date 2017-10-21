<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 4/25/2017
 * Time: 6:30 PM
 */

namespace App\Utils\Globals;

class AppGlobal
{
    const SUPER_ADMIN =1;
    const DEFAULT_LIMIT = 100;
    const DESTINATION_PARENT = 'Continent';
    const CONTENT_TYPE_PARENT = 'Content';
    const RECENT_POST_LIMIT = 3;
    const HOME_POST_LIMIT = 6;
    const CONTINENT_ASIA='Asia';
    const CONTINENT_NORTH_AMERICA='North America';
    const CONTINENT_EUROPE='Europe';
    const CONTINENT_SOUTH_AMERICA='South America';
    const CONTINENT_OCEANIA='Oceania';
    const CONTINENT_AFRICA='Africa';
    const POST_DEFAULT_LIMIT=9;
    const ADMIN_ROLES = ['ADMIN', 'EDITOR', 'MANAGER'];
    const USER_ROLES = ['REGISTER', 'GUEST'];
}