DOCROOT="$(pwd)/"
ROUTER="$(pwd)/app/index.php"

echo $DOCROOT

HOST=127.0.0.1
PORT=8080

echo "with default document served from $DOCROOT"

php -S $HOST:$PORT -t $DOCROOT $ROUTER