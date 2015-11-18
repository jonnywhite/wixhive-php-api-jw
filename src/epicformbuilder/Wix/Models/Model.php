<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/21/15
 * Time: 11:26 PM
 */
namespace Epicformbuilder\Wix\Models;

abstract class Model implements \JsonSerializable
{
    /**
     * @return \stdClass
     */
    public function jsonSerialize()
    {
        $data = new \stdClass();
        foreach($this as $key => $value) {
            if ($value === null) continue;

            $data->{$key} = $value;
        }

        return $data;
    }
}