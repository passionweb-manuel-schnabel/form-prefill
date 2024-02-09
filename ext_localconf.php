<?php

defined('TYPO3') || die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterBuildingFinished'][1704442020]
    = \Passionweb\FormPrefill\Hooks\PrefillForms::class;
