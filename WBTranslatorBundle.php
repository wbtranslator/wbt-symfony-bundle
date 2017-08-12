<?php

namespace WBTranslator\WBTranslatorBundle;

use WBTranslator\WBTranslatorBundle\DependencyInjection\WBTranslatorBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class WBTranslatorBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new WBTranslatorBundleExtension();
    }
}
