<?php
// Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
// SPDX-License-Identifier: Apache-2.0

/**
 *  ABOUT THIS PHP SAMPLE: This sample is part of the SDK for PHP Developer Guide topic at
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/iam-examples-working-with-policies.html
 *
 */
// snippet-start:[cognito.php.user_pool.delete_user_pool_client.complete]
// snippet-start:[cognito.php.user_pool.delete_user_pool_client.import]

require 'vendor/autoload.php';

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\Exception\AwsException;

// snippet-end:[cognito.php.user_pool.delete_user_pool_client.import]

/**
 * 
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

 // snippet-start:[cognito.php.user_pool.delete_user_pool_client.main]
 
$client = new CognitoIdentityProviderClient([
    'profile' => 'default',
    'region' => 'us-east-2',
    'version' => '2016-04-18'
]);

$userPoolId = "us-east-2_P0oL1D";
$clientID = "1a2b3c4d5e6f7g8h9i0j";

try {
    $result = $client->deleteUserPool([
        'UserPoolId' => $userPoolId, 
        'ClientId' => $clientID,
    ]);
    
    var_dump($result);
} catch (AwsException $e) {
    // output error message if fails
    echo $e->getMessage() . "\n";
    error_log($e->getMessage());
}

// snippet-end:[cognito.php.user_pool.delete_user_pool_client.main]
// snippet-end:[cognito.php.user_pool.delete_user_pool_client.complete]
// snippet-sourceauthor:[jschwarzwalder (AWS)]