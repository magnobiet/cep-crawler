# CEP Crawler

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## TL;DR

Numbers for test: `90441970`, `91910170`, `90570000`, `90460210`, `93890000`, `93800000`

### Request

```javascript
var data = null,
	xhr = new XMLHttpRequest();

xhr.addEventListener('readystatechange', function() {

	if (this.readyState === 4) {
		console.log(this.responseText);
	}

});

xhr.open('GET', 'http://localhost:8000/90441970');

xhr.send(data);
```

### Response

#### Full

```json
{
	"status": 200,
	"cep": "90441-970",
	"state": "RS",
	"city": "Porto Alegre",
	"neighborhood": "Auxiliadora",
	"address": "Rua Coronel Bordini, 555"
}
```

#### Minimal

```json
{
	"status": 200,
	"cep": "93890-000",
	"state": "RS",
	"city": "Nova Hartz",
	"neighborhood": null,
	"address": null
}
```

### Development

```bash
git clone git@github.com:magnobiet/cep-crawler.git && cd $_
composer install
php -S localhost:8000
# http://localhost:8000/90441970
```

## Licence

[MIT](https://magno.mit-license.org/2017)
