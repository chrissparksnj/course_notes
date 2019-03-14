## Chapter 1 Quiz
`uname -r` - get linux kernel version

`ls -l /boot/vmlinuz*` - get kernel size

`head /proc/meminfo` - find out amount of RAM

`strace -c date` - count amount of syscalls a given process has

`lspci | grep -i ethernet` - looks for pci ethernet device
### Seeing how many files a process has open

`sleep 100 &` - make a job and put it in background. should return a number like `[1] 16000`

`ls -l /proc/1600/fd` - shows the file descriptors that the process has open

* Returns data like this
```
lrwx------ 1 dinner dinner 64 Mar 14 05:24 0 -> /dev/pts/0
lrwx------ 1 dinner dinner 64 Mar 14 05:24 1 -> /dev/pts/0
lrwx------ 1 dinner dinner 64 Mar 14 05:24 2 -> /dev/pts/0
```

* Kernel tunable variables are in /proc/sys

`sysctl -a | grep ip_forward` - reports all KTV and filters ip_forward
`sysctl net.ipv4.ip_forward` - gets value of KTV
`systctl net.ipv4.ip_forward = 0` - sets value of sysctl

`strace fdisk -l |& grep /sys/block` - redirects strace stderr to stdout and greps `/sys/block`

`dmesg | grep -i command` - shows boot message from RAM buffer
`grep -r "Command line" /var/log/*` - recursive `grep` run on all files in /var/log to search for boot message.




