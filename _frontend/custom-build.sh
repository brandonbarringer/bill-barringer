#!/bin/bash

yarn
yarn build
rm -rf ./public
mv dist public
