# php-project-lvl1

[![Maintainability](https://api.codeclimate.com/v1/badges/5bf57db1d7f8b0a27e4e/maintainability)](https://codeclimate.com/github/renakdup/php-project-lvl1/maintainability)

[![Test Coverage](https://api.codeclimate.com/v1/badges/5bf57db1d7f8b0a27e4e/test_coverage)](https://codeclimate.com/github/renakdup/php-project-lvl1/test_coverage)

[![Build Status](https://travis-ci.org/renakdup/php-project-lvl1.svg?branch=master)](https://travis-ci.org/renakdup/php-project-lvl1)

Для установки composer пакета глобально необхрдимо:

- Установить пакет глобально

    `composer global require renakdup/php-project-lvl1:dev-master`


- Узнать путь до бинарников глобального композера

    `composer global config bin-dir --absolute`

- Добавить этот путь в конец ~/.bashrc, который содержит интерактивные настройки оболочки

    `export PATH=$PATH:/home/renakdup/.config/composer/vendor/bin`
    
- Для перезагрузки `.bashrc` запустить команду

    `source .bashrc`