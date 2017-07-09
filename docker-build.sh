#!/usr/bin/env bash

docker build -f WebserverUiApplication.Dockerfile -t 199372285325.dkr.ecr.eu-central-1.amazonaws.com/paunin-com .
docker push 199372285325.dkr.ecr.eu-central-1.amazonaws.com/paunin-com:latest