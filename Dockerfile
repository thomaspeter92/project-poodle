FROM ubuntu:18.04
MAINTAINER Hong Shik Kim <mushoot@gmail.com>

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php7.2
RUN apt-get install -y php7.2-mbstring php7.2-gd php7.2-curl php7.2-xml php7.2-bcmath php7.2-oauth php7.2-mysql composer php7.2-opcache php7.2-cli  

EXPOSE 80 

CMD ["apachectl", "-D", "FOREGROUND"]

