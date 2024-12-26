# PeerGlobe Pimcore

## Getting started
```bash
git clone "link"
cd ./peerglobe
docker-compose up -d
docker-compose exec php composer install
docker-compose exec php vendor/bin/pimcore-install --mysql-host-socket=db
``` 
- Open http://localhost in your browser
- Done! 😎