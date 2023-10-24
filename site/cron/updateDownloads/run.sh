#!/bin/bash
clear
echo "Location: $1"

cd "$1/site/cron/updateDownloads/"
unzip "$2.zip"
cd "docker-cp-$2/"
rm README.md
cd "site/db"
rm *
rsync -avh "$1/site/cron/updateDownloads/docker-cp-$2/" "$1/"
chmod -R 777 "$1/site/cron/updateDownloads/"

rm -R "$1/site/cron/updateDownloads/docker-cp-$2"
rm -R "$1/site/cron/updateDownloads/main.zip"

echo "Finished Update"
