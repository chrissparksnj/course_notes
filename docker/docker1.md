### installing docker on ubuntu
  - google: install docker on ubuntu
  - https://docs.docker.com/install/linux/docker-ce/ubuntu/
----------------------------------------------------------------
  - sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common

  - curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
  - sudo apt-key fingerprint 0EBFCD88
  - sudo add-apt-repository \
      "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
      $(lsb_release -cs) \
      stable"
  - sudo apt-get update
  - sudo apt-get install docker-ce docker-ce-cli containerd.io
  - sudo apt-get install docker-ce docker-ce-cli containerd.io

  - list docker distros: apt-cache madison docker-ce
  - docker run hello-world
----------------------------------------------------------------

# The Docker Flow
### images to containers
`docker pull debian` - downloads docker images.

`docker pull kalilinux/kali-linux-docker` - download kali linux docker.

`docker images` find your docker image.

`docker run -ti kalilinux/kali-linux-docker bash`
* `ti` - terminal interactive: full terminal within image.
* `kalilinux/kali-linux-docker` - shell you want to run.
* `bash` - run bash shell within your image.

`cat /etc/lsb-release` - see which docker image your running.

`exit` or `cntrl d` - exits docker image.

`docker ps` - look at docker's running images.
* ID: container id number (not image id)
* IMAGE: what image is running
* COMMAND: the command that's being run
* NAME: randomly generated if not specified.

`docker ps -a` - shows all docker commands.

`docker ps -l` - shows the last exited docker command.

`docker commit <containerid>` - commit container.

`docker tag <sha256> my-image` - renames new docker image.

`docker run -ti my-image` - runs newly created commited docker image.

`docker commit <container-name> my-image-2` - short hand for docker commit.
### Average docker flow.

`docker images` - pulls a list of docker images you can run.

`docker run -ti kalilinux/kali-linux-docker bash` - makes a **container** from image. drops you in a shell.

`touch text.txt` - alter the current container.

`exit` - exit the current container.

`docker ps -l` - shows the last exited docker.

```
CONTAINER ID        IMAGE                         COMMAND   NAMES
527e028718b7        kalilinux/kali-linux-docker   "bash"   hungry_chaum
```

`docker commit 527e028718b7` - commit the new container to an image.
* returns a hash: `sha256:fa1c06b45e3cb253d0e0132af5b54b8e95ca5964eaaf33fb9389587d2b7a7605`.

`docker tag fa1c06b45e3cb253d0e0132af5b54b8e95ca5964eaaf33fb9389587d2b7a7605 my-new-image` - tags new image for easy access.

`docker run -ti my-new-image` - runs your new image.

`docker commit my-new-image my-new-image-2` - makes a new commit of your modified docker image.


### Running process in docker container
* containers have a main process.
* container stops when that process stops.

`docker run --rm -ti mykali sleep 5` - starts container, sleeps, and exits.
* `--rm - delete container when finished with process.

`docker run -ti my-image bash -c "sleep 3; echo all done"`
* runs two commands within in docker container.

`docker run -d -ti my-image bash` - `-d` starts container and leaves it running in background.

`docker attach <name-of-container>` - attaches to a detached container.

`cntrl+p cntrl+q` - exits you out of container, but leaves it running.

`docker exec -ti <name-of-container> bash` - start a new process on a already running container.

`docker run --name crash-example -d my-new-image bash -c 'lose /etc/password' - cause container to crash *on purpose*.

`docker logs crash-example` - look at error logs of failed container.

`docker kill container-name` - kills running container.

`docker rm container-name` - totally removes container.





