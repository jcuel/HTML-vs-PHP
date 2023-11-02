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

Docker allows you to create and run containers on any operating system supported by Docker Desktop. This guide will walk you through the steps to run your first container in Windows using Docker Desktop.




# What is a Dockerfile?

## Example: Dockerfile for a Python Flask Application

Here's an example of a `Dockerfile` that can be used to containerize a Python Flask application:

```Dockerfile
# Use an official Python runtime as a parent image
FROM python:3.7-slim

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages specified in requirements.txt
RUN pip install --trusted-host pypi.python.org -r requirements.txt

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable
ENV NAME World

# Run app.py when the container launches
CMD ["python", "app.py"]
