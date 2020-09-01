![tests](https://github.com/jeyroik/extas-operations-jsonrpc-delete/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-operations-delete-update/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a>

<a href="https://github.com/jeyroik/extas-installer/" title="Extas Installer v3"><img alt="Extas Installer v3" src="https://img.shields.io/badge/installer-v3-green"></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-operations-jsonrpc-delete/v)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-operations-jsonrpc-delete/downloads)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Dependents](https://poser.pugx.org/jeyroik/extas-operations-jsonrpc-delete/dependents)](//packagist.org/packages/jeyroik/extas-jsonrpc)


# Описание

Delete operation for JSON RPC

# Спецификация

```json
{
  "request": {
    "type": "object",
    "properties": {
      "data": {
      		"type": "object",
      		"items": {"type": "mixed"}
      	}
    }
  },
  "response" : {
    "type" : "object",
    "properties" : {
       "type": "object",
       "items": {
          "type": "array",
          "items": {"type": "object"}
        },
        "total": {
          "type": "int"
        }
    }
  }
}
```

# Пример запроса

```json
{
  "id": "2f5d0719-5b82-4280-9b3b-10f23aff226b",
  "method": "snuff.delete",
  "params": {
    "data": {
      "name": "test"
    }
  }
}
```