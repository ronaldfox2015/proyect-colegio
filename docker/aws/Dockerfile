FROM amazonlinux:2018.03

RUN yum update 
RUN yum install -y \
    php70-curl \
    php70-mbstring \
    php70-mcrypt \
    php70-soap \
    php70-apcu \
    php70-opcache \
    php70-pecl-memcache \
    php70-memcached \
    &&  yum clean all

RUN yum install -y \
    nginx \
    php70-fpm \
    acl \
    &&  yum clean all 
RUN curl -sS https://getcomposer.org/installer | php    
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
ENV APP_DIR=/app
RUN mkdir $APP_DIR
RUN chmod -R 755 $APP_DIR
WORKDIR $APP_DIR
COPY ./nginx.conf /etc/nginx/nginx.conf

COPY ./entrypoint.sh /init/entrypoint.sh
RUN chmod +x /init/entrypoint.sh

ONBUILD ADD app /app/
ENTRYPOINT /init/entrypoint.sh