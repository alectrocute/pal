#!/bin/bash

if [ "$1" == "start" ]
then
  sudo /usr/local/nginx/sbin/nginx;
  echo "nginx started";
  exit 1;
fi

if [ "$1" == "restart" ]
then
  sudo /usr/local/nginx/sbin/nginx -s reopen;
  echo "nginx restarted";
  exit 1;
fi

if [ "$1" == "reload" ]
then
  sudo /usr/local/nginx/sbin/nginx -s reload;
  echo "nginx reloaded";
  exit 1;
fi

if [ "$1" == "stop" ]
then
  sudo /usr/local/nginx/sbin/nginx -s stop;
  echo "nginx stopped";
  exit 1;
fi

if [ "$1" == "quit" ]
then
  sudo /usr/local/nginx/sbin/nginx -s quit;
  echo "nginx quit";
  exit 1;
fi

if [ "$1" == "test" ]
then
  sudo /usr/local/nginx/sbin/nginx -t;
  echo "nginx config test start...";
  exit 1;
fi
