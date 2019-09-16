#!/bin/bash
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin
export DISPLAY=:0.0

filename="/var/www/queue.txt"
while IFS= read -r line; do
	obarr=($line)
	key=${obarr[0]}
	url=${obarr[1]}
	if [ ${#url} -gt 5 ]
		then
			nohup bash /root/ffmpeg.sh $url $key > /var/log/crontab-loop.log &
		fi
	n=$((n+1))
done < "$filename"

rm $filename
touch $filename
chmod 777 $filename
