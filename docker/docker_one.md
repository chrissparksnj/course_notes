# What is Docker?
- Carves up a computer into sealed containers.
- Makes code portable
- Social platform to share containers.

### What is a container?
- Container: self contained sealed unit of software
- Code, Configs, Processes, Networking, Dependicies, Operating System.


### About Docker
- Client program
- A server program that manages a Linux system
- a service that distibutes docker containers


### Installing Docker
https://docs.docker.com/engine/install/

### Running Docker without sudo
`sudo usermod -aG docker $USER`

### Docker Flow
`docker images` - shows current images.
`docker run -ti ubuntu:latest bash` - runs a container with ubuntu and brings up bash
`exit || cntr-d` - exits docker container.
`docker ps` - shows running docker containers.
`docker ps -a` - shows all containers, even stopped ones.
`docker ps -l` - shows last exited containers.
`docker commit <image_id>` - stores latest state of docker container.
`docker tag <image-id>` - renames image you made with docker commit.
`docker commit <name-of-container> <custom-name>` - docker commit and tag in one command.

### Docker Run commands
`docker run --rm -ti ubuntu sleep 5` - start container, sit for 5, exits
`docker run -ti ubuntu bash -c "sleep 3; echo all done"` - runs docker container and executes bash command.
`docker run -d -ti ubuntu bash` - -d argument *daemonizes container*
`docker attach <docker-container-name>` - attaches to running docker container.
`cntrl+p, cntrl+q` - exits current container but leaves it running.

### Docker Exec
`docker exec -ti <container-name> bash` - adds bash process to running container

### Docker Logs
`docker run --name example -d ubuntu bash -c "lose /etc/passwd"` - runs a faulty container.
`docker logs <container-name>` - shows log for certain docker container.

### Killing a running container.
`docker kill <container-name>` - kills a container.
`docker rm <container-name>` - removes a docker container.

### Resource Constraints
`docker run --memory <max-memory-allowed> image-name command` - gives a container memory allowance.
`docker run --cpu-shares` - gives more/less resources based off amount of shares.
`docker run --cpu-quota` - limits cpu usage.

### Lessons
- dont let containers fetch dependencies when they start.
- dont leave important things in unamed stopped containers.


### Networking
`docker run --rm -ti -p 45678:45678 -p 45679:45679 --name echo-server ubuntu bash` - exposes two ports in container.
`nc -lp 45678 | nc -lp 45679` - runs listening port in *echo-server* and forwards output to different port.
`nc host.docker.internal 45678` - connect to container.
`nc host.docker.internal 45689` - captures output.
`docker port <container-name>` - shows which ports are running on container.
`docker run -p <outside-port>:<inside-port>/protocol` - main way to expose ports.
`docker run -p 1234:1234/udp` - exposes udp ports in container.
`docker run -p 1234/udp` - dynamically chooses exposed port.

`docker network ls` - shows docker networks.
`docker network create learning` - creates network. 
`docker run --rm -ti --net learning --name catserver ubuntu bash` - creates container that uses *learning* network.
`docker network connect catsonly` - create a new network.
`docker network connect <network-name> <container-name> - connects container to new network.


### Docker Images
`docker images` - shows images.
`docker rmi <image-id>` - deletes image by id.
`docker rmi <image-name>` - deletes image by name.

### Docker volumes
- virtual discs to store and share data.
- two main varieties.
	- persistent
	- ephemeral
`mkdir ExampleFolder` - make a shared folder.
`docker run -ti -v /home/csparksnj/ExampleFolder:/shared-folder ubuntu bash` - creates a container that uses ExampleFolder on host system.
`docker run -ti -v /shared-data ubuntu bash` - created a shared volume for containers only.
`docker run -ti --volumes-from <container-name> ubuntu bash` - starts container with volume from container name.

### Docker registries
`docker search ubuntu` - searches registries for ubuntu keyworded images.
`docker login` - logs into hub.docker.com.
`docker pull debian:sid` - pulls down image.
`docker tag debian:sid thearthur/test-image-42:v99` - renames docker image.
`docker push thearthur/test-image-42:v99` - pushes docker image to dockerhub.

