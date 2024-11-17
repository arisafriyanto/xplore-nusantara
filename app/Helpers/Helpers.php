<?php

if (! function_exists('formatCurrency')) {
    function formatCurrency($amount, $currency = "IDR")
    {
        $fmt = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);
        $formatted = $fmt->formatCurrency($amount, $currency);
        return str_replace(',00', '', $formatted);
    }
}
