#latest but for production should be a specifed version nginx:.13.12
FROM nginx:1.18.0

#add our editable config to our container
ADD ./nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./nginx/default.conf /etc/nginx/sites/default.conf

EXPOSE 80 443