<?php
/**
 * Message
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * karix api
 *
 * # Overview  Karix API lets you interact with the Karix platform. It allows you to query your account, set up webhooks, send messages and buy phone numbers.  # API and Clients Versioning  Karix APIs are versioned using the format vX.Y where X is the major version number and Y is minor. All minor version changes are backwards compatible but major releases are not. Please be careful when upgrading.  A new user account is pinned to the latest version at the time of first request. By default every request sent Karix is processed using that version, even if there have been subsequent breaking changes. This is done to prevent existing user applications from breaking. You can change the pinned version for your account using the account dashboard. The default API version can be overridden by specifying the header `api-version`. Note: Specifying this value will not change your pinned version for other calls.  Karix also provides HTTP API clients for all major languages. Release versions of these clients correspond to their API Version supported. Client version vX.Y.Z supports API version vX.Y. HTTP Clients are configured to use `api-version` header for that client version. When using official Karix HTTP Clients only, you dont need to concern yourself with pinned version. To upgrade your API version simply update the client.  # Common Request Structures  All Karix APIs follow a common REST format with the following resources:   - account   - message   - webhook   - number  ## Creating a resource To create a request send a `POST` request with the desired parameters in a JSON object to `/<resource>/` url. A successful response will contain the details of the single resource created with HTTP status code `201 Created`. Note: An exception to this is the `Create Message` API which is a bulk API and returns       a list of message records.  ## Fetching a resource To fetch a resource by its Unique ID send a `GET` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource. A successful response will contain the details of the single resource fetched with HTTP status code `200 OK`  ## Editing a resource To edit certain parameters of a resource send a `PATCH` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource, with a JSON object containing only the parameters which need to be updated. Edit resource APIs generally have no required parameters. A successful response will contain all the details of the single resource after editing.  ## Deleting a resource To delete a resource send a `DELETE` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource. A successful response will return HTTP status code `204 No Content` with no body.  ## Fetching a list of resources To fetch a list of resources send a `GET` request to `/<resource>/` with filters as GET parameters. A successful response will contain a list of filtered paginated objects with HTTP status code `200 OK`.  ### Pagination Pagination for list APIs are controlled using GET parameters:   - `limit`: Number of objects to be returned   - `offset`: Number of objects to skip before collecting the output list.  # Common Response Structures  All Karix APIs follow some common respose structures.  ## Success Responses  ### Single Resource Response  Responses returning a single object will have the following keys | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | | data          |               | Details of the object                     |  ### List Resource Response  Responses returning a list of objects will have the following keys | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | |               | previous      | Link to the previous page of the list     | |               | next          | Link to the next page of the list         | |               | count         | Total number of objects over all pages    | |               | limit         | Limit the API was requested with          | |               | offset        | Page Offset the API was requested with    | | objects       |               | List of objects with details              |  ## Error Responses  ### Validation Error Response  Responses for requests which failed due to validation errors will have the follwing keys: | Key           | Child Key     | Description                                | |:------------- |:------------- |:------------------------------------------ | | meta          |               | Meta Details about request and response    | |               | request_uuid  | Unique request identifier                  | | error         |               | Details for the error                      | |               | message       | Error message                              | |               | param         | (Optional) parameter this error relates to |  Validation error responses will return HTTP Status Code `400 Bad Request`  ### Insufficient Balance Response  Some requests will require to consume account credits. In case of insufficient balance the following keys will be returned: | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | | error         |               | Details for the error                     | |               | message       | `Insufficient Balance`                    |  Insufficient balance response will return HTTP Status Code `402 Payment Required`
 *
 * OpenAPI spec version: 1.0
 * Contact: support@karix.io
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * Message Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Message implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Message';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'uid' => 'string',
        'account_uid' => 'string',
        'source' => 'string',
        'destination' => 'string',
        'status' => 'string',
        'text' => 'string',
        'queued_time' => 'string',
        'sent_time' => 'string',
        'updated_time' => 'string',
        'direction' => 'string',
        'error' => '\Swagger\Client\Model\MessageError',
        'rate' => 'string',
        'refund' => 'string',
        'total_cost' => 'string',
        'parts' => 'int',
        'message_type' => 'string',
        'mobile_country_code' => 'string',
        'mobile_network_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'uid' => null,
        'account_uid' => null,
        'source' => null,
        'destination' => null,
        'status' => null,
        'text' => null,
        'queued_time' => null,
        'sent_time' => null,
        'updated_time' => null,
        'direction' => null,
        'error' => null,
        'rate' => 'number',
        'refund' => 'number',
        'total_cost' => null,
        'parts' => null,
        'message_type' => null,
        'mobile_country_code' => null,
        'mobile_network_code' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'uid' => 'uid',
        'account_uid' => 'account_uid',
        'source' => 'source',
        'destination' => 'destination',
        'status' => 'status',
        'text' => 'text',
        'queued_time' => 'queued_time',
        'sent_time' => 'sent_time',
        'updated_time' => 'updated_time',
        'direction' => 'direction',
        'error' => 'error',
        'rate' => 'rate',
        'refund' => 'refund',
        'total_cost' => 'total_cost',
        'parts' => 'parts',
        'message_type' => 'message_type',
        'mobile_country_code' => 'mobile_country_code',
        'mobile_network_code' => 'mobile_network_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'uid' => 'setUid',
        'account_uid' => 'setAccountUid',
        'source' => 'setSource',
        'destination' => 'setDestination',
        'status' => 'setStatus',
        'text' => 'setText',
        'queued_time' => 'setQueuedTime',
        'sent_time' => 'setSentTime',
        'updated_time' => 'setUpdatedTime',
        'direction' => 'setDirection',
        'error' => 'setError',
        'rate' => 'setRate',
        'refund' => 'setRefund',
        'total_cost' => 'setTotalCost',
        'parts' => 'setParts',
        'message_type' => 'setMessageType',
        'mobile_country_code' => 'setMobileCountryCode',
        'mobile_network_code' => 'setMobileNetworkCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'uid' => 'getUid',
        'account_uid' => 'getAccountUid',
        'source' => 'getSource',
        'destination' => 'getDestination',
        'status' => 'getStatus',
        'text' => 'getText',
        'queued_time' => 'getQueuedTime',
        'sent_time' => 'getSentTime',
        'updated_time' => 'getUpdatedTime',
        'direction' => 'getDirection',
        'error' => 'getError',
        'rate' => 'getRate',
        'refund' => 'getRefund',
        'total_cost' => 'getTotalCost',
        'parts' => 'getParts',
        'message_type' => 'getMessageType',
        'mobile_country_code' => 'getMobileCountryCode',
        'mobile_network_code' => 'getMobileNetworkCode'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const STATUS_QUEUED = 'queued';
    const STATUS_SENT = 'sent';
    const STATUS_FAILED = 'failed';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_UNDELIVERED = 'undelivered';
    const STATUS_REJECTED = 'rejected';
    const DIRECTION_INBOUND = 'inbound';
    const DIRECTION_OUTBOUND = 'outbound';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_QUEUED,
            self::STATUS_SENT,
            self::STATUS_FAILED,
            self::STATUS_DELIVERED,
            self::STATUS_UNDELIVERED,
            self::STATUS_REJECTED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDirectionAllowableValues()
    {
        return [
            self::DIRECTION_INBOUND,
            self::DIRECTION_OUTBOUND,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['uid'] = isset($data['uid']) ? $data['uid'] : null;
        $this->container['account_uid'] = isset($data['account_uid']) ? $data['account_uid'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
        $this->container['destination'] = isset($data['destination']) ? $data['destination'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['text'] = isset($data['text']) ? $data['text'] : null;
        $this->container['queued_time'] = isset($data['queued_time']) ? $data['queued_time'] : null;
        $this->container['sent_time'] = isset($data['sent_time']) ? $data['sent_time'] : null;
        $this->container['updated_time'] = isset($data['updated_time']) ? $data['updated_time'] : null;
        $this->container['direction'] = isset($data['direction']) ? $data['direction'] : null;
        $this->container['error'] = isset($data['error']) ? $data['error'] : null;
        $this->container['rate'] = isset($data['rate']) ? $data['rate'] : null;
        $this->container['refund'] = isset($data['refund']) ? $data['refund'] : null;
        $this->container['total_cost'] = isset($data['total_cost']) ? $data['total_cost'] : null;
        $this->container['parts'] = isset($data['parts']) ? $data['parts'] : null;
        $this->container['message_type'] = isset($data['message_type']) ? $data['message_type'] : null;
        $this->container['mobile_country_code'] = isset($data['mobile_country_code']) ? $data['mobile_country_code'] : null;
        $this->container['mobile_network_code'] = isset($data['mobile_network_code']) ? $data['mobile_network_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDirectionAllowableValues();
        if (!in_array($this->container['direction'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'direction', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getDirectionAllowableValues();
        if (!in_array($this->container['direction'], $allowedValues)) {
            return false;
        }
        return true;
    }


    /**
     * Gets uid
     *
     * @return string
     */
    public function getUid()
    {
        return $this->container['uid'];
    }

    /**
     * Sets uid
     *
     * @param string $uid Unique ID for a message sent or received
     *
     * @return $this
     */
    public function setUid($uid)
    {
        $this->container['uid'] = $uid;

        return $this;
    }

    /**
     * Gets account_uid
     *
     * @return string
     */
    public function getAccountUid()
    {
        return $this->container['account_uid'];
    }

    /**
     * Sets account_uid
     *
     * @param string $account_uid Unique ID of Account which created this message
     *
     * @return $this
     */
    public function setAccountUid($account_uid)
    {
        $this->container['account_uid'] = $account_uid;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source Sender ID for the message
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param string $destination Destination number for the message in E.164 format
     *
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->container['destination'] = $destination;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Current status of the message. Possible values: - `queued`: Message has been queued in Karix system             (for either `inbound` or `outbound` direction) - `sent`: The `outbound` message has been sent to carriers for delivery - `failed`: In case of `outbound` message, this means that Karix failed             to send the message to a carrier.             In case of `inbound` message, this means that Karix failed             to send the message to its webhook, if configured. - `delivered`: The `outbound` message was delivered to its receiver. - `undelivered`: The `outbound` message falied to be delivered to its receiver. - `rejected`: The `outbound` message was rejected by the chosen carrier.
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets text
     *
     * @return string
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string $text Text of the message to be sent. - Message can contain non-GSM and unicode characters - A GSM only message with more than 160 characters will be automatically broken   into parts each of length 153 for billing purposes - A Non-GSM (and unicode) message with more than 70 characters will be automatically   broken into parts each of length 67 for billing purposes
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets queued_time
     *
     * @return \DateTime
     */
    public function getQueuedTime()
    {
        return $this->container['queued_time'];
    }

    /**
     * Sets queued_time
     *
     * @param \DateTime $queued_time The timestamp when message was accepted and queued in Karix system
     *
     * @return $this
     */
    public function setQueuedTime($queued_time)
    {
        $this->container['queued_time'] = $queued_time;

        return $this;
    }

    /**
     * Gets sent_time
     *
     * @return \DateTime
     */
    public function getSentTime()
    {
        return $this->container['sent_time'];
    }

    /**
     * Sets sent_time
     *
     * @param \DateTime $sent_time The timestamp when the message was processed and sent to destination
     *
     * @return $this
     */
    public function setSentTime($sent_time)
    {
        $this->container['sent_time'] = $sent_time;

        return $this;
    }

    /**
     * Gets updated_time
     *
     * @return \DateTime
     */
    public function getUpdatedTime()
    {
        return $this->container['updated_time'];
    }

    /**
     * Sets updated_time
     *
     * @param \DateTime $updated_time The timestamp when the status of message was last updated. - If the current status is `delivered` then this timestamp also represents   delivered time - If the current status is `undelivered` then this timestamp also represents   undelivered time
     *
     * @return $this
     */
    public function setUpdatedTime($updated_time)
    {
        $this->container['updated_time'] = $updated_time;

        return $this;
    }

    /**
     * Gets direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction
     *
     * @param string $direction Direction of the message. - inbound: Message was sent to a number owned by the karix account - outbound: Message was sent to a destination using karix account
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $allowedValues = $this->getDirectionAllowableValues();
        if (!is_null($direction) && !in_array($direction, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'direction', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['direction'] = $direction;

        return $this;
    }

    /**
     * Gets error
     *
     * @return \Swagger\Client\Model\MessageError
     */
    public function getError()
    {
        return $this->container['error'];
    }

    /**
     * Sets error
     *
     * @param \Swagger\Client\Model\MessageError $error error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->container['error'] = $error;

        return $this;
    }

    /**
     * Gets rate
     *
     * @return BigDecimal
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param BigDecimal $rate Cost per part of this message. Refer to [`text`](#/definitions/Message/properties/text)
     *
     * @return $this
     */
    public function setRate($rate)
    {
        $this->container['rate'] = $rate;

        return $this;
    }

    /**
     * Gets refund
     *
     * @return BigDecimal
     */
    public function getRefund()
    {
        return $this->container['refund'];
    }

    /**
     * Sets refund
     *
     * @param BigDecimal $refund In case we are unable to send the message to destination after queueing we will refund the `total_cost` you were charged. `null` if there was no refund.
     *
     * @return $this
     */
    public function setRefund($refund)
    {
        $this->container['refund'] = $refund;

        return $this;
    }

    /**
     * Gets total_cost
     *
     * @return string
     */
    public function getTotalCost()
    {
        return $this->container['total_cost'];
    }

    /**
     * Sets total_cost
     *
     * @param string $total_cost Total cost for this message including all parts. Refer to [`text`](#/definitions/Message/properties/text)
     *
     * @return $this
     */
    public function setTotalCost($total_cost)
    {
        $this->container['total_cost'] = $total_cost;

        return $this;
    }

    /**
     * Gets parts
     *
     * @return int
     */
    public function getParts()
    {
        return $this->container['parts'];
    }

    /**
     * Sets parts
     *
     * @param int $parts Number of parts to the message if the message was too long Refer to [`text`](#/definitions/Message/properties/text)
     *
     * @return $this
     */
    public function setParts($parts)
    {
        $this->container['parts'] = $parts;

        return $this;
    }

    /**
     * Gets message_type
     *
     * @return string
     */
    public function getMessageType()
    {
        return $this->container['message_type'];
    }

    /**
     * Sets message_type
     *
     * @param string $message_type message_type
     *
     * @return $this
     */
    public function setMessageType($message_type)
    {
        $this->container['message_type'] = $message_type;

        return $this;
    }

    /**
     * Gets mobile_country_code
     *
     * @return string
     */
    public function getMobileCountryCode()
    {
        return $this->container['mobile_country_code'];
    }

    /**
     * Sets mobile_country_code
     *
     * @param string $mobile_country_code Mobile Country Code of the destination number. Refer to [Wikipedia: Mobile country code](https://en.wikipedia.org/wiki/Mobile_country_code)
     *
     * @return $this
     */
    public function setMobileCountryCode($mobile_country_code)
    {
        $this->container['mobile_country_code'] = $mobile_country_code;

        return $this;
    }

    /**
     * Gets mobile_network_code
     *
     * @return string
     */
    public function getMobileNetworkCode()
    {
        return $this->container['mobile_network_code'];
    }

    /**
     * Sets mobile_network_code
     *
     * @param string $mobile_network_code Mobile Network Code of the destination number. Refer to [Wikipedia: Mobile country code](https://en.wikipedia.org/wiki/Mobile_country_code)
     *
     * @return $this
     */
    public function setMobileNetworkCode($mobile_network_code)
    {
        $this->container['mobile_network_code'] = $mobile_network_code;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


