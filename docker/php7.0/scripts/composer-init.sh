#!/bin/bash

composer global require "fxp/composer-asset-plugin:^1.2.0" \
    && composer config -g github-oauth.github.com ${OAUTH_TOKEN}
