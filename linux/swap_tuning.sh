 1434  swapon
 1435  free
 1436  df -h
 1437  sudo fallocate -l 4G /swapfile
 1438  ls -lh /swapfile 
 1439  sudo chmod 600 /swapfile
 1440  sudo mkswap /swapfile 
 1441  sudo swapon /swapfile
 1442  sudo swapon --show
 1446  free -h
 1447  sudo cp /etc/fastab
 1448  sudo cp /etc/fastab /etc/fstab.bak
 1449  sudo cp /etc/fstab /etc/fstab.bak
 1450  echo '/swapfile none swap sw 0 0' | sudo tee -a /etc/fstab
 1451  cat /proc/sys/vm/swappiness 
 1452  sudo sysctl vm.swappiness = 10
 1453  sudo sysctl vm.swappiness=10
 1454  sudo nano /etc/sysctl.conf 
 1455  cat /proc/sys/vm/vfs_cache_pressure
 1456  sudo sysctl vm.vfs_cache_pressure=50
 1457  sudo nano /etc/sysctl.conf
