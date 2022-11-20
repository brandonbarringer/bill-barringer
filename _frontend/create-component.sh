#!/bin/sh
NOCOLOR='\033[0m'
RED='\033[0;31m'
PURPLE='\033[0;35m'

if [[ -z "$1" ]]; then
    echo "${RED}error: ${NOCOLOR}Must provide component NAME in environment"
    echo "${PURPLE}info: ${NOCOLOR}Try 'yarn component [name]'\n"
    exit 1
fi

PATH="./src"

echo "<div class=\"$1\"></div>" >> $PATH/templates/components/$1.hbs
echo "\n{{> $1}}" >> $PATH/templates/index.hbs
echo ".$1 {}" >> $PATH/styles/components/_$1.scss
echo "\n@import 'components/$1';" >> $PATH/styles/index.scss
