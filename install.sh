#!/usr/bin/env bash

cd $HOME/BotPHP

installall(){
sudo apt-get install
python-properties-common
sudo apt-get update
sudo add-apt-repository -y ppa:ondrej/php 
sudo apt-get update
sudo apt-get install php7.2 php7.2-cli php7.2-common -y 
sudo apt-get install php7.2-curl php7.2-gd php7.2-json php7.2-mbstring php7.2-intl php7.2-mysql php7.2-xml php7.2-zip -y 
 sudo apt-get install unzip -y
}
installall

screen -S bot

php test.php


