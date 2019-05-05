FROM php:7.2-apache
ENV APP_DIR=/app
RUN mkdir $APP_DIR
#RUN mkdir $APP_DIR/public
RUN mkdir /var/www/html/public/

#COPY ./apache/apache2.conf /etc/apache2/apache2.conf
RUN chmod -R 755 $APP_DIR
#ENV APACHE_DOCUMENT_ROOT /app/public
#ENV APACHE_RUN_DIR /app/public
#RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
#RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
COPY ./apache/local.colegio.com.conf /etc/apache2/sites-available/
COPY ./apache/hosts /etc/hosts
COPY ./apache/.htaccess /var/www/html/public/

WORKDIR $APP_DIR
RUN apt-get update && apt-get install -y apt-utils && apt-get install -y curl && apt-get install -y git
RUN apt-get install -y \
    zip
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
#CMD ["apache2-foreground"]
#RUN apache2 -D FOREGROUND
RUN a2ensite local.colegio.com.conf
RUN a2dissite 000-default.conf
RUN service apache2 restart
#RUN apache2 -D FOREGROUND