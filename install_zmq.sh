#!/bin/bash

#
# ZMQ instalation - http://www.zeromq.org/intro:get-the-software
#
tar xzvf zeromq-3.2.2.tar.gz
cd zeromq-3.2.2
./configure
make
make install
echo "/usr/local/lib" > /etc/ld.so.conf.d/usr_local_lib.conf
ldconfig

#
# ZMQ PHP Binding Instalation
#
pear channel-discover pear.zero.mq
pecl install pear.zero.mq/zmq-beta
echo "extension=zmq.so" > /etc/php.d/zmq.ini
