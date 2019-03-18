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


