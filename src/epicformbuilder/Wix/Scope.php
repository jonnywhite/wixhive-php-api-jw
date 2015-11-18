<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:33 PM
 */
namespace Epicformbuilder\Wix;

class Scope
{
    const SITE = "site";
    const APP = "app";

    private static $allowedScopes = [self::SITE, self::APP];

    /**
     * @param string $scope
     *
     * @return bool
     */
    public static function isScopeAllowed($scope){
        return in_array($scope, self::$allowedScopes);
    }


}