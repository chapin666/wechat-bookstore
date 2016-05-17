#!/bin/sh
# description: start/restart/stop

NGINX_DIR=/usr/local/server/nginx
FCGI_DIR=/usr/bin/php5-cgi

export NGINX_DIR
export FCGI_DIR

case $1 in

'start')  echo "start nginx..."
  $NGINX_DIR/sbin/nginx
  spawn-fcgi -a 127.0.0.1 -p 9000 -C 5 -u chengbin -g chengbin -f $FCGI_DIR
  
  echo "start finished."

  echo "参数:`basename $0` {start|restart|stop||testcfg}"

esac  
  

