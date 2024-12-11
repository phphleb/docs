<?php

$logEnabled = env_bool('LOG_ENABLED', default: true);

$logLevel = env('APP_LOG_LEVEL', default: 'info');

$uploadLimitMb = env_int('UPLOAD_LIMIT_MB', default: 10);

$redisConnection = env_array('REDIS_CLUSTER_CONFIG', default: []);
