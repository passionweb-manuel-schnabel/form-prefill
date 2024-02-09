# Prefill form fields with the hook "afterBuildingFinished" of EXT:form in TYPO3

Shows the usage of the hook "afterBuildingFinished" of EXT:form, for example to prefill forms.

## What does it do?

Adds an example form which uses the afterBuildingFinished hook to prefill the form fields with values from logged in frontend user (if exists).

## Installation

Add via composer:

    composer require "passionweb/form-prefill"

* Install the extension via composer
* Flush TYPO3 and PHP Cache

## Requirements

This example uses no 3rd party libraries.

## Extension settings

There are no extension settings available.

## Extension configuration (TypoScript)

All necessary configurations are read in using the [ext\_typoscript\_setup.typoscript](./ext_typoscript_setup.typoscript) file.

```

plugin.tx_form.settings.yamlConfigurations {
    1704442020 = EXT:form_prefill/Configuration/Yaml/BaseSetup.yaml
}

module.tx_form.settings.yamlConfigurations {
    1704442020 = EXT:form_prefill/Configuration/Yaml/BaseSetup.yaml
}

```

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
