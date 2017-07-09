FROM nginx:1.13

RUN apt-get update && apt-get install -y php7.0-cli

ADD . /var/www/application
ADD ./docker/WebserverUiApplication/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/application

RUN mv -f ./Worker /usr/local/bin/app/

CMD /usr/local/bin/app/run.sh
