BehatTerminalExtension
==========================

Extension creating terminal to call commands. Default, only local terminal call.

Available to add new factories like [local terminal](https://github.com/timiTao/BehatTerminalExtension/blob/master/src/Behat/TerminalExtension/Config/services.yml#L27)

## Installing extension

The easiest way to install is by using [Composer](https://getcomposer.org):

```bash
$> curl -sS https://getcomposer.org/installer | php
$> php composer.phar require timitao/behatterminalextension='1.0.*'
```

or composer.json

    "require": {
        "timitao/behatterminalextension": "1.0.*"
    },


## Examples

Configuration at [behat.eml.dist](https://github.com/timiTao/BehatTerminalExtension/blob/master/behat.yml.dist)

Behat scenarion at this [base.feature](https://github.com/timiTao/BehatTerminalExtension/blob/master/features/base.feature)

## Versioning

Staring version ``1.0.0``, will follow [Semantic Versioning v2.0.0](http://semver.org/spec/v2.0.0.html).

## Contributors

* Tomasz Kunicki [TimiTao](http://github.com/timiTao) [lead developer]
