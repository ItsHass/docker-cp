#!/bin/bash
clear
cd "$1/site/cron/updateDownloads/"
tar -xf "docker-cp-main.zip"
cd "docker-cp-main"
rm README.md
cd "site/db"
rm *
rsync -avh "$1/site/cron/updateDownloads/docker-cp-main/" "$1/"
chmod -R 777 "$1/site/cron/updateDownloads/"
