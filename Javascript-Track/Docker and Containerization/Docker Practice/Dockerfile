FROM node:21-alpine3.18
RUN mkdir -p /var/www/testapp
WORKDIR /var/www/testapp
COPY package.json .
RUN npm install
RUN npm install nodemon -g
RUN mkdir -p /var/www/testapp
WORKDIR /var/www/testapp
COPY . .