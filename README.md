# CEP Crawler

## TL;DR

### Sample

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
