# Swagger\Client\MessageApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getMessage**](MessageApi.md#getMessage) | **GET** /message/ | Get list of messages sent or received
[**getMessageById**](MessageApi.md#getMessageById) | **GET** /message/{uid}/ | Get message details by id.
[**sendMessage**](MessageApi.md#sendMessage) | **POST** /message/ | Send a message to a list of phone numbers


# **getMessage**
> \Swagger\Client\Model\InlineResponse2001 getMessage($api_version, $direction, $account_uid, $state, $offset, $limit)

Get list of messages sent or received

Get list of messages sent or received. Sorted by descending order of `queued_time` (latest messages are first)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$direction = "direction_example"; // string | Message direction, inbound or outbound to filter on. If not provided, the filter is not applied.
$account_uid = "account_uid_example"; // string | Filter the result list by the account which sent the message - If not provided or `null` or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set `account_uid`   to main account's uid.
$state = "state_example"; // string | Filter the result on the basis of message state.
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.

try {
    $result = $apiInstance->getMessage($api_version, $direction, $account_uid, $state, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->getMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **direction** | **string**| Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. | [optional]
 **account_uid** | **string**| Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. | [optional]
 **state** | **string**| Filter the result on the basis of message state. | [optional]
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMessageById**
> \Swagger\Client\Model\InlineResponse2002 getMessageById($uid, $api_version)

Get message details by id.

Get message details by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the message to get.
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $result = $apiInstance->getMessageById($uid, $api_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->getMessageById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the message to get. |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

[**\Swagger\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendMessage**
> \Swagger\Client\Model\InlineResponse202 sendMessage($api_version, $message)

Send a message to a list of phone numbers

Send a message to a list of destinations.   - A successful `202` response means that a message record has been created in Karix.     It does not mean that each message was successfully `queued`, `sent` or `delivered`.   - To know the status of the message check the parameter `status` of the message record.   - Message records might be created with a `failed` state due issues with Karix or     validation issues. Please check `error` to know the reason of the failure.     No balance is deducted and `total_cost` is always zero for such cases.   - Message records might be updated to state `undelivered`. This is due to carrier/operator     related issues. Please check `error` to know the reason of the failure.     Balance is still deducted for such cases.   - Since this is a bulk API the response structure follows the List Response format     rather than the Single Response format.   - Once queued, the messages for your account are dequeued and processed at a     rate set for your account (defaults to 5 messages per second).     Contact [sales](support@karix.io) to get your rate limit increased.   - For fair usage, there is no rate limiting for queueing messages using this     API. Dequeue rate would still be applicable as stated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$message = new \Swagger\Client\Model\CreateMessage(); // \Swagger\Client\Model\CreateMessage | Create Message object

try {
    $result = $apiInstance->sendMessage($api_version, $message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->sendMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **message** | [**\Swagger\Client\Model\CreateMessage**](../Model/CreateMessage.md)| Create Message object | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse202**](../Model/InlineResponse202.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

