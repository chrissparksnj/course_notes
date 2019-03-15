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

# Chapter 2 quiz

### Making a custom grub entry

`cd /etc/grub.d` - change directory into grub default dir

`view /boot/grub/grub.cfg` - see full grub file *ubuntu location*

`vim /tmp/newentry.txt` - make a custom new entry text file. copy a template/example from `/boot/grub/grub.cfg` file.

`cp /tmp/newentry.txt /etc/grub.d/40_custom` - replace `40_costom` with `newentry.txt`

`grub-mkconfig -o /boot/grub/grub.cfg` - generate new grub file and output it to default `grub` configuration file.

### Make custom boot entry in UBUNTU
`vim /etc/default/grub` - edit default grub options to show boot-menu

`info -f grub -n 'Simple configuration'` - for default grub docs and options.
```
GRUB_DEFAULT=0
#GRUB_TIMEOUT_STYLE=hidden
GRUB_TIMEOUT=5
GRUB_DISTRIBUTOR=`lsb_release -i -s 2> /dev/null || echo Debian`
GRUB_CMDLINE_LINUX_DEFAULT="quiet splash"
GRUB_CMDLINE_LINUX=""
GRUB_BACKGROUND="/home/t/Downloads/cow.jpg"
```

* add the following to `/etc/grub.d/40_custom` and run `sudo update-grub` to update `grub menu`.
```
menuentry 'CUSTOMBOOTMENU' --class ubuntu --class gnu-linux --class gnu --class os $menuentry_id_option 'gnulinux-simple-79db7e60-6313-44b5-98b0-74a56db1c269' {
        recordfail
        load_video
        gfxmode $linux_gfx_mode
        insmod gzio
        if [ x$grub_platform = xxen ]; then insmod xzio; insmod lzopio; fi
        insmod part_gpt
        insmod ext2
        set root='hd0,gpt2'
        if [ x$feature_platform_search_hint = xy ]; then
          search --no-floppy --fs-uuid --set=root --hint-bios=hd0,gpt2 --hint-efi=hd0,gpt2 --hint-baremetal=ahci0,gpt2  79db7e60-6313-44b5-98b0-74a56db1c269
        else
          search --no-floppy --fs-uuid --set=root 79db7e60-6313-44b5-98b0-74a56db1c269
        fi
        linux   /boot/vmlinuz-4.18.0-16-generic root=UUID=79db7e60-6313-44b5-98b0-74a56db1c269 ro  quiet splash initcall_debug $vt_handoff
        initrd  /boot/initrd.img-4.18.0-16-generic
}


```




