FROM nginx:1.18.0-alpine

COPY ./infra/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./infra/nginx/conf.d/server.conf /etc/nginx/conf.d/

ARG UID=1001
ARG GID=1001

RUN rm -rf /etc/nginx/conf.d/default.conf; \
    apk --no-cache add shadow; \
    usermod -u $UID nginx && groupmod -g $GID nginx; \
    mkdir -p /srv/app/public && chown nginx:nginx /srv/app/public

WORKDIR /srv/app/public
