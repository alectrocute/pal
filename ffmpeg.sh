#!/bin/bash

urls=`youtube-dl -f 'bestvideo[ext=mp4][height<=480]+bestaudio' -g $1`
obarr=($urls)
video=${obarr[0]}
audio=${obarr[1]}
# nohup ffmpeg -i $video -i $audio -r -c:v copy -preset superfast -vb 1200k -maxrate 1200k -r 30 -g 60 -bufsize 8000k -crf 27 -f flv rtmp://pal.is/hls/$2 > /var/log/crontab-ffmpeg.log &
nohup ffmpeg -re -i $video -i $audio -c:v h264 -c:a aac -ar 44100 -b:v 768k -b:a 96k -vsync 1 -af "aresample=async=1000" -bufsize 2000k -preset veryfast -sc_threshold 0 -g 30 -keyint_min 30 -f flv rtmp://pal.is/hls/$2 > /var/log/crontab-ffmpeg.log &