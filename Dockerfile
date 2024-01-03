# Basic nginx dockerfile starting with Ubuntu latest
FROM ubuntu:latest
RUN apt-get -y update
RUN apt-get -y install nginx
