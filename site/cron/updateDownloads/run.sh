#!/bin/bash
clear
cd "/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/updateDownloads/"
tar -xf "docker-cp-main.zip"
cd "docker-cp-main"
rm README.md
cd "site/db"
rm *
rsync -avh "/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/updateDownloads/docker-cp-main/" "/home/hass/web/svr01.itshass.uk/public_html/docker/"
chmod -R 777 "/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/updateDownloads/"
