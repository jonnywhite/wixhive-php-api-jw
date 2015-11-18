<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:22 AM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\Wix\Models\Address;
use Epicformbuilder\Wix\Models\Company;
use Epicformbuilder\Wix\Models\ContactEmail;
use Epicformbuilder\Wix\Models\ContactName;
use Epicformbuilder\Wix\Models\ContactPhone;
use Epicformbuilder\Wix\Models\ContactUrl;
use Epicformbuilder\Wix\Models\ImportantDate;
use Epicformbuilder\Wix\Models\StateLink;
use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\Contact as ContactModel;

class Contact implements Processor
{
    /**
     * @param Response $response
     *
     * @return ContactModel
     */
    public function process(Response $response)
    {
        $emails=[];
        foreach($response->getResponseData()->emails as $email){
            $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
        }

        $phones = [];
        foreach($response->getResponseData()->phones as $phone){
            $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
        }

        $addresses= [];
        foreach($response->getResponseData()->addresses as $address){
            $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
        }

        $urls = [];
        foreach($response->getResponseData()->urls as $url){
            $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
        }

        $dates = [];
        foreach($response->getResponseData()->dates as $date){
            $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
        }

        $links = [];
        foreach($response->getResponseData()->links as $link){
            $links[] = new StateLink($link->href, $link->rel);
        }

        return new ContactModel(
            $response->getResponseData()->id,
            new ContactName($response->getResponseData()->name->prefix, $response->getResponseData()->name->first, $response->getResponseData()->name->middle, $response->getResponseData()->name->last, $response->getResponseData()->name->suffix),
            $response->getResponseData()->picture,
            new Company($response->getResponseData()->company->role, $response->getResponseData()->company->name),
            $emails,
            $phones,
            $addresses,
            $urls,
            $dates,
            $links,
            new \DateTime($response->getResponseData()->createdAt),
            new \DateTime($response->getResponseData()->modifiedAt)
        );
    }
}