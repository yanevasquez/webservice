#!/bin/bash

main() {
    __start
}

infoMessage() {
    printf >&2 "${TPUT_YELLOW}Building the webservices-api container ${TPUT_YELLOW}...${TPUT_RESET}\n\n"
}
__start() {
    TPUT_RESET="$(tput sgr 0)"
    TPUT_YELLOW="$(tput setaf 3)"
    search=$(ls | grep "build.sh")
    if [ -e "${search}" ]; then
        infoMessage
        docker-compose up --build && docker-compose up
    else
        docker-compose up --build && docker-compose up
    fi
}

main
