# Symple Console App

If you have php >= 8.1 installed please fetch dependencies
```bash
composer install
```
feel free to explore it by running
```bash
php bin/run
# or 
./bin/run 
```

If you don't have php >= 8.1 installed but have docker just use
```bash
./run 
```


Also, there is a shortcut for running tests
```bash
./runtests
```

It will create docker image test/php8.1
You can remove it when you are done playing by
```bash
docker image remove test/php8.1 -f
```