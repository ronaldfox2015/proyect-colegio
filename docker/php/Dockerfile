FROM php:7.2-fpm
RUN apt-get update && apt-get install -y apt-utils && apt-get install -y curl && apt-get install -y git
RUN apt-get install -y \ 
    nginx       
RUN apt-get install -y \ 
    zip    
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
# ENTRYPOINT /init/entrypoint.sh