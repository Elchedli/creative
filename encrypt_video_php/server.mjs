import phpServer from 'php-server';

const options = {
    port: 8000, // Specify the desired port
  };

const server = await phpServer(options);
console.log(`PHP server running at ${server.url}`);