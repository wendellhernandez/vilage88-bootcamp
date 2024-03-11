FROM node:21-alpine3.18
RUN mkdir -p /app
WORKDIR /app
COPY . .
RUN npm install
RUN npm install nodemon -g
EXPOSE 8080
CMD ["nodemon" , "server"]