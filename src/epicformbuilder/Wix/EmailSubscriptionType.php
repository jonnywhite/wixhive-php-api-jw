<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:18 PM
 */
namespace Epicformbuilder\Wix;


class EmailSubscriptionType
{
    const OPT_OUT = "optOut";
    const TRANSACTIONAL = "transactional";
    const RECURRING = "recurring";

    private static $allowedTypes = array(self::OPT_OUT, self::TRANSACTIONAL, self::RECURRING);

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function isTypeAllowed($type){
        return in_array($type, self::$allowedTypes);
    }


}