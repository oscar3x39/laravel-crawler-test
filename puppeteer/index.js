const http = require('http');
const puppeteer = require('puppeteer');

const Screenshot = async () => {
  const browser = await puppeteer.launch({headless: true, args:['--no-sandbox']});
  const page = await browser.newPage()
  await page.goto('https://soundcloud.com/')
  await page.screenshot({ path: 'images/test.png' })
  await browser.close()
}

const requestListener = function (req, res) {
  Screenshot();
  res.writeHead(200);
  res.end('Hello, World!');
}

const server = http.createServer(requestListener);
server.listen(8888);