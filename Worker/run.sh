#!/usr/bin/env bash

/usr/local/bin/app/grab_pics_loop.sh &

nginx -g "daemon off;"

