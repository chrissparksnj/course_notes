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




