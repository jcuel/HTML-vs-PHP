# What is a Container?

A container is a standard unit of software that contains everything needed to run the application - code, runtime, system tools, libraries, and settings. This makes the application self-contained and portable across different environments and cloud providers.

## Benefits of Using Containers

- **Lightweight**: Containers share the host operating system, making them much more lightweight than traditional virtual machines. This allows you to run more containers on a single host, leading to higher resource utilization and potentially cost savings.

- **Consistent Runs**: Containers ensure that the application runs consistently in any environment, whether it's on a developer's laptop, in a test environment, or in production. This eliminates issues caused by differences in operating systems, libraries, or configuration settings.

- **Continuous Integration and Continuous Deployment (CI/CD)**: Containers make it easier to implement CI/CD pipelines, as each build of the application can be tested and deployed within a container. This helps to ensure that the application is always in a releasable state.

- **Resource Isolation**: Containers provide a way to isolate resources, so that one application's performance doesn't impact another application running on the same machine. This helps to improve the overall stability and reliability of the system.

- **Security**: Containers help to enhance security by providing a clear boundary between the application and the host system. This makes it easier to manage and limit the potential damage caused by security vulnerabilities or breaches.

# What is Docker?

Docker is an open platform for developing, shipping, and running applications in containers. It enables rapid development, testing, and deployment of applications while providing increased portability, security, and scalability. Docker's underlying technology is containerization, which allows developers to bundle up an application with all of its dependencies into a single unit, called a container.

# How to install Docker Desktop in Windows

## Prerequisites

Before starting, make sure you have the following installed on your system:

1. Windows 10 Home, Pro, Enterprise, or Education (64-bit)
2. Hyper-V and Containers Windows features enabled

You can check this by running the following command in an elevated PowerShell:

```powershell
Get-WindowsOptionalFeature -FeatureName Microsoft-Hyper-V-All -Online
Get-WindowsOptionalFeature -FeatureName Containers-DisposableClientVM -Online
```
[![IMAGE ALT TEXT HERE](https://img.youtube.com/vi/aCRMnDLnWmU/0.jpg)]https://www.youtube.com/watch?v=aCRMnDLnWmU)

1. Visit the Docker Desktop for Windows page: [Docker Desktop for Windows](https://www.docker.com/products/docker-desktop)

2. Click on the "Get Docker" button to download the installer.

3. Run the Docker Desktop Installer by double-clicking the downloaded file.

4. Follow the on-screen instructions to complete the installation. By default, Docker Desktop will start automatically after installation.

5. Verify that Docker Desktop is running by right-clicking the Docker whale icon in the Windows system tray, and clicking on "Settings."

6. You should now see a screen displaying various settings for Docker Desktop, such as "Resources," "Docker Engine," "Kubernetes," etc.

Congratulations! You have successfully installed Docker Desktop in Windows.

# How to Run Your First Container in Windows Using Docker Desktop

Now that Docker is installed and running, let's run your first container. In the PowerShell, execute the following command:
```powershell
docker run hello-world
```

This command will download the hello-world image from Docker Hub and run it as a container. You should see output similar to the following:

```powershell
Hello from Docker!
This message shows that your installation appears to be working correctly.

To generate this message, Docker took the following steps:
 1. The Docker client contacted the Docker daemon.
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.
 3. The Docker daemon created a new container from that image which runs the executable that produces the output you are currently reading.
 4. The Docker daemon streamed that output to the Docker client, which sent it
```
Congratulations! You have successfully run your first container in Windows using Docker Desktop.

# What is a Dockerfile?

A Dockerfile is a script that contains instructions on how to build a Docker image. It contains a series of commands that the Docker daemon can execute in order to create an image. The Dockerfile uses a simple, human-readable syntax that allows users to automate the process of building and deploying Docker images.

Here's a simple example of a Dockerfile to run a php website:

```Dockerfile
# Set the base image
FROM php:7.4-apache

# Copy custom application files
COPY ./my-php-website /var/www/html

# Change ownership of the copied files
RUN chown -R www-data:www-data /var/www/html

# Set the document root
DOCUMENT_ROOT /var/www/html

# Set the directory for configuration
RUN a2enmod rewrite

# Install required extension for mysql
RUN docker-php-ext-install mysqli

# add additional setup
RUN echo 'AllowOverride All' >> /etc/apache2/apache2.conf

# Make port 80 available to the world outside this container
EXPOSE 80

# This is the command to execute in the container when it launches
CMD ["apache2-foreground"]
```

Now to build the image, we use the following command in Powershell (on the same path as your dockerfile, and project):

```powershell
docker build -t your-image-name .
```

Once the image is built, you can run a Docker container based on this image using the following command:
bash

```powershell
docker run -d -p 8080:80 your-image-name
```

This command will map port 8080 on your host machine to port 80 on the Docker container. You can then access your PHP website by opening a web browser and navigating to "http://localhost:8080".
