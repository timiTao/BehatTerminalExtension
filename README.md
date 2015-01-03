[![License](https://poser.pugx.org/timitao/behatterminalextension/license.svg)](https://packagist.org/packages/timitao/behatterminalextension)
[![Latest Stable Version](https://poser.pugx.org/timitao/behatterminalextension/v/stable.svg)](https://packagist.org/packages/timitao/behatterminalextension)
[![Latest Unstable Version](https://poser.pugx.org/timitao/behatterminalextension/v/unstable.svg)](https://packagist.org/packages/timitao/behatterminalextension)
[![Total Downloads](https://poser.pugx.org/timitao/behatterminalextension/downloads.svg)](https://packagist.org/packages/timitao/behatterminalextension)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/55f406f0-205e-40a9-8af6-2d70e96665e4/mini.png)](https://insight.sensiolabs.com/projects/55f406f0-205e-40a9-8af6-2d70e96665e4)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/timitao/behatterminalextension/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/timitao/behatterminalextension/?branch=master)
[![Build Status](https://travis-ci.org/timiTao/BehatTerminalExtension.svg?branch=master)](https://travis-ci.org/timiTao/BehatTerminalExtension)


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

Configuration at [behat.yml.dist](https://github.com/timiTao/BehatTerminalExtension/blob/master/behat.yml.dist)

Behat scenarion at this [base.feature](https://github.com/timiTao/BehatTerminalExtension/blob/master/features/base.feature)

## Versioning

Staring version ``1.0.0``, will follow [Semantic Versioning v2.0.0](http://semver.org/spec/v2.0.0.html).

## Contributors

* Tomasz Kunicki [TimiTao](http://github.com/timiTao) [lead developer]
