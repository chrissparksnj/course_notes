---
title: Wifi Connecting
created: '2019-02-15T20:57:00.701Z'
modified: '2019-02-16T02:56:18.468Z'
---

# Wifi Connecting

`ifconfig <wireless card information>` - Get wireless card information
           - Look for item that has information on it
           - Ignore lines that contain 'no wireless extensions'
           
`ifconfig` - 
`ifconfig wlan0 up`  - Brings wireless card up

### Inpsecting near by access points
* sudo needed
` iwconfig` - Gives information about the name of your cards
` sudo iwlist wlp2s0 scan ` - Lists nearby access points
                            - Can be used to return encryption of WAP
` 

### connecting via wlan0
`ifconfig wlan0 essid name key password` <-- Hexidecmal
`iwconfig wlan0 essid name key s:password` <-- ASCII
`iwconfig wlan0 essid name key password` <-- Only works on WPA and WPA2 ecrypted access points

### Starbucks doesn't need a key to connect via
