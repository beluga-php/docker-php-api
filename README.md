# Docker PHP Api

> [!NOTE]
> Development has moved back to the original project at https://github.com/docker-php/docker-php-api.

Generated API Client from OpenAPI specification of [Docker](https://www.docker.com/), by [Jane](https://github.com/janephp/janephp) OpenAPI Client generator.

## Usage

You should not use this library directly, please use the [docker-php](https://github.com/docker-php/docker-php) one instead.

## Versioning

This library does *not* respect semver and will instead follow Jane OpenAPI version and Docker API version:

 * First number is the Jane major version used for generating the files
 * Second and third number are the Docker API Version
 * Last number is the minor revision number for this

So 4.1.25.0 is the version 1.25 of Docker API generated with Jane OpenAPI in a 4.X version.

You should always fix the version, or at least the 3 first numbers (4.1.25.\*)

## Credits

This library is a fork of the original [docker-php-api](https://github.com/docker-php/docker-php-api), created by [Joel Wurtz](https://github.com/joelwurtz).

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
