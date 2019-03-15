## Surveying Linux Kernel

### Commands for hardware info

`lshw`      - lists hardware

`lspci`     - lists pci devices. **pci devices are any devices that plug directly into the motherboard**

`lsusb`     - lists usb devices

`lsbk`      - lists block devices

`lscpu`     - lists cpu devices

`lsdev`     - lists device files

`lspci -v`  - verbose pci command


### System Calls

`man 2 read`        - uses `man 2` to bring up information about the `read` system call

* The output of `printk()` is put into a ram buffer

`dmesg`             - displays RAM nuffer messages from kernel

`dmesg | wc -l`     - shows number of `dmesg` output lines

`dmesg | head`      - shows the head files of command line

**intersting information from dmesg | head**
**shows the boot information with the command line parameters.**
**those are the options passed to the kernel from GRUB**
`Command line: BOOT_IMAGE=/boot/vmlinuz-4.4.0-142-generic root=UUID=7af42459-a7b5-47a8-85aa-d9a30eceb94f ro console=tty1 console=ttyS0`


### Virtual File Systems
* The `proc` and `sysfs` filesystems are virtual filesystems *
* Their contents are *not* stored on disk.
* Each file and directory entry has an associated function in the kernel the produces the contents *on demand* 
* `proc` comes from *process*
* `proc` is mounted on `/proc`
* `ps` command gets its information from the `/proc` directory
* Kernel tunable variables represented as files
* When you `cat` one of those files, the kernel returns the current value for the variable.
* `/proc` processes have a PID directory listed in `/proc`
* Threads of PID reside in directory `task`

* `sysfs` is mounted on `/sys` at boot


## GRUB Booting

* edit files in `/etc/grub.d` in order to make new grub entry.

* `40_custom` file is the file usually edited to make new entry.

* run `grub2-mkconfig` in order to generate your new config file.

* you can interupt grub for editing by hitting the down key on boot.

* grub kernel parameter information found in `/Documentation/kernel-parameters.txt`

`grub.conf` - was *grub 1* configuration file

`/etc/grub.d` - new configuration file location for *grub 2*

`/etc/default/grub` - the initial information loaded by grub

`cat /proc/cmdline` - see options grub used to boot with


### initramfs
* A  `gzipped` `CPIO` archive that lives under `/boot`

* booting with `rdinit=/bin/bash` will make sure `init` program doesn't run.

### Inspecting `initramfs`
`mkdir /tmp/myinit` - make empty directory.

`sudo cp /boot/initrd.img-4.4.0-141-generic /tmp/myinit/i.gz` - copy initrd file to and rename to `i.gz`

`gunzip i.gz` - unzip archive

 `cpio -i --no-absolute-filenames < i ` - unwraps `initrd` and makes sure not to overwrite with `--no-absolute-filenames`
 
 `ls -l` - shows filesystem that expands in `RAM` and mounted to hardrive
 
 
