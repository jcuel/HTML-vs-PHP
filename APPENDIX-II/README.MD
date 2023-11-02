# What is Docker Compose?

Docker Compose is a tool for defining and running multi-container Docker applications. It is designed to work with Docker images, and its primary use is to help developers configure their application's services and stack.

With Docker Compose, you can define a multi-container application using a YAML file. This file defines each service's container, the Docker image it uses, the required environment variables, and the network links to other services.

Once you have defined your application in a Docker Compose file, you can easily run your application with a single command. This command tells Docker Compose to run each service in the Docker Compose file, each in its own container, as defined in the YAML file.

To learn more about Docker Compose, refer to the official documentation: [Docker Compose Documentation](https://docs.docker.com/compose/)

# How to Use Docker Compose

To use Docker Compose, you need to follow these steps:

1. Create a Docker Compose File: Docker Compose uses a YAML file to configure your application's services, networks, and volumes. This file is named docker-compose.yml and is usually located in the root directory of your project.

Here's an example of a basic docker-compose.yml file:

```yaml
# version of the language
version: '3'

# Definition of services in stack
services:
  # first the web service
  web:
    # set image name
    image: your-image-name
    # set port mapping in your-pc:container format
    ports:
      - "8080:80"
  # Then the database service
  database:
    # in this case we use a public image
    image: postgres
    # this image requires additional environment variables
    environment:
      POSTGRES_USER: your_username
      POSTGRES_PASSWORD: your_password
    # finally a volume so data we create, set, update, etc is persistent when container is down. Map method id volume:contianer-path
    volumes:
      - "db-data:/var/lib/postgresql/data"

# Finally we define the volume, doing it this way, allows docker to create the disk file.
volumes:
  db-data:
```
