<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 3:02 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\Wix\Models\Address;
use Epicformbuilder\Wix\Models\Company;
use Epicformbuilder\Wix\Models\Contact as ContactModel;
use Epicformbuilder\Wix\Models\ContactEmail;
use Epicformbuilder\Wix\Models\ContactName;
use Epicformbuilder\Wix\Models\ContactPhone;
use Epicformbuilder\Wix\Models\ContactUrl;
use Epicformbuilder\Wix\Models\ImportantDate;
use Epicformbuilder\Wix\Models\PagingContactsResult as PagingContactsResultModel;
use Epicformbuilder\Wix\Models\StateLink;
use Epicformbuilder\WixHiveApi\Response;


class PagingContactsResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return PagingContactsResultModel
     */
    public function process(Response $response)
    {
        $results = array();
        foreach($response->getResponseData()->results as $result){

            $emails=array();
            foreach($result->emails as $email){
                $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
            }

            $phones = array();
            foreach($result->phones as $phone){
                $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
            }

            $addresses= array();
            foreach($result->addresses as $address){
                $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
            }

            $urls = array();
            foreach($result->urls as $url){
                $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
            }

            $dates = array();
            foreach($result->dates as $date){
                $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
            }

            $links = array();
            foreach($result->links as $link){
                $links[] = new StateLink($link->href, $link->rel);
            }

            $results[] = new ContactModel(
                $result->id,
                new ContactName($result->name->prefix, $result->name->first, $result->name->middle, $result->name->last, $result->name->suffix),
                $result->picture,
                new Company($result->company->role, $result->company->name),
                $emails,
                $phones,
                $addresses,
                $urls,
                $dates,
                $links,
                new \DateTime($result->createdAt),
                new \DateTime($result->modifiedAt)
            );
        }

        return new PagingContactsResultModel(
            $response->getResponseData()->total,
            $response->getResponseData()->pageSize,
            $response->getResponseData()->previousCursor,
            $response->getResponseData()->nextCursor,
            $results
        );
    }
}