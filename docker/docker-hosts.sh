#!/bin/bash
sudo apt install jq

NEWLINE=$'\n'
hosts=${NEWLINE}
for c in $(docker ps -q)
do
    info=$(docker inspect $c)

    IPAddress=$(echo $info | jq -r '.[].NetworkSettings.Networks[].IPAddress')
    Name=$(echo $info | jq -r '.[].Name' | cut -c2-)
    Hostname=$(echo $info | jq -r '.[].Config.Hostname')
    Domainname=$(echo $info | jq -r '.[].Config.Domainname')

    if [ -z ${Domainname} ]; then
        hosts="${hosts}${IPAddress} ${Name}${NEWLINE}"
    else
        hosts="${hosts}${IPAddress} ${Name} ${Hostname}.${Domainname}${NEWLINE}"
    fi
done

sudo sed -i '/# begin docker-hosts/,/# end docker-hosts/d' /etc/hosts

sudo sh -c "echo '# begin docker-hosts${hosts}# end docker-hosts' >> /etc/hosts"
