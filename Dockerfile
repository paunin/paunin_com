FROM nginx:1.13
ADD . /var/www/application
ADD ./docker/nginx.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www/application
CMD nginx -g "daemon off;"
