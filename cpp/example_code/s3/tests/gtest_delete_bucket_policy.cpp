// Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
// SPDX-License-Identifier: Apache-2.0
/*
 * Test types are indicated by the test label ending.
 *
 * _1_ Requires credentials, permissions, and AWS resources.
 * _2_ Requires credentials and permissions.
 * _3_ Does not require credentials.
 *
 */

#include <gtest/gtest.h>
#include <fstream>
#include "awsdoc/s3/s3_examples.h"
#include <aws/core/utils/UUID.h>
#include "S3_GTests.h"

static const int BUCKETS_NEEDED = 1;

namespace AwsDocTest {
// NOLINTNEXTLINE(readability-named-parameter)
    TEST_F(S3_GTests, delete_bucket_policy_2_) {
        std::vector<Aws::String> bucketNames = GetCachedS3Buckets(BUCKETS_NEEDED);
        ASSERT_GE(bucketNames.size(), BUCKETS_NEEDED)
                                    << "Unable to create bucket as precondition for test" << std::endl;

        bool result = AddPolicyToBucket(bucketNames[0]);
        ASSERT_TRUE(result) << "Unable to add policy to bucket as precondition for test" << std::endl;

        result = AwsDoc::S3::DeleteBucketPolicy(bucketNames[0], *s_clientConfig);
        ASSERT_TRUE(result);
    }
} // namespace AwsDocTest
