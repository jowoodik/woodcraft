FROM nginx:alpine

ARG NGINX_UID
ARG NGINX_GID

RUN addgroup -g ${NGINX_GID} -S www-data \
 && adduser -u ${NGINX_UID} -D -S -G www-data www-data
